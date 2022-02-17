<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Rdv;
use App\Models\TypeRdv;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Resultat;
use Flashy;
use Illuminate\Support\Facades\DB;

class RdvPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Patient::where('user_id', Auth::user()->id)->first();
        $rdvAll = Rdv::where('patient_id', $patient->id)
                        ->whereIn('etat', array(0,1,2))
                        ->where('isDel', 0)
                        ->get();

        foreach($rdvAll as $rdv)
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

                $temp = Medecin::findOrFail($rdv->med_id);
                $rdv->med_id = $temp->nom.' '.$temp->prenom;
            }

            $rdv->type_rdv_id = TypeRdv::findOrFail($rdv->type_rdv_id)->nomType;

        }


        $i = 0;
        return view('pages.patients.lists.patient_rdv', ['rdvs' => $rdvAll, 'i' => $i]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rdv = DB::table('rdvs')
                            ->join('type_rdvs', 'type_rdvs.id', 'rdvs.type_rdv_id')
                            ->join('infirmieres', 'infirmieres.id', 'rdvs.inf_id')
                            ->join('medecins', 'medecins.id', 'rdvs.med_id')
                            ->where('rdvs.id', $id)
                            ->select('rdvs.*','type_rdvs.nomType', 'type_rdvs.description', 'infirmieres.nom as nomInf', 'infirmieres.prenom as prenomInf', 'medecins.nom as nomMed', 'medecins.prenom as prenomMed')->first();
       $resultats = Resultat::where('rdv_id', $id)->get();

      return view('pages/patients/lists/detail_rdv', ['rdv' => $rdv, 'resultats' => $resultats]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rdv = DB::table('rdvs')
                            ->join('type_rdvs', 'type_rdvs.id', 'rdvs.type_rdv_id')
                            ->where('rdvs.id', $id)
                            ->select('rdvs.*', 'type_rdvs.nomType', 'type_rdvs.id as type_id')->first();
        $typesRdv = TypeRdv::all();

        return view('pages/patients/form/patient_rdv2', ['rdv' => $rdv, 'typesRdv' => $typesRdv]);
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
        $rdv = Rdv::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'dateSouhaite' => 'required|date',
            'heureSouhaite' => 'required',
            'type_rdv_id' => 'required|integer'
        ]);

        if($validator->fails())
        {
            Flashy::error('Veuillez renseigner des informations correctes svp!');
            return back()->withInput();
        }

        $rdv->update([
            'dateSouhaite' => $request->dateSouhaite,
            'dateRdv' => $request->dateSouhaite,
            'heureSouhaite' => $request->heureSouhaite,
            'heureRdv' => $request->heureSouhaite,
            'type_rdv_id' => $request->type_rdv_id
        ]);
        Flashy::success('Rendez-vous modifié avec succès');
        return redirect()->route('rdvpatient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rdv = Rdv::findOrFail($id);
        if($rdv->etat == 1)
        {
            $rdv->update(['etat' => 2]);
            Flashy::success('Rendez-vous annulé avec succès');
            return back()->withInput();
        }
        elseif($rdv->etat == 0 || $rdv->etat == 2)
        {
            $rdv->update(['isDel' => 1]);
            Flashy::success('Rendez-vous supprimé avec succès');
            return back()->withInput();
        }

    }
}
