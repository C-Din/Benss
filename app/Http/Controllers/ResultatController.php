<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Rdv;
use App\Models\Intervention;
use App\Models\Resultat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Flashy;

class ResultatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient)
    {
        $resultatsRdv = DB::select('SELECT * from resutats, rdvs, patients
                                             where resultats.rdv_id = rdvs.id
                                             and rdvs.patient_id = patients.id
                                             and patients.id = '.$patient->id.'');

        $resultatsInter = DB::select('SELECT * from resutats, interventions, patients
                                             where resultats.intervent_id = interventions.id
                                             and interventions.patient_id = patients.id
                                             and patients.id = '.$patient->id.'');
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

        $validator = Validator::make($request->all(), [
            'commentaire' => 'required|string'
        ]);

        if($validator->fails())
        {
            Flashy::error('Veuillez renseigner des informations correctes svp!');
            return back()->withInput();
        }
        //return $request->all();
        $resultat = new Resultat();
        $resultat->commentaire = $request->commentaire;
        $resultat->prescription = $request->prescription;

        if($request->type == "rdv")
            $resultat->rdv_id = $request->rdv_id;

        if($request->type == "interv")
            $resultat->intervention_id = $request->interv_id;

        $resultat->save();

        $rdv = Rdv::findOrFail($request->rdv_id);
        $rdv->update(['etat' => 3]);

        Flashy::success('Résultat enregistré avec succès');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages/mdcin/form/form_resultat_edit', ['id' => $id]);
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
        //
    }
}
