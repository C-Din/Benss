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
                                <h4 class="card-title">Formulaire de gestion des patients</h4>
                                <form class="form-sample" method="POST" action="{{ route('mregister') }}">
                                    {{ csrf_field() }}
                                  <p class="card-description"> Informations personnelles </p>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="dateNaiss">Date de naissance</label>
                                          <input type="date" class="form-control" name="dateNaiss" id="dateNaiss" placeholder="dd/mm/yyyy" required />
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="lieuNaiss">Lieu de naissance</label>
                                          <input type="text" name="lieuNaiss" id="lieuNaiss" class="form-control" placeholder="Lieu de naissance" required/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="sexe">Sexe</label>
                                        <select id="sexe" name="sexe" class="form-control">
                                          <option value="Masculin">Masculin</option>
                                          <option value="Feminin">Feminin</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                      <label for="avatar">Avatar</label>
                                      <div class="input-group col-xs-12">
                                        <input type="file" class="form-control file-upload-info" placeholder="Sélectionner une Image">
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-info" type="button">Télécharger</button>
                                        </span>
                                      </div>
                                    </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="telephone">Téléphone</label>
                                        <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Téléphone">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Rue/Ville/Pays">
                                      </div>
                                    </div>
                                  </div>
                                  <p class="card-description"> Informations du compte </p>
                                  <div class="row">
                                    <input type="hidden" name="typeCompte" value="3"\>
                                    <input type="hidden" name="inf_id" value="{{ Auth::user()->id }}"\>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="username">Nom d'utilisateur</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Nom d'utilisateur">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="mail">Email</label>
                                        <input type="email" name="email" class="form-control" id="mail" placeholder="Email">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="mdp">Mot de passe</label>
                                        <input type="password" name="password" class="form-control" id="mdp" placeholder="Mot de passe">
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
