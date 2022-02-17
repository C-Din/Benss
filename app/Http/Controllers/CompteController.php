<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use App\Models\Medecin;
use App\Models\Infirmiere;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Flashy;

class CompteController extends Controller
{

    use AuthenticatesUsers;

    public function index()
    {
        $i = 0;
        $admins = DB::table('users')
                                ->join('admins', 'users.id', '=', 'admins.user_id')
                                ->select('users.*', 'admins.*')
                                ->get();

        $medecins = DB::table('users')
                                ->join('medecins', 'users.id', '=', 'medecins.user_id')
                                ->select('users.*', 'medecins.*')
                                ->get();

        $infirmieres = DB::table('users')
                                ->join('infirmieres', 'users.id', '=', 'infirmieres.user_id')
                                ->select('users.*', 'infirmieres.*')
                                ->get();

        $patients = DB::table('users')
                                ->join('patients', 'users.id', '=', 'patients.user_id')
                                ->select('users.*', 'patients.*')
                                ->get();
       return view('pages/admin/lists/admin_comptes', ['admins' => $admins, 'medecins' => $medecins, 'infirmieres' => $infirmieres, 'patients' => $patients, 'i' => $i]);
    }

   function getHomeUser()
    {
        $user = User::findOrFail(Auth::user()->id);
        if($user->typeCompte == 0)
        {
            return redirect(route('comptelistAdmin'));
        }
        elseif($user->typeCompte == 1)
        {
            return view('pages/mdcin/mede5_home');
        }
        if($user->typeCompte == 2)
        {
            return view('pages/infm/infirm_home');
        }
        if($user->typeCompte == 3)
        {
            return redirect(route('dossier.index'));
        }
    }

    public function isLogin()
    {
        if(auth()->guest())
        {
            return view('pages/login');
        }

        return redirect(route('home'));
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255'
        ]);

        if($validator->fails())
        {
         return back()->with('nono', 'Veuillez renseigner des informations correctes svp!');
        }


        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = User::where('email', $request->email)->first();
            $this->guard()->login($user);
            Flashy::success("Vous êtes connecté");

            return redirect(route('home'));
        }
        else
        {
            Flashy::error("Veuillez renseigner des informations correctes svp!");
            return back()->withInput();
        }
    }

    public function register(Request $request)
    {
       $validator = Validator::make($request->all(), [
           'username' => 'required|string|max:255',
           'password' => 'required|string|max:255|min:6',
           'email' => 'required|string|unique:users|max:255',
           'typeCompte' => 'required|integer',
           'nom' => 'required|string|max:255',
           'prenom' => 'required|string|max:255',
           'adresse' => 'required|string|max:255',
           'dateNaiss' => 'required',
           'lieuNaiss' => 'required|string|max:255',
           'sexe' => 'required|string|max:9',
           'telephone' => 'required|string|max:10',
       ]);

       if($validator->fails())
       {
        return back()->with('nono', 'Veuillez renseigner des informations correctes svp!');
       }


       $user = new User();
       $user->username = $request->username;
       $user->password = bcrypt($request->password);
       $user->email = $request->email;
       $user->etat = 1;
       $user->typeCompte = $request->typeCompte;
       $user->save();

       if($user->typeCompte == 0)
            $person =  new Admin();
       elseif($user->typeCompte == 1)
            $person =  new Medecin();
       elseif($user->typeCompte == 2)
             $person =  new Infirmiere();
       else
       {
           $person = new Patient();
           if(isset($request->inf_id))
           $person->inf_id = Infirmiere::where('user_id', $request->inf_id)->first()->id;
       }


        $person->nom = $request->nom;
        $person->prenom = $request->prenom;
        $person->dateNaiss = $request->dateNaiss;
        $person->adresse = $request->adresse;
        $person->lieuNaiss = $request->lieuNaiss;
        $person->sexe = $request->sexe;
        $person->telephone = $request->telephone;
        $person->user_id = $user->id;
        $person->save();

        if(isset($request->new))
        {
            Flashy::success("Votre demande de compte a été soumis avec succès! Vous aurez une réponse dans les brefs délais");
            return redirect(route('loginPage'));
        }
        Flashy::success("Utilisateur enrgistré avec succès");
       return back()->withInput();

    }
}
