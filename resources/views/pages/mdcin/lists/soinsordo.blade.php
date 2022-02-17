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
                                    <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                                        <ul class="quick-links" style="padding-left: 0;">
                                            <li>
                                                <h4 class="card-title" style="margin-bottom: 0;">Liste des soins de l'ordonance</h4>
                                            </li>
                                        </ul>
                                        <ul class="quick-links ml-auto">
                                            <li>
                                                <a href="" type="button" class="btn btn-primary btn-fw" style="color: #fff; width: auto; min-width: auto; padding-right: 24px;">
                                                    <i class="mdi mdi-plus"></i> Ajouter
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <table class="table table-bordered table-hover mt-2">
                                        <thead>
                                            <tr>
                                                <th style="border: 1px solid #dee2e6;"> # </th>
                                                <th style="border: 1px solid #dee2e6;"> Responsable</th>
                                                <th style="border: 1px solid #dee2e6;"> Médicament</th>
                                                <th style="border: 1px solid #dee2e6;"> Date</th>
                                                <th style="border: 1px solid #dee2e6;"> Heure</th>
                                                <th style="border: 1px solid #dee2e6;"> Quantité</th>
                                                <th style="border: 1px solid #dee2e6;"> Unité</th>
                                                <th style="border: 1px solid #dee2e6;"> Etat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> 1 </td>
                                                <td> Raymond </td>
                                                <td> Paracetamole </td>
                                                <td> 15/11/2020 </td>
                                                <td> 8h </td>
                                                <td> 2 </td>
                                                <td> Comprimé (s) </td>
                                                <td> Non administré </td>
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