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
                      <li><a href="#">{{ Auth::user()->username }}</a></li>
                      <li><a href="#">Dossier Médical</a></li>
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
                                <h4 class="card-title">Fiche Médicale</h4>
                                @if($ifSet[0] == 0)
                                    <h6>Veuilez contacter une infirmière pour renseignez votre fiche médiclae</h6>
                                    @else
                                    <div class="row" style="border: 1px solid #ccc; padding-top: 1rem; padding-bottom: 1rem;">
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->groupe_sanguin }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Groupe Sanguin</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->taille }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Taille</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->poids }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Poid</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->tension }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Tension</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->musculo_squelettiqu }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Musculosquelettique</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->genito_urinaire }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Génitourinaire</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->neurologie }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Neurologie</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->dermo }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Dermo</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->tyng }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">TYNG</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->psycatrique }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Psycatrique</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->blessure }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Blessure</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->gastro }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Gastro</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->respiratoire }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Respiratoire</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->endoctrinien }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Endotrinien</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->coeur }}</p>
                                            <p style="margin-bottom: 0; color: #aaa;">Coeur</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p style="margin-bottom: 0; font-weight: bold; font-size: 16px;">{{ $fiche->symtome }}</p>
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
                                    <th style="border: 1px solid #dee2e6;"> Type de rendez-vous </th>
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
                                            <td>Terminé</td>
                                            <td style="text-align: center;">
                                                <a type="button" href="{{ route('rdvpatient.show', $rdv->id) }}" class="btn btn-icons btn-inverse-secondary">
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
          @include('pages/partials/patient/_footerPatient')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

@endsection
