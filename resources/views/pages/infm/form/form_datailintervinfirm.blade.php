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
                                    <li><a href="{{ route('homePatient') }}">Dashboard</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Opérations</a></li>
                                    <li><a href="#">Interventions</a></li>
                                    <li><a href="#">Détail</a></li>
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
                                        <h4 class="card-title">Détail de l'intervention</h4>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">Consultation</p>
                                                        <p style="margin-bottom: 0; color: #aaa;">Type d'intervention</p>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">15/12/2020</p>
                                                        <p style="margin-bottom: 0; color: #aaa;">Date</p>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">Programmé</p>
                                                        <p style="margin-bottom: 0; color: #aaa;">Etat</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">description de l'intervention</p>
                                                        <p style="margin-bottom: 0; color: #aaa;">Commentaire</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <h5 class="card-title">Medecin (s)</h5>
                                                <ul>
                                                    <li>Medecin 1</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <h5 class="card-title">Infirmier (s)</h5>
                                                <ul>
                                                    <li>Infirmier 1</li>
                                                    <li>Infirmier 2</li>
                                                    <li>Infirmier 3</li>
                                                </ul>
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
            @include('pages/partials/infm/_footerInfm')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

@endsection