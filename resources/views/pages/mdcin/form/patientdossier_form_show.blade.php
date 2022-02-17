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
                                    <li><a href="#">Patients</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Patient</a></li>
                                    <li><a href="#">Dossier Medical</a></li>
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
                                    <div class="col-md-12">
                                        <h4 class="card-title">Informations personnelles</h4>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $patient->nom }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Nom</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $patient->prenom }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Prénom</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $patient->dateNaiss }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Date de naissance</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $patient->lieuNaiss }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Lieu de naissance</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $patient->sexe }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Sexe</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $patient->telephone }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Téléphone</p>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $patient->adresse }}</p>
                                                <p style="margin-bottom: 0; color: #aaa;">Adresse</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="card-title">Fiche Médicale</h4>
                                @if($ifSet[0] == 0)
                                <ul class="quick-links ml-auto">
                                    <li>
                                        <form action="{{ route('fiche') }}" method="GET">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $patient->id }}">
                                            <input type="submit" value="Enregistrer sa fiche médicale" class="btn btn-primary btn-fw" style="color: #fff; width: auto; min-width: auto; padding-right: 24px;">
                                            </input>
                                        </form>
                                    </li>
                                </ul>
                                @else
                                <div class="row" style="border: 1px solid #ccc; padding-top: 1rem; padding-bottom: 1rem;">
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->groupe_sanguin }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Groupe Sanguin</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->taille }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Taille</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->poids }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Poid</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->tension }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Tension</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->musculo_squelettiqu }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Musculosquelettique</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->genito_urinaire }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Génitourinaire</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->neurologie }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Neurologie</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->dermo }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Dermo</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->tyng }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">TYNG</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->psycatrique }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Psycatrique</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->blessure }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Blessure</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->gastro }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Gastro</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->respiratoire }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Respiratoire</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->endoctrinien }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Endotrinien</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->coeur }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Coeur</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fihceMedical->symtome }}</p>
                                        <p style="margin-bottom: 0; color: #aaa;">Symtomes</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @if($ifSet[1] == 1)
                            <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap mt-5">
                                <ul class="quick-links" style="padding-left: 0;">
                                    <li>
                                    <h4 class="card-title" style="margin-bottom: 0;">Liste des Interventions</h4>
                                    </li>
                                </ul>
                                </div>
                                <table class="table table-bordered table-hover mt-2">
                                <thead>
                                    <tr>
                                    <th style="border: 1px solid #dee2e6;"> # </th>
                                    <th style="border: 1px solid #dee2e6;"> Type intervention </th>
                                    <th style="border: 1px solid #dee2e6;"> Date </th>
                                    <th style="border: 1px solid #dee2e6;"> Etat </th>
                                    <th style="border: 1px solid #dee2e6; text-align: center;"> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($interventions as $intervention)
                                        <tr>
                                            <td> {{ ++$i }} </td>
                                            <td> {{ $intervention->nomType }} </td>
                                            <td> {{ $intervention->dateIntervention }}</td>
                                            @if($intervention->etat == 0)
                                                <td> Programmée </td>
                                            @elseif($intervention->etat == 1)
                                                <td> En cours </td>
                                            @elseif($intervention->etat == 2)
                                                <td>Terminée </td>
                                            @endif
                                            <td style="text-align: center;">
                                                <a type="button" href="{{ route('interventions.show', $intervention->id) }}" class="btn btn-icons btn-inverse-secondary">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                            </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            @endif

                            @if($ifSet[2] == 1)
                            <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap mt-5">
                                <ul class="quick-links" style="padding-left: 0;">
                                    <li>
                                    <h4 class="card-title" style="margin-bottom: 0;">Liste des rendez-vous</h4>
                                    </li>
                                </ul>
                                </div>
                                <table class="table table-bordered table-hover mt-2">
                                <thead>
                                    <tr>
                                    <th style="border: 1px solid #dee2e6;"> # </th>
                                    <th style="border: 1px solid #dee2e6;"> Type intervention </th>
                                    <th style="border: 1px solid #dee2e6;"> Date </th>
                                    <th style="border: 1px solid #dee2e6;"> Heure </th>
                                    <th style="border: 1px solid #dee2e6;"> Etat </th>
                                    <th style="border: 1px solid #dee2e6; text-align: center;"> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rdvs as $rdv)
                                        <tr>
                                            <td> {{ ++$j }} </td>
                                            <td> {{ $rdv->nomType }} </td>
                                            <td> {{ $rdv->dateRdv }}</td>
                                            <td> {{ $rdv->heureRdv }}</td>
                                            @if($rdv->etat == 0)
                                                <td> En attente </td>
                                            @elseif($rdv->etat == 1)
                                                <td> Validé </td>
                                            @elseif($rdv->etat == 3)
                                                <td>Terminée </td>
                                            @endif
                                            
                                            <td style="text-align: center;">
                                                <a type="button" href="{{ route('rdv.show', $rdv->id) }}" class="btn btn-icons btn-inverse-secondary">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                            </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            @endif
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
