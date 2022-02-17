@extends('base')

@section('title', 'Test app | Home')

@section('content')

<div class="container-scroller">
    <!-- /partials/_navbar -->
    @include('pages/partials/patient/_navbarPatient')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- /partials/_sidebar -->
        @include('pages/partials/patient/_sidebarPatient')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row page-title-header" style="margin-bottom: 0;">
                    <div class="col-12">
                        <div class="page-header">
                            <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                                <ul class="quick-links" style="padding-left: 0;">
                                    <li><a href="#">Interventions</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Interventions</a></li>
                                    <li><a href="#">Détails</a></li>
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
                                    <div class="col-md-12 mb-3">
                                        <h4 class="card-title">Détail du rendez-vous</h4>

                                        <div class="row" style="border: 1px solid #ccc; padding-top: 1rem; padding-bottom: 1rem;">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $rdv->nomType }}</p>
                                                        <p style="margin-bottom: 0; color: #aaa;">Type du rendez-vous</p>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $rdv->dateRdv }}</p>
                                                        <p style="margin-bottom: 0; color: #aaa;">Date</p>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $rdv->heureRdv }}</p>
                                                        <p style="margin-bottom: 0; color: #aaa;">Heure</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $rdv->description }}</p>
                                                        <p style="margin-bottom: 0; color: #aaa;">Medecin</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <h5 class="card-title">Medecin</h5>

                                                    <ul>
                                                        <li>{{ $rdv->nomMed.' '.$rdv->prenomMed}}</li>
                                                    </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <h5 class="card-title">Infirmière (s)</h5>
                                                <ul>
                                                    <li>{{ $rdv->nomInf.' '.$rdv->prenomInf }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <h4 class="card-title">Résultat et ordonnance</h4>

                                        <div class="row" style="border: 1px solid #ccc; padding-top: 1rem; padding-bottom: 1rem;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($resultats as $result)
                                                        <div class="col-md-2 mb-3">
                                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $result->created_at  }}</p>
                                                            <p style="margin-bottom: 0; color: #aaa;">Date</p>
                                                        </div>
                                                        <div class="col-md-5 mb-3">
                                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $result->commentaire }}</p>
                                                            <p style="margin-bottom: 0; color: #aaa;">Commentaire</p>
                                                        </div>
                                                        <div class="col-md-5 mb-3">
                                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $result->prescription }}</p>
                                                            <p style="margin-bottom: 0; color: #aaa;">Prescription</p>
                                                        </div>
                                                    @endforeach
                                                </div>
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
            @include('pages/partials/patient/_footerPatient')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

@endsection
