<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('/')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('about')}}" class="nav-link">About</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('contact')}}" class="nav-link">Contact</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('hostel')}}" class="nav-link">All Hostel</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('help')}}" class="nav-link">Help</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <div class="btn-group">
          <button type="button" class="btn btn-default"> 
             @if(isset(Auth::guard('owner')->user()->id))
             
            {{Auth::guard('owner')->user()->manager_name}}
             @elseif(isset(Auth::guard('admin')->user()->id))
                      
             {{Auth::guard('admin')->user()->admin_name}}
             @endif
           </button>
          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
          </button>
          <div class="dropdown-menu" role="menu">
            @if(isset(Auth::guard('owner')->user()->id))
             @if (!Auth::check())
                <a class="dropdown-item" href="{{route('owner.home')}}"  >
                Admin Login<i class="fas fa-sign-out-alt" style="margin-left:5px;"></i>   
              </a>
                @else
                <a class="dropdown-item" href="{{ route('owner.profile') }}">
                  {{ __('Profile') }}
              </a>
              <a class="dropdown-item" href="{{ route('owner.ChangePassword') }}">
                  {{ __('Change Password') }}
              </a>
              <a class="dropdown-item" href="{{ route('owner.logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('owner.logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              @endif
              @elseif(isset(Auth::guard('admin')->user()->id))
              @if (!Auth::check())
                <a class="dropdown-item" href="{{route('admin.home')}}"  >
                Admin Login<i class="fas fa-sign-out-alt" style="margin-left:5px;"></i>   
              </a>
                @else
              <a class="dropdown-item" href="{{ route('admin.logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              @endif
              @endif
          </div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->