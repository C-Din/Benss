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

          <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="#">Dashboard</a></li>
                      <li><a href="#">Statistiques</a></li>
                    </ul>
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