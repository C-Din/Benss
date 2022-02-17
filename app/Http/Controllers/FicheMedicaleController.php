<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FicheMedical;
use App\Models\Infirmiere;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Flashy;

class FicheMedicaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getFiche($id, $view)
     {

     }

    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        $url = 'pages/patients/form/patien_fichemedical';

        if($user->typeCompte == 3)
        {
            $i = 0;
            $j = 0;
            $patient = Patient::where('user_id', $user->id)->first();
            $ifSet[0] = 1;
            $ifSet[1] = 1;
            $ifSet[2] = 1;
            $fiche = FicheMedical::where('patient_id',$patient->id)->first();

            if($fiche == null)
            $ifSet[0] = 0;

            $interventions = DB::table('interventions')
                                ->join('type_interventions', 'type_interventions.id', 'interventions.type_intervention_id')
                                ->where('interventions.patient_id', '=', $patient->id)
                                ->where('interventions.isDel', 0)
                                ->select('interventions.*', 'type_interventions.nomType')->get();

            $rdvs = DB::table('rdvs')
                                ->join('type_rdvs', 'type_rdvs.id', 'rdvs.type_rdv_id')
                                ->where('rdvs.patient_id', '=', $patient->id)
                                ->where('etat', 3)
                                ->where('rdvs.isDel', 0)
                                ->select('rdvs.*', 'type_rdvs.nomType')->get();

            if($interventions == null)
                $ifSet[1] = 0;

            if($rdvs == null)
                $ifSet[2] = 0;
            return view($url, ['i' => $i, 'j' => $j, 'rdvs' => $rdvs, 'fiche' => $fiche, 'ifSet' => $ifSet, 'interventions' => $interventions, 'patient' => $patient]);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $patient = Patient::findOrFail($request->id);
        return view('pages/infm/form/fichemedical_form_create', ['patient' => $patient]);
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
            'poids' => 'required|numeric',
            'tension' => 'required|numeric',
            'taille' => 'required|numeric',
            'groupe_sanguin' => 'required|string',
            'musculo_squelettiqu' => 'required|string',
            'genito_urinaire' => 'required|string',
            'neurologie' => 'required|string',
            'dermo' => 'required|string',
            'tyng' => 'required|string',
            'psycatrique' => 'required|string',
            'blessure' => 'required|string',
            'gastro' => 'required|string',
            'respiratoire' => 'required|string',
            'endoctrinien' => 'required|string',
            'coeur' => 'required|string',
            'symtome' => 'required|string'
        ]);

        if($validator->fails())
       {
        Flashy::error('Veuillez renseigner des informations correctes svp!');
        return back()->withInput();
       }

       $fiche = new FicheMedical();
       $fiche->poids = $request->poids;
       $fiche->taille = $request->taille;
       $fiche->tension = $request->tension;
       $fiche->groupe_sanguin = $request->groupe_sanguin;
       $fiche->musculo_squelettiqu = $request->musculo_squelettiqu;
       $fiche->genito_urinaire = $request->genito_urinaire;
       $fiche->neurologie = $request->neurologie;
       $fiche->dermo = $request->dermo;
       $fiche->tyng = $request->tyng;
       $fiche->psycatrique = $request->psycatrique;
       $fiche->blessure = $request->blessure;
       $fiche->gastro = $request->gastro;
       $fiche->respiratoire = $request->respiratoire;
       $fiche->endoctrinien = $request->endoctrinien;
       $fiche->coeur = $request->coeur;
       $fiche->symtome = $request->symtome;
       $fiche->patient_id = $request->patient_id;
       $fiche->inf_id = Infirmiere::where('user_id', Auth::user()->id)->first()->id;
       $fiche->save();

       Flashy::success('Fiche médicale enregistrée avec succès');
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
            $i = 0;
            $j = 0;
            $ifSet[0] = 1;
            $ifSet[1] = 1;
            $ifSet[2] = 1;
            $fiche = FicheMedical::where('patient_id',$id)->first();
            if($fiche == null)
            $ifSet[0] = 0;

            $patient = Patient::findOrFail($id);

            $interventions = DB::table('interventions')
                                ->join('type_interventions', 'type_interventions.id', 'interventions.type_intervention_id')
                                ->where('interventions.patient_id', '=', $id)
                                ->where('interventions.isDel', 0)
                                ->select('interventions.*', 'type_interventions.nomType')->get();

            $rdvs = DB::table('rdvs')
                                ->join('type_rdvs', 'type_rdvs.id', 'rdvs.type_rdv_id')
                                ->where('rdvs.patient_id', '=', $id)
                                ->where('rdvs.isDel', 0)
                                ->whereIn('etat', array(1,3))
                                ->select('rdvs.*', 'type_rdvs.nomType')->get();

            if($interventions == null)
                $ifSet[1] = 0;

            if($rdvs == null)
                $ifSet[2] = 0;

            $user = User::findOrFail(Auth::user()->id);
            if($user->typeCompte == 1)
                $view = 'pages/mdcin/form/patientdossier_form_show';
            if($user->typeCompte == 2)
                $view = 'pages/infm/form/patientdossier_form_show';
            return view($view, ['i' => $i, 'j' => $j, 'rdvs' => $rdvs, 'fihceMedical' => $fiche, 'ifSet' => $ifSet, 'interventions' => $interventions, 'patient' => $patient]);

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
    public function update(Request $request, FicheMedical $fiche)
    {
        $validator = Validator::make($request->all(), [
            'poids' => 'required|double',
            'tension' => 'required|double',
            'taille' => 'required|double',
            'groupe_sanguin' => 'required|string',
            'musculo_squelettiqu' => 'required|string',
            'genito_urinaire' => 'required|string',
            'neurologie' => 'required|string',
            'dermo' => 'required|string',
            'tyng' => 'required|string',
            'psycatrique' => 'required|string',
            'blessure' => 'required|string',
            'gastro' => 'required|string',
            'respiratoire' => 'required|string',
            'endoctrinien' => 'required|string',
            'coeur' => 'required|string',
            'symtome' => 'required|string'
        ]);

        if($validator->fails())
       {
        Flashy::error('Veuillez renseigner des informations correctes svp!');
        return back()->withInput();
       }

       $fiche->update($request->all());
       Flashy::success('Fiche médicale modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FicheMedical $fiche)
    {
        $fiche->delete();
        Flashy::success('Fiche médicalen supprimée avec succès');
        //return redirect()->route('typeIntervention.index');
    }
}
