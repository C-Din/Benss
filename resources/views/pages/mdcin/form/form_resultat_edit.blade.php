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
                                    <li><a href="{{ route('rdv.index') }}">Rendez-vous</a></li>
                                </ul>
                                <ul class="quick-links ml-auto">
                                    <li><a href="#">Mes Rendez-vous</a></li>
                                    <li><a href="#">Résultats</a></li>
                                    <li><a href="#">Modification</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Résultat et ordonnance du Rendez-vous </h4>
                                <form class="form-sample" action="{{ route('resultats.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" name="rdv_id" value={{ $id }}>
                                                <input type="hidden" name="type" value="rdv">
                                                <label for="commentaire">Résultat</label>
                                                <textarea name="commentaire" class="form-control" id="commentaire" rows="2"></textarea></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="commentaire">Prescription</label>
                                                <textarea name="prescription" class="form-control" id="prescription" rows="2"></textarea></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-12" style="text-align: center;">
                                        <input type="submit" class="btn btn-primary mr-2" value = "Enregistrer">
                                        <input type="reset" value="Vider les champs" class="btn btn-danger">
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
