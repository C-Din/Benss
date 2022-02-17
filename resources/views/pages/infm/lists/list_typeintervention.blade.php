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
                                    <li><a href="#">Configuration</a></li>
                                    <li><a href="#">Types Interventions</a></li>
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
                        <div class="row">
                            <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                                <ul class="quick-links" style="padding-left: 0;">
                                    <li>
                                    <h4 class="card-title" style="margin-bottom: 0;">Liste des types dInterventions</h4>
                                    </li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li>
                                        <a href="{{ route('typeIntervention.create') }}" type="button" class="btn btn-primary btn-fw" style="color: #fff; width: auto; min-width: auto; padding-right: 24px;">
                                        <i class="mdi mdi-plus"></i> Ajouter
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <table class="table table-bordered table-hover mt-2">
                            <thead>
                                <tr>
                                <th style="border: 1px solid #dee2e6;"> # </th>
                                <th style="border: 1px solid #dee2e6;"> libelle</th>
                                <th style="border: 1px solid #dee2e6;"> Description</th>
                                <th style="border: 1px solid #dee2e6; text-align: center;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($typesInter as $typeInter)
                                    <tr>
                                        <td> {{ ++$i }} </td>
                                        <td> {{ $typeInter->nomType }} </td>
                                        <td> {{ $typeInter->description }} </td>
                                        <td style="text-align: center;">
                                            <form action="{{ route('typeIntervention.destroy',$typeInter->id) }}" method="POST">
                                                <a  href="{{ route('typeIntervention.show',$typeInter->id) }}" class="btn btn-icons btn-inverse-secondary">
                                                    <i class="mdi mdi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('typeIntervention.show',$typeInter->id) }}" class="btn btn-icons btn-inverse-success">
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
