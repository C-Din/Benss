<?php

namespace App\Http\Controllers;

use App\Models\Infirmiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Rdv;
use App\Models\User;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Resultat;
use App\Models\TypeRdv;
use Flashy;
use Illuminate\Support\Facades\DB;

class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        if($user->typeCompte == 1)
        {
            $med = Medecin::where('user_id', $user->id)->first();
            $rdvs = DB::table('rdvs')
                                ->join('type_rdvs', 'type_rdvs.id', 'rdvs.type_rdv_id')
                                ->join('patients', 'patients.id', 'rdvs.patient_id')
                                ->join('medecins', 'medecins.id', 'rdvs.med_id')
                                ->where('rdvs.med_id', $med->id)
                                ->where('rdvs.isDel', 0)
                                ->orderBy('dateRdv')
                                ->select('rdvs.*', 'type_rdvs.nomType', 'patients.nom', 'patients.prenom')->get();
            $i = 0;
            //return dd($rdvs);
            return view('pages/mdcin/lists/list_rdv', ['rdvs' => $rdvs, 'i' => $i]);
        }
        else
        {
            $rdvs = Rdv::orderBy('dateRdv')->where('rdvs.isDel', 0)->get();
            foreach($rdvs as $rdv)
            {
            if($rdv->etat == 0)
                {
                    $rdv->etat = "En attente";
                    $rdv->med_id = "Non attribué";
                }
            else
                {
                    if($rdv->etat == 1)
                        $rdv->etat = "Validé";

                    if($rdv->etat == 2)
                        $rdv->etat = "Annulé";

                    if($rdv->etat == 3)
                        $rdv->etat = "Terminé";

                    $temp = Medecin::findOrFail($rdv->med_id);
                    $rdv->med_id = $temp->nom.' '.$temp->prenom;
                }

                $rdv->type_rdv_id = TypeRdv::findOrFail($rdv->type_rdv_id)->nomType;
                $temp = Patient::findOrFail($rdv->patient_id);
                $rdv->user_id = $temp->nom.' '.$temp->prenom;
            }

            if($user->typeCompte == 0)
                $view = 'pages/admin/lists/admin_rdv';
            if($user->typeCompte == 1)
                $view = 'pages/mdcin/lists/list_intervention';
            if($user->typeCompte == 2)
                $view = 'pages/infm/lists/list_rdv';

            $i = 0;
            return view($view, ['rdvs' => $rdvs, 'i' => $i]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typesRdv = TypeRdv::all();
        return view('pages/patients/form/patient_rdv', ['typesRdv' => $typesRdv]);
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
            'type_rdv_id' => 'required',
            'dateSouhaite' => 'required|date',
            'heureSouhaite' => 'required'
        ]);

        if($validator->fails())
        {
            Flashy::error('Veuillez renseigner des informations correctes svp!');
            return back()->withInput();
        }

        $rdv = new Rdv();
        $rdv->type_rdv_id = $request->type_rdv_id;
        $rdv->dateSouhaite = $request->dateSouhaite;
        $rdv->heureSouhaite = $request->heureSouhaite;
        $rdv->dateRdv = $request->dateSouhaite;
        $rdv->heureRdv = $request->heureSouhaite;
        $rdv->patient_id = Patient::where('user_id', Auth::user()->id)->first()->id;
        $rdv->save();

        Flashy::success('Rendez-vous enregistré avec succès');
        return redirect()->route('rdvpatient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rdv $rdv)
    {
        $user = User::findOrFail(Auth::user()->id);
        if($user->typeCompte == 0)
            $view = 'pages/admin/form/intervention_form_show';
        if($user->typeCompte == 1)
            $view = 'pages/mdcin/lists/detail_rdv';
        if($user->typeCompte == 2)
            $view = 'pages/infm/lists/detail_rdv';

            $rdv = DB::table('rdvs')
            ->join('type_rdvs', 'type_rdvs.id', 'rdvs.type_rdv_id')
            ->join('patients', 'patients.id', 'rdvs.patient_id')
            ->join('infirmieres', 'infirmieres.id', 'rdvs.inf_id')
            ->join('medecins', 'medecins.id', 'rdvs.med_id')
            ->where('rdvs.id', $rdv->id)
            ->select('rdvs.*', 'patients.nom as nomP', 'patients.prenom as prenomP', 'type_rdvs.nomType', 'type_rdvs.description', 'infirmieres.nom as nomInf', 'infirmieres.prenom as prenomInf', 'medecins.nom as nomMed', 'medecins.prenom as prenomMed')->first();

            $resultats = Resultat::where('rdv_id', $rdv->id)->get();
            return view($view, ['rdv' => $rdv, 'resultats' => $resultats]);
        //$patient = $patient[0];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rdv $rdv)
    {
        if($rdv->etat == 0)
        {
            $medecins = Medecin::all();
            $rdv = DB::table('rdvs')
                                  ->join('type_rdvs', 'type_rdvs.id', 'rdvs.type_rdv_id')
                                  ->join('patients', 'patients.id', 'rdvs.patient_id')
                                  ->where('rdvs.id', $rdv->id)
                                  ->select('rdvs.*', 'patients.nom', 'patients.prenom', 'type_rdvs.nomType')->first();
            return view('pages/infm/form/patient_rdv2', ['medecins' => $medecins, 'rdv' => $rdv]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rdv $rdv)
    {
        $validator = Validator::make($request->all(), [
            'dateRdv' => 'required|date',
            'med_id' => 'required|integer',
            'heureRdv' => 'required',
        ]);

        if($validator->fails())
        {
            Flashy::error('Veuillez renseigner des informations correctes svp!');
            return back()->withInput();
        }
        $request->inf_id = Infirmiere::where('user_id', $request->inf_id)->first();

        $rdv->update([
            'dateRdv' => $request->dateRdv,
            'heureRdv' => $request->heureRdv,
            'med_id' => $request->med_id,
            'etat' => 1,
            'inf_id' => Infirmiere::where('user_id', Auth::user()->id)->first()->id
        ]);
        Flashy::success('Rendez-vous validé avec succès');
        return redirect()->route('rdv.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rdv $rdv)
    {
        if($rdv->etat == 0)
         {
             $rdv->update(['isDel' => 1]);
             Flashy::success('Rendez-vous supprimé avec succès');
             return redirect()->route('rdv.index');
         }

        if($rdv->etat == 1)
         {
             $rdv->update(['etat' => 2]);
             Flashy::success('Rendez-vous Annulé avec succès');
             return redirect()->route('rdv.index');
         }

        if($rdv->etat == 2)
         {
             $rdv->update(['isDel' => 1]);
             Flashy::success('Rendez-vous supprimé avec succès');
             return redirect()->route('rdv.index');
         }

    }
}
