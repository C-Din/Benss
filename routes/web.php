<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TypeRdvController;
use App\Http\Controllers\RdvController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RdvPatientController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TypeInterventionController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\InfirmiereController;
use App\Http\Controllers\FicheMedicaleController;
use App\Http\Controllers\ResultatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/registerPage', function () {
    return view('pages/register');
})->name('registerPage');

// home pages
Route::get('/homeadmin', function(){
    return view('pages/admin/admin_home');
})->name('homeAdmin');//route vers la page d'accueil quand c'est un admin

Route::get('/homePatient', function(){
    return view('pages/patients/patient_home');
})->name('homePatient');//route vers la page d'accueil quand c'est un patient

Route::get('/homeinfirm', function(){
    return view('pages/infm/infirm_home');
})->name('homeInfirm');//route vers la page d'accueil quand c'est un infirmier

Route::get('/homemede5', function(){
    return view('pages/mdcin/mede5_home');
})->name('homeMede5');//route vers la page d'accueil quand c'est un medecin


// form and list element

//admin
Route::get('/listcompteadmin', function(){
    return view('pages/admin/lists/admin_comptes');
})->name('comptelistAdmin');//liste des comptes lorsque l'utilisateur connecté est un admin
Route::get('/listcompteadmin', [App\Http\Controllers\CompteController::class, 'index'])->name('comptelistAdmin');

Route::get('/formcompteadmin', function(){
    return view('pages/admin/form/admin_comptes');
})->name('compteformAdmin');//formulaire de création des comptes lorsque l'utilisateur connecté est un admin

Route::get('/listuseradmin', function(){
    return view('pages/admin/lists/admin_useradmin');
})->name('userAdminList');//liste des utilisateur ayant un compte admin lorsque le l'utilisateur connecté est un admin

Route::get('/listusermedecin', function(){
    return view('pages/admin/lists/admin_usermedecin');
})->name('userMedecinList');//liste des utilisateur ayant un compte medecin lorsque le l'utilisateur connecté est un admin

Route::get('/listuserinfirmier', function(){
    return view('pages/admin/lists/admin_userinfirmier');
})->name('userInfirmierList');//liste des utilisateur ayant un compte infirmier lorsque le l'utilisateur connecté est un admin

Route::get('/listuserpatient', function(){
    return view('pages/admin/lists/admin_userpatient');
})->name('userPatientList');//liste des utilisateur ayant un compte patient lorsque le l'utilisateur connecté est un admin

Route::get('/listrdvadmin', function(){
    return view('pages/admin/lists/admin_rdv');
})->name('adminRdvList');//liste des rdv lorsque l'utilisateur connecté est un admin

Route::get('/listinterventionadmin', function(){
    return view('pages/admin/lists/admin_interventions');
})->name('adminInterventionList');//liste des interventions lorsque l'utilisateur connecté est un admin


//patient
Route::get('/listpatientrdv', function(){
    return view('pages/patients/lists/patient_rdv');
})->name('patientRdvList');//liste des rdv lorsque l'utilisateur connecté est un patient

Route::get('/profilpatient', function(){
    return view('pages/patients/form/patient_profil');
})->name('profilPatient');//profil patient page

Route::get('/patientdossiermPatient', function(){
    return view('pages/patients/form/patien_fichemedical');
})->name('patientdossiermPatient');//dossier mediacal patient page

Route::get('/patientintervention', function(){
    return view('pages/patients/form/patient_resultatintervention');
})->name('patientinterventionpatient');//intervention patient page

Route::get('/patientordonance', function(){
    return view('pages/patients/form/patient_ordonanceresultat');
})->name('patientordonancepatient');//ordonance  patient page

Route::get('/patientsoins', function(){
    return view('pages/patients/form/patient_soinsordo');
})->name('patientsoinspatient');//ordonance  patient page

Route::get('/managepatientrdv', function(){
    return view('pages/patients/form/patient_rdv');
})->name('patientRdvForm');//prise de rdv patient


//infirmier
Route::get('/profilinfirm', function(){
    return view('pages/infm/form/infirm_profil');
})->name('profilInfirm');//profil patient page

Route::get('/listypesoins', function(){
    return view('pages/infm/lists/list_typesoin');
})->name('infirmTypeSoinList');//liste type de soins

Route::get('/gestypesoins', function(){
    return view('pages/infm/form/form_typesoin');
})->name('infirmTypeSoinForm');//form type de soins

Route::get('/listypeinterv', function(){
    return view('pages/infm/lists/list_typeintervention');
})->name('infirmTypeIntervList');//liste type de intervention

Route::get('/gestypeinterv', function(){
    return view('pages/infm/form/form_typeintervention');
})->name('infirmTypeIntervForm');//form type d'intervention

Route::get('/listrdv', function(){
    return view('pages/infm/lists/list_rdv');
})->name('infirmRdvList');//liste rdv

Route::get('/gesrdv', function(){
    return view('pages/infm/form/form_newrdv');
})->name('infirmRdvForm');//form rdv

Route::get('/validaterdv', function(){
    return view('pages/infm/form/form_validaterdv');
})->name('infirmValidateRdvForm');//form validate rdv

Route::get('/lispatientinf', function(){
    return view('pages/infm/lists/list_patient');
})->name('infirmPatientList');//liste patient

Route::get('/gespatient', function(){
    return view('pages/infm/form/form_patient');
})->name('infirmPatientForm');//form patient

Route::get('/dossiermpatient', function(){
    return view('pages/infm/form/form_dossiermedicalpatient');
})->name('infirmPatientDossierm');//dossier mediacal patient

Route::get('/resultatintervpatient', function(){
    return view('pages/infm/form/form_resultinterventionpatient');
})->name('infirmPatientResultatinterv');//dossier mediacal patient résultat intervention

Route::get('/ordoresultatintervpatient', function(){
    return view('pages/infm/form/form_ordoresultatpatient');
})->name('infirmPatientResultatintervordo');//dossier mediacal patient ordonance résultat intervention

Route::get('/soinsordoresultatintervpatient', function(){
    return view('pages/infm/form/form_soinsordopatient');
})->name('infirmPatientResultatintervordosoin');//dossier mediacal patient ordonance résultat intervention

Route::get('/infirmintervention', function(){
    return view('pages/infm/lists/list_infirmintervention');
})->name('infirmInterventionList');//Liste intervention infirmier

Route::get('/gesinfirmintervention', function(){
    return view('pages/infm/form/form_datailintervinfirm');
})->name('infirmInterventionForm');//form intervention infirmier

Route::get('/infirmsoins', function(){
    return view('pages/infm/lists/list_infirmsoins');
})->name('infirmSoinsList');//Liste soins infirmier

Route::get('/allintervention', function(){
    return view('pages/infm/lists/list_intervention');
})->name('infirmallInterventionList');//Liste intervention infirmier

Route::get('/gesallintervention', function(){
    return view('pages/infm/form/form_datailintervention');
})->name('infirmallInterventionForm');//form intervention infirmier

//medecin
Route::get('/profilmdcin', function(){
    return view('pages/mdcin/form/mdcin_profil');
})->name('profilMede5');//profil medecin page

Route::get('/patientmdcin', function(){
    return view('pages/mdcin/lists/list_patient');
})->name('mdcinPatientList');//list patient

Route::get('/dmpatientmdcin', function(){
    return view('pages/mdcin/lists/dossiermedicalpatient');
})->name('mdcinDossierPatient');//list dossier medical patient


// auth routes

//Auth::routes();

Route::post('/mregister', [App\Http\Controllers\CompteController::class, 'register'])->name('mregister');
Route::post('/mlogin', [App\Http\Controllers\CompteController::class, 'login'])->name('mlogin');
Route::get('/', [App\Http\Controllers\CompteController::class, 'isLogin'])->name('/');

Auth::routes();
Route::group(['middleware'=>'App\Http\Middleware\Auth',], function(){
    Route::resource('/typeRdv', TypeRdvController::class);
    Route::resource('/rdv', RdvController::class);
    Route::resource('/resultats', ResultatController::class);
    Route::resource('/typeIntervention', TypeInterventionController::class);
    Route::resource('/rdvpatient', RdvPatientController::class);
    Route::resource('/patient', PatientController::class);
    Route::resource('/admins', AdminController::class);
    Route::resource('/interventions', interventionController::class);
    Route::resource('/profile', ProfileController::class);
    Route::resource('/medecin', MedecinController::class);
    Route::resource('/dossier', FicheMedicaleController::class);
    Route::resource('/infirmiere', InfirmiereController::class);
    Route::get('/home', [App\Http\Controllers\CompteController::class, 'getHomeUser'])->name('home');
    Route::get('fiche', [App\Http\Controllers\FicheMedicaleController::class, 'create'])->name('fiche');
    /*Route::group(['middleware'=>'App\Http\Middleware\Admin',], function(){
        Route::resource('/typeRdv', TypeRdvController::class);
        Route::resource('/rdv', RdvController::class);
        Route::resource('/typeIntervention', TypeInterventionController::class);
        Route::resource('/rdvpatient', RdvPatientController::class);
    });*/

});

