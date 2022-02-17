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
                                    <li><a href="#">Interventions</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Interventions</a></li>
                                    <li><a href="#">Création</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Formulaire de création d'une Intervention</h4>
                                <form class="form-sample" action="{{ route('interventions.store') }}" method="POST">
                                    <p class="card-description"> Informations de l'intervention </p>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="patient">Patient</label>
                                                <select id="patient" name="patient_id" class="form-control">
                                                    <option selected>Sélectionner le patient</option>
                                                    @foreach($patients as $pt)
                                                    <option value="{{$pt->id}}">{{ $pt->nom.' '.$pt->prenom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="objet">Objet</label>
                                                <select id="objet" name="type_intervention_id" class="form-control">
                                                    <option selected>Sélectionner le type d'intervention</option>
                                                    @foreach($typeInterventions as $type)
                                                    <option value="{{ $type->id }}"> {{ $type->nomType }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="medcpart">Medecins qui participeront à l'ntervention</label>
                                                <select multiple id="medcpart" name="med_id[]" class="form-control">
                                                    <option>Sélectionner le/les medecins</option>
                                                    @foreach($medecins as $md5)
                                                    <option value="{{ $md5->id }}">{{ $md5->nom.' '.$md5->prenom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="infpart">Infirmiers qui participeront à l'ntervention</label>
                                                <select multiple id="infpart" name="inf_id[]" class="form-control">
                                                    <option>Sélectionner le/les infirmiers</option>
                                                    @foreach($infirmieres as $infirm)
                                                    <option value="{{ $infirm->id }}">{{ $infirm->nom.' '.$infirm->prenom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dateIntervention">Date Intervention</label>
                                                <input type="date" class="form-control" name="dateIntervention" id="dateIntervention" placeholder="dd/mm/yyyy" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="heurerdv">Heure Intervention </label>
                                                <input type="time" class="form-control" name="heureIntervention" id="heureIntervention" placeholder="hh:mm" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="commentaire">Commentaires</label>
                                                <textarea name="commentaire" class="form-control" id="commentaire" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-md-12" style="text-align: center;">
                                            <input type="submit" class="btn btn-primary mr-2" value="Valider">
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
