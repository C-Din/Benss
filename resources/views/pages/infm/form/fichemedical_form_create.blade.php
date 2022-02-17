@extends('base')

@section('title', 'Test app | Home')

@section('content')

<div class="container-scroller">
      <!-- /partials/_navbar -->
      @include('pages/partials/infm/_navbarInfm')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- /partials/_sidebar -->
        @include('pages/partials/infm/_sidebarInfm')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row page-title-header" style="margin-bottom: 0;">
                    <div class="col-12">
                        <div class="page-header">
                            <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                                <ul class="quick-links" style="padding-left: 0;">
                                    <li><a href="{{ route('infirmPatientList') }}">Patients</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Patients</a></li>
                                    <li><a href="#">Formulaire</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Fiche médicale du patient {{ $patient->nom.' '.$patient->prenom }}</h4>
                                <form class="form-sample" method="POST" action="{{ route('dossier.store') }}">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="grpsanguin">Groupe Sanguin</label>
                                            <select id="grpsanguin" name="groupe_sanguin" class="form-control">
                                            <option value="A">A</option>
                                            <option value="O">O</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="taille">Taille</label>
                                            <input type="number" name="taille" class="form-control" id="taille" placeholder="Taille du patient">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="poid">Poid</label>
                                            <input type="number" name="poids" class="form-control" id="poid" placeholder="Poid du patient">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tention">Tension</label>
                                            <input type="number" name="tension" class="form-control" id="tention" placeholder="Tension du patient">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="musculsqul">Musculo squelettique</label>
                                            <select id="musculsqul" name="musculo_squelettiqu" class="form-control">
                                                <option value="Douleur articulaire">Douleur articulaire </option>
                                                <option value="Ataxie">Ataxie</option>
                                                <option value="Blocage du genoux">Blocage du genoux</option>
                                                <option value="Crampes musculaires">Crampes musculaires</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="geniturin">Génito urinaire</label>
                                            <select id="geniturin" name="genito_urinaire" class="form-control">
                                                <option value="Brûlement mictionnel">Brûlement mictionnel</option>
                                                <option value="Douleurs au bas du dos">Douleurs au bas du dos</option>
                                                <option value="Douleurs testiculaires">Douleurs testiculaires</option>
                                                <option value="Dyspareunie">Dyspareunie</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nerologie">Neurologie</label>
                                            <select id="nerologie" name="neurologie" class="form-control">
                                                <option value="Ataxie">Ataxie</option>
                                                <option value="Confusion">Confusion</option>
                                                <option value="Convulsions">Convulsions</option>
                                                <option value="Engourdissements">Engourdissements</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="dermo">Dermo</label>
                                            <select id="dermo" name="dermo" class="form-control">
                                                <option value="Changement de couleur">Changement de couleur</option>
                                                <option value="Éruption cutanée">Éruption cutanée</option>
                                                <option value="Érythème cutané">Érythème cutané</option>
                                                <option value="Grosseur ou masse">Grosseur ou masse</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tyng">TYNG</label>
                                            <select id="tyng" name="tyng" class="form-control">
                                                <option value="Acouphènes">Acouphènes</option>
                                                <option value="Baisse d\'acuité auditive">Baisse d'acuité auditive</option>
                                                <option value="Congestion nasale">Congestion nasale</option>
                                                <option value="Diplopie">Diplopie</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="psy">Psycatrique</label>
                                            <select id="psy" name="psycatrique" class="form-control">
                                                <option value="Agitation">Agitation</option>
                                                <option value="Attaque de panique">Attaque de panique</option>
                                                <option value="Délire et démence">Délire et démence</option>
                                                <option value="Dépréssion">Dépréssion</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="blessure">Blessures</label>
                                            <select id="blessure" name="blessure" class="form-control">
                                               <option value="Coupurer">Coupurer</option>
                                                <option value="Écchymose">Écchymose</option>
                                                <option value="Entorses">Entorses</option>
                                                <option value="Fracture d\'un membre">Fracture d'un membre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="gastro">Gastro</label>
                                            <select id="gastro" name="gastro" class="form-control">
                                               <option value="Ballonnements et flatulences">Ballonnements et flatulences</option>
                                                <option value="Brûlement d\'estomac">Brûlement d'estomac</option>
                                                <option value="Constipation">Constipation</option>
                                                <option value="Diarrhée">Diarrhée</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="resp">Respiratoire</label>
                                            <select id="resp" name="respiratoire" class="form-control">
                                                <option value="Cyanose">Cyanose</option>
                                                <option value="Congestion nasale">Congestion nasale</option>
                                                <option value="Douleur à la poitrine">Douleur à la poitrine</option>
                                                <option value="Dyspnée (essoufflement)">Dyspnée (essoufflement)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="endo">Endotrinien</label>
                                            <select id="endo" name="endoctrinien" class="form-control">
                                                <option value="Bouffées de chaleur">Bouffées de chaleur</option>
                                                <option value="Douleur à un sein">Douleur à un sein</option>
                                                <option value="Faim excessive">Faim excessive</option>
                                                <option value="▪ Haleine fruitée">▪ Haleine fruitée</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="coeur">Coeur</label>
                                            <select id="coeur" name="coeur" class="form-control">
                                                <option value="Anxiété (contexte cardiaque)">Anxiété (contexte cardiaque)</option>
                                                <option value="Claudication intermittente">Claudication intermittente</option>
                                                <option value="Crampes au mollet">Crampes au mollet</option>
                                                <option value="Dépilation des jambes">Dépilation des jambes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="symtome">Symtomes</label>
                                            <select id="symtome" name="symtome" class="form-control">
                                                <option value="Adénopathie cervicale">Adénopathie cervicale</option>
                                                <option value="Amaigrissement">Amaigrissement</option>
                                                <option value="Étourdissements (vertiges)">Étourdissements (vertiges)</option>
                                                <option value="Faiblesse généralisée">Faiblesse généralisée</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12" style="text-align: center;">
                                    <input type="submit" class="btn btn-primary mr-2" value = "Valider">
                                    <input type="reset" value="Annuler" class="btn btn-danger">
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!-- content-wrapper ends -->



          <!-- /partials/_footer -->
          @include('pages/partials/infm/_footerInfm')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

@endsection
