@extends('base')

@section('title', 'Test app | Login')

@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auto-form-wrapper">
                        <form action="{{ route('mlogin') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="text-block text-center my-3">
                                <h3 class="text-primary font-weight-semibold">Connexion</h3>
                            </div>
                            <div class="form-group">
                                <!-- <label class="label">Email</label> -->
                                <div class="input-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <label class="label">Password</label> -->
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary text-white submit-btn btn-block" value="Connexion">
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <div class="form-check form-check-flat mt-0">
                                </div>
                                <a href="#" class="text-small forgot-password text-black">Mot de passe oublié</a>
                            </div>

                            <div class="text-block text-center my-3">
                                <span class="text-small font-weight-semibold">Pas encore de compte?</span>
                                <a href="{{ route('registerPage') }}" class="text-black text-small">Inscrivez-vous maintenant</a>
                            </div>
                        </form>
                    </div>
                    <ul class="auth-footer">
                        <li>
                            <a href="#">Conditions</a>
                        </li>
                        <li>
                            <a href="#">Help</a>
                        </li>
                        <li>
                            <a href="#">Terms</a>
                        </li>
                    </ul>
                    <p class="footer-text text-center">copyright © 2020 Dev_pro. All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

@endsection
