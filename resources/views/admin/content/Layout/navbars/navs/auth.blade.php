<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-minimize">
      <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
        <i class="material-icons visible-on-sidebar-mini">view_list</i>
      </button>
    </div>
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="">{{ ('Dashboard') }}</a>
    </div>
    <button class="navbar-toggle navbar-toggler" type="button" id="minimizeSidebar" (click)="sidebarToggle()">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon icon-bar"></span>
      <span class="icon icon-bar"></span>
      <span class="icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <form class="navbar-form">
        <div class="input-group no-border">
          <input type="text" value="" class="form-control" placeholder="Search...">
          <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
          </button>
        </div>
      </form>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            <a class="dropdown-item" href="#">{{ __('Settings') }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
