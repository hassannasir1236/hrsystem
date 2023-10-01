<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
  rel="stylesheet"
/>

    <link rel="stylesheet" type="text/css" href="../../css/lib/font-lotusicon.css">
    <link rel="stylesheet" type="text/css" href="../../css/lib/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../../css/lib/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/lib/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="../../css/lib/settings.css">
    <link rel="stylesheet" type="text/css" href="../../css/lib/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/helper.css">
    <link rel="stylesheet" type="text/css" href="../../css/custom.css">
    <link rel="stylesheet" type="text/css" href="../../css/responsive.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    @yield('cs')
</head>
<body>
  <div id="preloader">
    <span class="preloader-dot"></span>
</div>
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg " style="background-color:#0f0f0f;">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="{{asset('images/logo-header.png')}}"
          height="50"
          alt="The Lotus Hostel"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('about')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('hostel')}}">All Hostel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('contact')}}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('help')}}">Help</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
      <!-- Avatar -->
      <div class="d-flex align-items-center">
      <!-- Icon -->
      

      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
       <!--  @if(Auth::guard('web')->user()->avatar)
          <img
            src="{{asset('profile/'.Auth::guard('web')->user()->avatar)}}"
            class="rounded-circle"
            alt="Black and White Portrait of a Man"
            loading="lazy"
            style="width: 50px; height: 50px;"
          />
          @else
          <img
            src="{{asset('images/dummy.png')}}"
            class="rounded-circle"
            alt="Black and White Portrait of a Man"
            loading="lazy"
            style="width: 50px; height: 50px;"
          />
          @endif -->
            @if(Auth::guard('web')->user()->avatar)
              <img
               src="{{Auth::guard('web')->user()->avatar}}"
                class="rounded-circle"
                loading="lazy"
                style="width: 50px; height: 50px;"
              />
              @elseif(Auth::guard('web')->user()->my_new_photo)
               <img
               src="{{asset('profile/'.Auth::guard('web')->user()->my_new_photo)}}"
                class="rounded-circle"
                loading="lazy"
                style="width: 50px; height: 50px;"
              />
              @else
              <img
                src="{{asset('images/dummy.png')}}"
                class="rounded-circle"
                loading="lazy"
                style="width: 50px; height: 50px;"
              />
            @endif
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="{{route('user.home')}}">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="{{route('user.details_status')}}">Hostel Details</a>
          </li>
          <li>
            <a class="dropdown-item" href="{{route('user.user_changepassword')}}">Change Password</a>
          </li>
           <li>
               <a class="dropdown-item" data-mdb-toggle="modal" data-mdb-target="#exampleModal" href="#">Logout</a> 
            </li>
        </ul>
      </div>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-power-off fa-2xl" style="margin-right: 12px;"></i> Confirm Logout  </h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <p>Are you sure you want to Logout now?</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-mdb-dismiss="modal">Close</button>
        <a class="btn btn-outline-primary" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off" style="margin-right: 12px;"></i> {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </div>
    </div>
  </div>
</div>
@yield('content')
<!-- Tabs content -->
 <footer id="footer">

            <!-- FOOTER TOP -->
            <div class="footer_top">
                <div class="container">
                    <div class="row">

                        <!-- WIDGET MAILCHIMP -->
                        <!-- <div class="col-lg-9 footer1">
                            <div class="mailchimp">
                                <h4>@lang('lang.new&offer')</h4>
                                <div class="mailchimp-form">
                                    <form action="#" method="POST">
                                        <input type="text" name="email" placeholder="Your email address" class="input-text">
                                        <button class="awe-btn">@lang('lang.signup')</button>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                        <!-- END / WIDGET MAILCHIMP -->
                        
                        <!-- WIDGET SOCIAL -->
                        <div class="col-lg-12" style="display: flex;justify-content: center; align-items: center;">
                            <div class="social">
                                <div class="social-content">
                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-google"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram-square"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- END / WIDGET SOCIAL -->

                    </div>
                </div>
            </div>
            <!-- END / FOOTER TOP -->

            <!-- FOOTER CENTER -->
            <div class="footer_center">
                <div class="container">
                    <div class="row">

                        <div class="col-xs-12 col-lg-5">
                            <div class="widget widget_logo">
                                <div class="widget-logo">
                                    <div class="img">
                                        <a href="#"><img src="../../images/logo-footer.png" alt=""></a>
                                    </div>
                                    <div class="text">
                                        <p><i class="lotus-icon-location"></i>@lang('lang.address_follow')</p>
                                        <p><i class="lotus-icon-phone"></i> <a href="tel:03166717394" style="color:white;"> +92-3166717394</a></p>
                                        <p><i class="fa fa-envelope-o"></i> <a href="/cdn-cgi/l/email-protection#157d7079797a55617d70797a6160667d7a6170793b767a78"><span class="__cf_email__" data-cfemail="d8b0bdb4b4b798acb0bdb4b7acadabb0b7acbdb4f6bbb7b5">
                                            <a href="mailto:Hassannasir6321@gmail.com">Hassannasir6321@gmail.com</a> 
                                        </span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">@lang('lang.sectionwise')</h4>
                                <ul>
                                    <li><a href="#acc">@lang('lang.homesection2h2')</a></li>
                                    <li><a href="#hostel">@lang('lang.homesection3h2')</a></li>
                                    <li><a href="#citywise">@lang('lang.cityvise')</a></li>
                                    <li><a href="#contact">@lang('lang.contact')</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">@lang('lang.home')</h4>
                                <ul>
                                    <li><a href="">@lang('lang.home')</a></li>
                                    <li><a href="">@lang('lang.about')</a></li>
                                    <li><a href="">@lang('lang.allhostel')</a></li>
                                    <li><a href="">@lang('lang.post_property')</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-4 col-lg-3">
                            <div class="widget widget_tripadvisor">
                                <h4 class="widget-title">Tripadvisor</h4>
                                <div class="tripadvisor">
                                    <p>Now with hotel reviews by</p>
                                    <img src="images/tripadvisor.png" alt="">
                                    <span class="tripadvisor-circle">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i class="part"></i>
                                    </span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- END / FOOTER CENTER -->

            <!-- FOOTER BOTTOM -->
            <div class="footer_bottom">
                <div class="container">
                    <p>&copy; 2015 Lotus Hotel All rights reserved.</p>
                </div>
            </div>
            <!-- END / FOOTER BOTTOM -->

        </footer>
        <!-- Modal -->

<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
 <script type="text/javascript" src="../../js/lib/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../../js/lib/jquery-ui.min.js"></script>

<script type="text/javascript" src="../../js/lib/bootstrap-select.js"></script>
<script src="../../../maps/api/js-1?key=AIzaSyAb2lfsiytHD7rMhBaAvJz2CKhk05uiIuE"></script>
<script type="text/javascript" src="../../js/lib/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="../../js/lib/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="../../js/lib/owl.carousel.js"></script>
<script type="text/javascript" src="../../js/lib/jquery.appear.min.js"></script>
<script type="text/javascript" src="../../js/lib/jquery.countTo.js"></script>
<script type="text/javascript" src="../../js/lib/jquery.countdown.min.js"></script>
<script type="text/javascript" src="../../js/lib/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="../../js/lib/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="../../js/lib/SmoothScroll.js"></script>
<!-- validate -->
<script type="text/javascript" src="../../js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="../../js/lib/jquery.validate.min.js"></script>
<!-- Custom jQuery -->
<script type="text/javascript" src="../../js/scripts.js"></script>
@yield('js')
</body>
</html>