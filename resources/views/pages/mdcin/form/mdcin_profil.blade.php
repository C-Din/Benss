@extends('base')

@section('title', 'Test app | Home')

@section('content')

<div class="container-scroller">
      <!-- /partials/_navbar -->
      @include('pages/partials/mdcin/_navbarMdcin')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- /partials/_sidebar -->
        @include('pages/partials/mdcin/_sidebarMdcin')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="row page-title-header" style="margin-bottom: 0;">
              <div class="col-12">
                <div class="page-header">
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links" style="padding-left: 0;">
                      <li><a href="{{ route('homePatient') }}">Dashboard</a></li>
                    </ul>
                    <ul class="quick-links ml-auto">
                      <li><a href="#">{{ Auth::user()->username }}</a></li>
                      <li><a href="#">Profil</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title">Informations personnelles</h4>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $person->nom }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Nom</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $person->prenom }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Prénom</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $person->dateNaiss }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Date de naissance</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $person->lieuNaiss }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Lieu de naissance</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $person->sexe }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Sexe</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $person->telephone }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Téléphone</p>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $person->adresse }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Adresse</p>
                                    </div>
                                </div>
                                <h4 class="card-title">Informations du compte</h4>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $user->username }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Nom d'utilisateur</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $user->email }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Email</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12" style="border: 1px solid #ccc; padding-top: 1rem; padding-bottom: 1rem;">
                                        <h4 class="card-title">Mise à jour de sécurité</h4>
                                        <form action="{{ route('profile.update', $user->id) }}" method="POST" class="form-sample">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12 mb-1">
                                                    <div class="form-group">
                                                        <label for="mdp">Mot de passe actuel</label>
                                                        <input type="password" name="last_password" class="form-control" id="mdp" placeholder="Mot de passe" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-1">
                                                    <div class="form-group">
                                                        <label for="mdp">Nouveau mot de passe</label>
                                                        <input type="password" name="password" class="form-control" id="mdp" placeholder="Nouveau mot de passe" minlength="6" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-1">
                                                    <div class="form-group">
                                                        <label for="mdp">Confirmer nouveau mot de passe</label>
                                                        <input type="password" name="password_confirmation" class="form-control" id="mdp" placeholder="Confirmer nouveau mot de passe" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="text-align: center;">
                                                    <input type="submit" class="btn btn-primary mr-2" value="Mettre à jour">
                                                    <input type="reset" value="Annuler" class="btn btn-danger">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

          <!-- /partials/_footer -->
          @include('pages/partials/mdcin/_footerMdcin')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

@endsection
