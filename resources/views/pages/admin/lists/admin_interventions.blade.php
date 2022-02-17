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
                                    <li><a href="#">Operations</a></li>
                                    <li><a href="#">Rendez-vous</a></li>
                                    <li><a href="#">Liste</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                                    <ul class="quick-links" style="padding-left: 0;">
                                        <li>
                                            <h4 class="card-title" style="margin-bottom: 0;">Liste des Interventions</h4>
                                        </li>
                                    </ul>
                                </div>
                                <table class="table table-bordered table-hover table-responsive-md mt-2">
                                    <thead>
                                        <tr>
                                            <th style="border: 1px solid #dee2e6;"> # </th>
                                            <th style="border: 1px solid #dee2e6;"> Patient </th>
                                            <th style="border: 1px solid #dee2e6;"> Type intervention </th>
                                            <th style="border: 1px solid #dee2e6;"> Date </th>
                                            <th style="border: 1px solid #dee2e6;"> Etat </th>
                                            <th style="border: 1px solid #dee2e6; text-align: center;"> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($interventions as $interv)
                                        <tr>
                                            <td> {{ ++$i }} </td>
                                            <td> {{ $interv->nom.' '.$interv->prenom }} </td>
                                            <td> {{ $interv->nomType }} </td>
                                            <td> {{ $interv->dateIntervention }} à {{ $interv->heureIntervention }} </td>
                                            @if($interv->etat == 0)
                                                <td> Programmée </td>
                                            @elseif($interv->etat == 1)
                                                <td> En cours </td>
                                            @elseif($interv->etat == 2)
                                                <td>Terminée </td>
                                            @endif
                                            <td style="text-align: center;">
                                                <a type="button" href="{{ route('interventions.show', $interv->id) }}" class="btn btn-icons btn-inverse-secondary">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
