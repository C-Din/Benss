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
                      <li><a href="#">Formulaire</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Formulaire de Prise de Rendez-vous</h4>
                    <form class="form-sample" method="POST" action="{{ route('rdv.store') }}">
                        {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="gender">Objet</label>
                            <select id="gender" name="type_rdv_id" class="form-control">
                              @foreach($typesRdv as $type)
                                 <option value="{{ $type->id }}"> {{ $type->nomType }} </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="datenais">Date Souhaitée</label>
                              <input type="date" class="form-control" name="dateSouhaite" id="datenais" placeholder="dd/mm/yyyy" required/>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="datenais">Heure souhaitée </label>
                                <input type="time" class="form-control" name="heureSouhaite" id="datenais" placeholder="hh:mm" required/>
                            </div>
                          </div>

                      </div>
                      <div class="row mt-5">
                        <div class="col-md-12" style="text-align: center;">
                          <input type="submit" class="btn btn-primary mr-2" value = "Valider">
                          <input type="reset" value="Annuler" class="btn btn-danger">
                        </div>
                      </div>
                    </form>
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
