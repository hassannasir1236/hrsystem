  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: absolute;">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <!-- <img src="{{ asset('../../images/logo-header.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 w-75" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span> -->
      <img src="{{ asset('../../images/logo-header.png') }}">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img  class="img-circle elevation-2" alt="User Image"
          @if(isset(Auth::guard('owner')->user()->profile))
             src="{{asset('profile/'.Auth::guard('owner')->user()->profile)}}"
          @elseif(isset(Auth::guard('admin')->user()->profile))
             src="{{asset('profile/'.Auth::guard('admin')->user()->profile)}}"
         @else
         src="{{asset('images/dummy.png')}}"
         @endif >
        </div>
        <div class="info">
          <a href="#" class="d-block">
             @if(isset(Auth::guard('owner')->user()->id))
             {{Auth::guard('owner')->user()->manager_name}}
              @elseif(isset(Auth::guard('admin')->user()->id))
             {{Auth::guard('admin')->user()->admin_name}}
             @endif
            
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        @if(isset(Auth::guard('owner')->user()->id))
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('owner/home')}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard Page
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{url('owner/user_details')}}" class="nav-link ">
              <i class="nav-icon fa fa-users"></i>
              <p>
                User Details
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{url('owner/roomassign')}}" class="nav-link ">
              <i class="nav-icon fa fa-bed"></i>
              <p>
                Room Assign Details
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{route('owner.details')}}" class="nav-link ">
              <i class="nav-icon fa fa-building"></i>
              <p>
                Hostel Details
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{url('owner/HostelSetting')}}" class="nav-link ">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Hostel Setting
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{url('owner/hostelview')}}" class="nav-link ">
             <i class="nav-icon fas fa-eye"></i>
              <p>
               Hostel Views
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{url('owner/transitionDetails')}}" class="nav-link ">
             <i class="nav-icon fas fa-coins"></i>
              <p>
               Transition Details
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{route('owner.profile')}}" class="nav-link ">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{route('owner.password')}}" class="nav-link ">
              <i class="nav-icon fa fa-unlock-alt"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
        </ul>
        @elseif(isset(Auth::guard('admin')->user()->id))
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('admin/home')}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard Page
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{url('admin/alluser')}}" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                All Users Details
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{url('admin/allowner')}}" class="nav-link ">
              <i class="nav-icon fas fa-hospital-user"></i>
              <p>
                All Owners Details
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{url('admin/allhosteldetails')}}" class="nav-link ">
              <i class="nav-icon fas fa-hotel"></i>
              <p>
                All Hostel Details
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{route('admin.profile')}}" class="nav-link ">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item menu-open mt-3">
            <a href="{{url('admin/password')}}" class="nav-link ">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Password Setting
              </p>
            </a>
          </li>
        </ul>
        @endif
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>