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
                                    <li><a href="{{ route('homeInfirm') }}">Dashboard</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Patients</a></li>
                                    <li><a href="#">Nom Patients</a></li>
                                    <li><a href="#">Dossier Medical</a></li>
                                    <li><a href="#">Intervention</a></li>
                                    <li><a href="#">Ordonances</a></li>
                                    <li><a href="#">Soins</a></li>
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
                                    </div>
                                    <table class="table table-bordered table-hover mt-2">
                                        <thead>
                                            <tr>
                                                <th style="border: 1px solid #dee2e6;"> # </th>
                                                <th style="border: 1px solid #dee2e6;"> Responsable</th>
                                                <th style="border: 1px solid #dee2e6;"> M??dicament</th>
                                                <th style="border: 1px solid #dee2e6;"> Date</th>
                                                <th style="border: 1px solid #dee2e6;"> Heure</th>
                                                <th style="border: 1px solid #dee2e6;"> Quantit??</th>
                                                <th style="border: 1px solid #dee2e6;"> Unit??</th>
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
                                                <td> Comprim?? (s) </td>
                                                <td> Non administr?? </td>
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
            @include('pages/partials/infm/_footerInfm')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

@endsection