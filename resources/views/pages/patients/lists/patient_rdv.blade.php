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
                      <li><a href="{{ route('homePatient') }}">Dashboard</a></li>
                    </ul>
                    <ul class="quick-links ml-auto">
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
                        <h4 class="card-title" style="margin-bottom: 0;">Liste des Rendez-vous</h4>
                      </li>
                    </ul>
                    <ul class="quick-links ml-auto">
                      <li>
                        <a href="{{ route('rdv.create') }}" type="button" class="btn btn-primary btn-fw" style="color: #fff; width: auto; min-width: auto; padding-right: 24px;">
                          <i class="mdi mdi-plus"></i> Prendre RDV
                        </a>
                      </li>
                    </ul>
                  </div>
                    <!-- <p class="card-description"> Add class <code>.table-bordered</code> </p> -->
                    <table class="table table-bordered table-hover mt-2">
                      <thead>
                        <tr>
                          <th style="border: 1px solid #dee2e6;"> # </th>
                          <th style="border: 1px solid #dee2e6;"> Avec </th>
                          <th style="border: 1px solid #dee2e6;"> Objet </th>
                          <th style="border: 1px solid #dee2e6;"> Date RDV </th>
                          <th style="border: 1px solid #dee2e6;"> Heure RDV</th>
                          <th style="border: 1px solid #dee2e6;"> Etat </th>
                          <th style="border: 1px solid #dee2e6; text-align: center;"> Actions </th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($rdvs as $rdv)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $rdv['med_id'] }}</td>
                            <td>{{ $rdv['type_rdv_id'] }}</td>
                            <td>{{ $rdv['dateRdv'] }}</td>
                            <td>{{ $rdv['heureRdv'] }}</td>
                            <td>{{ $rdv['etat'] }}</td>
                              <td style="text-align: center;">
                                <form action="{{ route('rdvpatient.destroy',$rdv->id) }}" method="POST">
                                    @if($rdv->etat == 'En attente')
                                        <a href="{{ route('rdvpatient.edit', $rdv->id) }}" type="button" class="btn btn-icons btn-inverse-success">
                                        <i class="mdi mdi-pencil"></i>
                                        </a>
                                    @endif
                                            @csrf
                                            @method('DELETE')
                                        @if($rdv->etat != 'Annulé')
                                        <button type="submit" class="btn btn-icons btn-inverse-danger">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                        @endif
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
          @include('pages/partials/patient/_footerPatient')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

@endsection
