<div class="sidebar" data-color="transparent" data-background-color="transparent" data-image="{{ asset('material') }}/img/sidebar-3.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
      <div class="logo-normal">
        <a href="" class="simple-text">
          {{ __('ADMINISTRATOR') }}
          <a href="" class="simple-text">
          {{ __('PT FULO METAL ROOFINDO') }}
          </a>
        </a>
      </div>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('home') }}">
            <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'aboutme' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('aboutme') }}">
            <i class="material-icons">library_books</i>
            <p>{{ __('About Me') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'visimisi' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('visimisi') }}">
            <i class="material-icons">library_books</i>
            <p>{{ __('Visi & Misi') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'gallery' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('gallery') }}">
            <i class="material-icons">library_books</i>
            <p>{{ __('Gallery') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'news' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('news') }}">
            <i class="material-icons">library_books</i>
            <p>{{ __('News') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'contactus' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('contactus') }}">
            <i class="material-icons">library_books</i>
            <p>{{ __('Contact Us') }}</p>
          </a>
        </li>
        <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#Pengaturan" aria-expanded="true">
            <i class="material-icons">notifications</i>
            <p>{{ __('Pengaturan') }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse HIDDEN" id="Pengaturan">
            <ul class="nav">
              <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                  <span class="sidebar-mini"> UP </span>
                  <span class="sidebar-normal">{{ __('User profile') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                  <span class="sidebar-mini"> UM </span>
                  <span class="sidebar-normal"> {{ __('User Management') }} </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>