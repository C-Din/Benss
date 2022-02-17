<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav" style="position: fixed; padding-left: 24px; margin-bottom: auto;">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="{{ asset('/assets/images/faces/face8.jpg') }}" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
            <p class="profile-name">{{ Auth::user()->username }}</p>
            <p class="designation">Compte Medecin</p>
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
        <a class="nav-link" href="{{ route('rdv.index') }}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Rendez-vous</span>
        </a>
      </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('interventions.index') }}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Interventions</span>
      </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('patient.index') }}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Patients</span>
        </a>
      </li>
  </ul>
</nav>
