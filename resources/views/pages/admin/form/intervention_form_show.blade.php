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
                                    <li><a href="{{ route('homeAdmin') }}">Dashboard</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Interventions</a></li>
                                    <li><a href="#">Consultation</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Informations de l'intervention</h4>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $intervention->nom.' '.$intervention->prenom }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Patient</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $intervention->nomType }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Type d'intervention</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $intervention->dateIntervention }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Date</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $intervention->heureIntervention }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Heure</p>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">
                                                    @if($intervention->etat == 0)
                                                         Programmée
                                                    @elseif($intervention->etat == 1)
                                                         En cours
                                                    @elseif($intervention->etat == 2)
                                                         Terminée
                                                    @endif
                                                </p>
                                                <p style="margin-bottom: 0; color: #aaa;">Etat</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $intervention->commentaire }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Commentaire</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h5 class="card-title">Medecin (s)</h5>
                                        <ul>
                                            @foreach($medecins as $medecin)
                                            <li>{{ $medecin->nom.' '.$medecin->prenom }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h5 class="card-title">Infirmier (s)</h5>
                                        <ul>
                                            @foreach($infirmieres as $infirm)
                                            <li>{{ $infirm->nom.' '.$infirm->prenom}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
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
