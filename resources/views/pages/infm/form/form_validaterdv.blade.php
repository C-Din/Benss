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
                                    <li><a href="{{ route('infirmRdvList') }}">Rendez-vous</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Rendez-vous</a></li>
                                    <li><a href="#">Validation</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Formulaire de validation d'un Rendez-vous</h4>
                                <form class="form-sample">
                                    <p class="card-description"> Informations du Rendez-vous </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="patient">Patient</label>
                                                <select id="patient" name="patient" class="form-control">
                                                    <option>Sélectionner le patient</option>
                                                    <option selected>James douanla</option>
                                                    <option>red</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="whit">Personnel</label>
                                                <select id="whit" name="whit" class="form-control">
                                                    <option>Sélectionner le personnel</option>
                                                    <option>James douanla</option>
                                                    <option>red</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="objet">Objet</label>
                                                <select id="objet" name="objet" class="form-control">
                                                    <option>Sélectionner l'objet du RDV</option>
                                                    <option selected>Cosultation</option>
                                                    <option>eco</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="datenais">Date sugession patient</label>
                                                <input type="texte" class="form-control" name="datenais" value="17/11/2020" id="datenais" placeholder="dd/mm/yyyy" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="datenais">Date du RDV</label>
                                                <input type="date" class="form-control" name="datenais" id="datenais" placeholder="dd/mm/yyyy" />
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-description"> Informations de l'intervention </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="medcpart">Medecins qui participeront à l'ntervention</label>
                                                <select multiple id="medcpart" name="medcpart" class="form-control">
                                                    <option>Sélectionner le/les medecins</option>
                                                    <option>Medecin1</option>
                                                    <option>Medecin2</option>
                                                    <option>Medecin3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="infpart">Infirmiers qui participeront à l'ntervention</label>
                                                <select multiple id="infpart" name="infpart" class="form-control">
                                                    <option>Sélectionner le/les infirmiers</option>
                                                    <option>Infirmier1</option>
                                                    <option>Infirmier2</option>
                                                    <option>Infirmier3</option>
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