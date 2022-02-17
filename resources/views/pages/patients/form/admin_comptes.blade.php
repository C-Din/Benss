@extends('base')

@section('title', 'Test app | Home')

@section('content')

<div class="container-scroller">
      <!-- /partials/_navbar -->
      @include('pages/partials/admin/_navbarAdmin')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- /partials/_sidebar -->
        @include('pages/partials/admin/_sidebarAdmin')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper"> 

            <div class="row page-title-header" style="margin-bottom: 0;">
              <div class="col-12">
                <div class="page-header">
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links" style="padding-left: 0;">
                      <li><a href="{{ route('comptelistAdmin') }}">Comptes</a></li>
                    </ul>
                    <ul class="quick-links ml-auto">
                      <li><a href="#">Comptes</a></li>
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
                    <h4 class="card-title">Formulaire de création des comptes</h4>
                    <form class="form-sample">
                      <p class="card-description"> Informations personnelles </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="firstname">Nom</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Nom">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="lastname">Prénom</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Prénom">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="datenais">Date de naissance</label>
                              <input type="date" class="form-control" name="datenais" id="datenais" placeholder="dd/mm/yyyy" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="lieunais">Lieu de naissance</label>
                              <input type="text" name="lieunais" id="lieunais" class="form-control" placeholder="Lieu de naissance" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="gender">Sexe</label>
                            <select id="gender" name="gender" class="form-control">
                              <option>Sélectionner le sexe</option>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="avatar">Avatar</label>
                          <div class="input-group col-xs-12">
                            <input type="file" class="form-control file-upload-info" placeholder="Sélectionner une Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                            </span>
                          </div>
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="tel">Téléphone</label>
                            <input type="tel" name="tel" class="form-control" id="tel" placeholder="Téléphone">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="adr">Adresse</label>
                            <input type="text" name="adr" class="form-control" id="adr" placeholder="Rue/Ville/Pays">
                          </div>
                        </div>
                      </div>
                      <p class="card-description"> Informations du compte </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="gender">Type de compte</label>
                            <select id="gender" name="gender" class="form-control">
                              <option>Sélectionner le type de compte</option>
                              <option>Admin</option>
                              <option>Medecin</option>
                              <option>Infirmier</option>
                            </select>
                          </div>
                        </div>
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
                            <input type="email" name="mail" class="form-control" id="mail" placeholder="Email">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="mdp">Mot de passe</label>
                            <input type="password" name="mdp" class="form-control" id="mdp" placeholder="Mot de passe">
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
          @include('pages/partials/admin/_footerAdmin')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

@endsection