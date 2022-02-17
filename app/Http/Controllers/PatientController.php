<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\User;
use Flashy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
       /* $patients =  DB::select('select patients.nom  as nom, patients.prenom as prenom, patients.telephone as telephone, users.username as username, patients.sexe as sexe, patients.id as
         from users where active = ?', [1])*/

        $patients = DB::table('patients')
                                    ->join('users', 'users.id', 'patients.user_id')
                                    ->orderBy('nom')
                                    ->where('patients.isDel', '<>', 1)
                                    ->select('patients.*', 'users.username', 'users.email')->get();
        if($user->typeCompte == 0)
             $view = 'pages/admin/lists/admin_userpatient';
        if($user->typeCompte == 1)
            $view = 'pages/mdcin/lists/list_patient';
        if($user->typeCompte == 2)
        $view = 'pages/infm/lists/list_patient';
        $i = 0;
        return view($view, ['patients' => $patients, 'i' => $i]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/infm/form/form_patient');
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
        $patient = Patient::findOrFail($id);
        $patient->update(['isDel' => 1]);
        Flashy::success('Patient supprimé avec succès');
        return back()->withInput();
    }
}
