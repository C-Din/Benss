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
                                    <li><a href="{{ route('homeInfirm') }}">Dashboard</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Patients</a></li>
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
                                            <h4 class="card-title" style="margin-bottom: 0;">Liste des Patients</h4>
                                        </li>
                                    </ul>
                                    <ul class="quick-links ml-auto">
                                        <li>
                                            <a href="{{ route('patient.create') }}" type="button" class="btn btn-primary btn-fw" style="color: #fff; width: auto; min-width: auto; padding-right: 24px;">
                                            <i class="mdi mdi-plus"></i> Ajouter
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <p class="card-description"> Add class <code>.table-bordered</code> </p> -->
                                <table class="table table-bordered table-hover mt-2">
                                <thead>
                                    <tr>
                                    <th style="border: 1px solid #dee2e6;"> # </th>
                                    <th style="border: 1px solid #dee2e6;"> Nom et prénom </th>
                                    <th style="border: 1px solid #dee2e6;"> Téléphone </th>
                                    <th style="border: 1px solid #dee2e6;"> Email </th>
                                    <th style="border: 1px solid #dee2e6;"> Nom dutilisateur </th>
                                    <th style="border: 1px solid #dee2e6;"> Sexe</th>
                                    <th style="border: 1px solid #dee2e6; text-align: center;"> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patients as $patient)
                                        <tr>
                                            <td> {{ ++$i }} </td>
                                            <td> {{ $patient->nom.' '.$patient->prenom }} </td>
                                            <td> {{ $patient->telephone }} </td>
                                            <td> {{ $patient->email }}</td>
                                            <td> {{ $patient->username }} </td>
                                            <td> {{ $patient->sexe }} </td>
                                            <td style="text-align: center;">
                                                <form action="{{ route('patient.destroy',$patient->id) }}" method="POST">
                                                    <a  href="{{ route('dossier.show',$patient->id) }}" class="btn btn-icons btn-inverse-secondary">
                                                        <i class="mdi mdi-eye"></i>
                                                        </a>
                                                        <a href="{{ route('dossier.edit',$patient->id) }}" class="btn btn-icons btn-inverse-success">
                                                            <i class="mdi mdi-pencil"></i>
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-icons btn-inverse-danger">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                </form>
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
          @include('pages/partials/mdcin/_footerMdcin')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

@endsection
