<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Medecin;
use App\Models\Infirmiere;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Flashy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        //return $user->typeCompte;
        if($user->typeCompte == 0)
        {
            $person = Admin::where('user_id', $user->id)->first();
            $view = 'pages/admin/form/admin_profil';
            return view($view, ['person' => $person, 'user' => $user]);
        }
        if($user->typeCompte == 1)
         {
            $person = Medecin::where('user_id', $user->id)->first();
            $view = 'pages/mdcin/form/mdcin_profil';
            return view($view, ['person' => $person, 'user' => $user]);
         }
        if($user->typeCompte == 2)
        {
            $person = Infirmiere::where('user_id', $user->id)->first();
            $view = 'pages\infm\form\infirm_profil';
            return view($view, ['person' => $person, 'user' => $user]);
        }
        if($user->typeCompte == 3)
        {
            $person = Patient::where('user_id', $user->id)->first();
            $view = 'pages/patients/form/patient_profil';
            return view($view, ['person' => $person, 'user' => $user]);
        }

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
        $validator = Validator::make($request->all(), [
            'last_password' => 'required|string||max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if($validator->fails())
        {
            Flashy::error('LA confirmation du mot de passe ne correspond pas!');
            return back()->withInput();
        }

        $user = User::findOrFail($id);

        if(Auth::attempt(['email' => $user->email, 'password' => $request->last_password]))
        {
            $user->update(['password'=>bcrypt($request->password),]);
        }
        else
        {
            Flashy::error('L\'ancien mot de passe n\'est pas correct');
            return back()->withInput();
        }

        Flashy::success('Votre mot de passe a été mis à jour avec succès');
        return back()->withInput();
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
