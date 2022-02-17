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
                                    <li><a href="{{ route('infirmTypeSoinList') }}">Types soins</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Configuration</a></li>
                                    <li><a href="#">Types Soins</a></li>
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
                                <h4 class="card-title">Formulaire de gestion des types de soins</h4>
                                <form class="form-sample" action="{{ route('typeRdv.update', $typeRdv->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="libelle">Libelle</label>
                                                <input type="text" name="nomType" class="form-control" value="{{ $typeRdv->nomType }}" id="libelle" placeholder="Libelle du type de rendez-vous" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="desctypesoin">Description</label>
                                                <textarea name="description" class="form-control" id="desctypesoin" rows="2" required>{{ $typeRdv->description }}</textarea>
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
          @include('pages/partials/infm/_footerInfm')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

@endsection
