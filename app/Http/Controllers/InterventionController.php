<?php

namespace App\Http\Controllers;

use App\Models\Infirmiere;
use Illuminate\Http\Request;
use App\Models\Intervention;
use App\Models\TypeIntervention;
use App\Models\User;
use App\Models\InfirmiereIntervention;
use App\Models\Medecin;
use App\Models\MedecinIntervention;
use App\Models\Patient;
use App\Models\Resultat;
use Illuminate\Support\Facades\Auth;
use Flashy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         /*$interventions =  DB::select('select interventions.id as id, patients.nom as nom, type_interventions.nomType as nomType, interventions.dateIntervention as dateIntervention, interventions.heureIntervention as heureIntervention, interventions.etat as etat
         from interventions, type_interventions, patients
          where type_interventions.id = interventions.type_intervention_id and patients.id = interventions.patient_id order By dateIntervention');*/
          $interventions = DB::table('interventions')
                         ->join('type_interventions', 'type_interventions.id', 'interventions.type_intervention_id')
                         ->join('patients', 'patients.id', 'interventions.patient_id')
                         ->orderBy('interventions.dateIntervention')
                         ->where('interventions.isDel', '=', 0)
                         ->select('interventions.*', 'type_interventions.nomType', 'patients.prenom', 'patients.nom')->get();
        $user = User::findOrFail(Auth::user()->id);
        $i = 0;
        if($user->typeCompte == 0)
            $view = 'pages/admin/lists/admin_interventions';
        if($user->typeCompte == 1)
            $view = 'pages/mdcin/lists/list_intervention';
        if($user->typeCompte == 2)
            $view = 'pages/infm/lists/list_intervention';

        return view($view, ['interventions' => $interventions, 'i' => $i]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient:: all();
        $medecins = Medecin::all();
        $infirmieres = Infirmiere::all();
        $typeInterventions = TypeIntervention::all();
        return view('pages/infm/form/interv_form_create', ['patients' => $patients, 'medecins' => $medecins, 'infirmieres' => $infirmieres, 'typeInterventions' => $typeInterventions]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dateIntervention' => 'required|date',
            'heureIntervention' => 'required',
            'patient_id' => 'required|numeric',
            'type_intervention_id' => 'required|numeric'
        ]);

        if($validator->fails())
        {
            Flashy::error('Veuillez renseigner des informations correctes svp!');
            return back()->withInput();
        }

        $intervention = new Intervention();
        $intervention->dateIntervention = $request->dateIntervention;
        $intervention->heureIntervention = $request->heureIntervention;
        $intervention->commentaire = $request->commentaire;
        $intervention->type_intervention_id = $request->type_intervention_id;
        $intervention->patient_id = $request->patient_id;
        $intervention->save();

            $med = implode( $request->med_id);
            for($i=0; $i < strlen($med); $i++ )
            {
                $medInterv = new MedecinIntervention();
                $medInterv->med_id = $med[$i];
                $medInterv->intervention_id = $intervention->id;
                $medInterv->save();
            }

            $inf = implode( $request->inf_id);
            for($i=0; $i < strlen($inf); $i++ )
            {
                $infInterv = new InfirmiereIntervention();
                $infInterv->inf_id = $inf[$i];
                $infInterv->intervention_id = $intervention->id;
                $infInterv->save();
            }

            Flashy::success('Intervention enregistrée avec succès');
            return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail(Auth::user()->id);

        if($user->typeCompte == 0)
            $view = 'pages/admin/form/intervention_form_show';
        if($user->typeCompte == 1)
            $view = 'pages/mdcin/lists/detail_intervention';
        if($user->typeCompte == 2)
            $view = 'pages/infm/lists/detail_intervention';
        if($user->typeCompte == 3)
            $view = 'pages/patients/lists/detail_intervention';
        $i = 0;
        $intervention = DB::table('interventions')
                                            ->join('type_interventions', 'type_interventions.id', 'interventions.type_intervention_id')
                                            ->join('patients', 'patients.id', 'interventions.patient_id')
                                            ->where('interventions.id', '=', $id)
                                            ->select('interventions.*', 'type_interventions.nomType', 'patients.id', 'patients.nom', 'patients.prenom')->first();

        $medecins = DB::table('medecin_interventions')
                                          ->join('medecins', 'medecins.id', 'medecin_interventions.med_id')
                                          ->where('medecin_interventions.intervention_id', '=', $id)
                                          ->select('medecin_interventions.*', 'medecins.id', 'medecins.nom', 'medecins.prenom')->get();

        $infirmieres = DB::table('infirmiere_interventions')
                                         ->join('infirmieres', 'infirmieres.id', 'infirmiere_interventions.inf_id')
                                         ->where('infirmiere_interventions.intervention_id', '=', $id)
                                         ->select('infirmiere_interventions.*', 'infirmieres.id', 'infirmieres.nom', 'infirmieres.prenom')->get();

        $resultats = Resultat::where('intervention_id', $id)->get();
        $patient = DB::table('patients')
                                        ->join('interventions', 'interventions.patient_id', 'patients.id')
                                        ->where('interventions.id', '=', $id)
                                        ->select('patients.*', 'interventions.id')->first();

        return view($view, ['patient' => $patient, 'intervention' => $intervention, 'medecins' => $medecins , 'infirmieres' => $infirmieres, 'resultats' => $resultats]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $intervention = Intervention::findOrFail($id);
        $intervention->update(['isDel' => 1]);
        Flashy::success('Intervention supprimée avec succès');
        return back()->withInput();
    }
}
