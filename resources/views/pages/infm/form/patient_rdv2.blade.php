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
                    <h4 class="card-title">Rendez-vous de M/Mme/Mlle {{ $rdv->nom }} pour {{ $rdv->nomType }}</h4>
                    <form class="form-sample" method="POST" action="{{ route('rdv.update', $rdv->id) }}">
                        {{ csrf_field() }}
                        @method('PUT')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="gender">Attribué un medcin</label>
                            <select id="gender" name="med_id" class="form-control">
                              @foreach($medecins as $med)
                                 <option value="{{ $med->id }}"> {{ $med->nom.' '.$med->prenom }} </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="datenais">Modifier la date du rendez-vous</label>
                              <input type="date" class="form-control" value="{{ $rdv->dateSouhaite }}" name="dateRdv" id="datenais" placeholder="dd/mm/yyyy" required/>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="datenais">Modifier l'heure du rendez-vous </label>
                                <input type="time" class="form-control" value="{{ $rdv->heureSouhaite }}" name="heureRdv" id="datenais" placeholder="hh:mm" required/>
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
