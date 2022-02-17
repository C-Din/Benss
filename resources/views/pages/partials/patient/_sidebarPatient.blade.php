<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav" style="position: fixed; padding-left: 24px; margin-bottom: auto;">
    <li class="nav-item nav-profile">
      <a href="{{ route('profile.index') }}" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="{{ asset('/assets/images/faces/face8.jpg') }}" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <p class="profile-name">{{ Auth::user()->username }}</p>
          <p class="designation">Compte patient</p>
        </div>
      </a>
    </li>
    <li class="nav-item nav-category">Main Menu</li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('home') }}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('rdvpatient.index') }}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Rendez-vous</span>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">RDV</span>
      </a>
    </li>
     -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Mouchard</span>
      </a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Paramètre</span>
      </a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="pages/forms/basic_elements.html">
        <i class="menu-icon typcn typcn-shopping-bag"></i>
        <span class="menu-title">Form elements</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <i class="menu-icon typcn typcn-th-large-outline"></i>
        <span class="menu-title">Charts</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/tables/basic-table.html">
        <i class="menu-icon typcn typcn-bell"></i>
        <span class="menu-title">Tables</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/icons/font-awesome.html">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Icons</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="menu-icon typcn typcn-document-add"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/login.html"> Login </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/register.html"> Register </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
          </li>
        </ul>
      </div>
    </li> -->
  </ul>
</nav>
