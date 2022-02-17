@extends('base')

@section('title', 'Test app | Login')

@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-center mb-4">S'inscrire</h2>
                    <div class="auto-form-wrapper">
                        <form class="form-sample" method="POST" action="{{ route('mregister') }}">
                            {{ csrf_field() }}
                            <p class="card-description"> Informations personnelles </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dateNaiss">Date de naissance</label>
                                        <input type="date" class="form-control" name="dateNaiss" id="dateNaiss" placeholder="dd/mm/yyyy" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lieuNaiss">Lieu de naissance</label>
                                        <input type="text" name="lieuNaiss" id="lieuNaiss" class="form-control" placeholder="Lieu de naissance" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sexe">Sexe</label>
                                        <select id="sexe" name="sexe" class="form-control">
                                            <option value="Masculin">Masculin</option>
                                            <option value="Feminin">Feminin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone">Téléphone</label>
                                        <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Téléphone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Rue/Ville/Pays" required>
                                    </div>
                                </div>
                            </div>
                            <p class="card-description"> Informations du compte </p>
                            <div class="row">
                                <input type="hidden" name="typeCompte" value="3" \>
                                <input type="hidden" name="new" value="new" \>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Nom d'utilisateur</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Nom d'utilisateur" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mail">Email</label>
                                        <input type="email" name="email" class="form-control" id="mail" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mdp">Mot de passe</label>
                                        <input type="password" name="password" class="form-control" id="mdp" placeholder="Mot de passe" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-12" style="text-align: center;">
                                    <input type="submit" class="btn btn-primary mr-2" value="S'inscrire">
                                    <input type="reset" value="Annuler" class="btn btn-danger">
                                </div>
                            </div>
                            <div class="text-block text-center my-3">
                                <span class="text-small font-weight-semibold">Avez vous déjà un compte ?</span>
                                <a href="/" class="text-black text-small">Se connecter</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

@endsection
