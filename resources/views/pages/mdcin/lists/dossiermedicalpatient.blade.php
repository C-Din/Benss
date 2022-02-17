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
                                    <li><a href="{{ route('homeMede5') }}">Dashboard</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Patients</a></li>
                                    <li><a href="#">Patient</a></li>
                                    <li><a href="#">Dossier Mediacl</a></li>
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
                                    <div class="col-md-12">
                                        <h4 class="card-title">Informations personnelles</h4>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">James william</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Nom</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">Douanla James</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Prénom</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">15/20/1985</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Date de naissance</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">Yaounde</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Lieu de naissance</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">Male</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Sexe</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">656603976</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Téléphone</p>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">Beteng/Yaounde/Cameroun</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Adresse</p>
                                            </div>
                                        </div>
                                        <h4 class="card-title">Informations du compte</h4>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">Ghost</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Nom d'utilisateur</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">jamesdouanla@gmail.com</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Email</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <h4 class="card-title">Fiche Médicale</h4>
                                        <div class="row" style="border: 1px solid #ccc; padding-top: 1rem; padding-bottom: 1rem;">
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">A</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Groupe Sanguin</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">1.75</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Taille</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">50 Kg</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Poid</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">10</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Tension</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Musculosquelettique</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Génitourinaire</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Neurologie</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Dermo</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">TYNG</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Psycatrique</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Blessure</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Gastro</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Respiratoire</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Endotrinien</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Coeur</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">valeur</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Symtomes</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap mt-5">
                                        <ul class="quick-links" style="padding-left: 0;">
                                            <li>
                                            <h4 class="card-title" style="margin-bottom: 0;">Liste des Interventions</h4>
                                            </li>
                                        </ul>
                                        </div>
                                        <table class="table table-bordered table-hover mt-2">
                                        <thead>
                                            <tr>
                                            <th style="border: 1px solid #dee2e6;"> # </th>
                                            <th style="border: 1px solid #dee2e6;"> Type intervention </th>
                                            <th style="border: 1px solid #dee2e6;"> Date </th>
                                            <th style="border: 1px solid #dee2e6;"> Etat </th>
                                            <th style="border: 1px solid #dee2e6; text-align: center;"> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td> 1 </td>
                                            <td> Consultation </td>
                                            <td> 03/12/2020 10h00 </td>
                                            <td> En attente </td>
                                            <td style="text-align: center;">
                                                <a type="button" href="{{ route('infirmPatientResultatinterv') }}" class="btn btn-icons btn-inverse-secondary">
                                                <i class="mdi mdi-eye"></i>
                                                </a>
                                            </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
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