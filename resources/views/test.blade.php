<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="../../images/favicon.png">

    <!-- GOOGLE FONT --> 
    <link href="../../../../../css?family=Hind:400,300,500,600%7cMontserrat:400,700" rel='stylesheet' type='text/css'>
    <link href="../../../../../css-1?family=Hind:300,400,500,600,700" rel="stylesheet">

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="../../css/lib/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/lib/font-lotusicon.css">
    <link rel="stylesheet" type="text/css" href="../../css/lib/bootstrap.min.css">
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

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
        <style type="text/css">
            .from-seperator{
                    width: 100%;
    text-align: center;
    border-bottom: 1px solid #ccc;
    line-height: 0.1em;
    margin: 20px 0 20px;
            }
            .from-seperator span {
    background: #fff;
    padding: 0 10px;
}
#footer .footer_top .mailchimp .mailchimp-form {
    display: inline-block;
    vertical-align: middle;
    margin-left: 26px;
}
.social{
    float: right;
} 
   @media (min-width: 1200px){
.footer1 {
    width: 66.6667%;
}  
.footer2 {
    width: 33.3333%;
}
}
.modal {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    /* z-index: 1040; */
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
    }
    .modal-backdrop{
            width: 100vw;
    height: 100vh;
    z-index: 0;
    }
   /* .modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
     z-index: 1040; 
    width: 100vw;
    height: 100vh;
    background-color: #000;
    }*/
 .header_menu.active {
    margin-top: 31px;
}
 .form-control.is-invalid, .was-validated .form-control.is-invalid:invalid {
    border-color: #dc3545;
    padding-right: calc(1.5em + 0.75rem);
    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e);
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

</style>
</head>
<body>
    <!-- HEADER -->
    <header id="header" class="header-v3 clearfix">

        <!-- HEADER TOP -->
        <div class="header_top">
            <div class="container">
                <div class="header_left float-left">
                    <span><i class="lotus-icon-location"></i> @lang('lang.address_follow')</span>
                    <span><i class="lotus-icon-phone"></i><a href="tel:03166717394" 
                   style="color:white;"> +92-3166717394</a></span>
                </div>

                <div class="header_right float-right">
                    <span class="socials">
                        <a href="!#"><i class="fa fa-facebook"></i></a>
                        <a href="!#"><i class="fa fa-twitter"></i></a>
                        <a href="!#"><i class="fa fa-instagram"></i></a>
                        <a href="!#"><i class="fa fa-pinterest"></i></a>
                        <a href="!#"><i class="fa fa-tumblr"></i></a>
                    </span>
                    <span class="login-register">
                            <a href="" data-toggle="modal" data-target="#myModal">@lang('lang.login')</a>
                            <a href="{{route('user_register')}}">@lang('lang.register')</a>
                        </span>
                    <div class="dropdown language">
                        <span>@lang('lang.english')</span>

                        <ul>
                            <li class="active"><a href="/en">@lang('lang.english')</a></li>
                            <li><a href="/ur">@lang('lang.urdu')</a></li>
                        </ul>
                    </div>
                </div>
                <!-- HEADER LOGO -->
                <a class="logo-top img-responsive" href="#"><img src="images/logo-header.png" alt=""></a>
                <!-- END / HEADER LOGO -->

            </div>
        </div>
        <!-- END / HEADER TOP -->

        <!-- HEADER LOGO & MENU -->
        <div class="header_content" id="header_content">

            <div class="container">

                <!-- HEADER LOGO -->
                <div class="header_logo">
                    <a href="#"><img src="../../images/logo-header.png" alt=""></a>
                </div>
                <!-- END / HEADER LOGO -->
                <!-- HEADER MENU -->
                <nav class="header_menu">
                    <ul class="menu">
                        <li class="current-menu-item">
                            <a href="{{route('/')}}">@lang('lang.home')</a>
                        </li>
                        <li><a href="{{route('about')}}">@lang('lang.about')</a></li>

                        <li>
                            <a href="{{route('hostel')}}">@lang('lang.allhostel')</a>
                        </li>
                        <li><a href="{{route('post_property')}}">@lang('lang.post_property')</a></li>
                        <li><a href="{{route('contact')}}">@lang('lang.contact')</a></li>
                        <li><a href="{{route('help')}}">@lang('lang.help')</a></li>
                    </ul>
                </nav>
                <!-- END / HEADER MENU -->

                <!-- MENU BAR -->
                <span class="menu-bars">
                        <span></span>
                    </span>
                <!-- END / MENU BAR -->

            </div>
        </div>
        <!-- END / HEADER LOGO & MENU -->
    </header>
    <!-- END / HEADER -->
    <!-- Modal -->
    <div id="myModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="close-signup" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center">SIGN IN</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="body-signup__form">
                                <div class="profile__sign-up">
                                    <a href="{{route('user.user_login')}}" data-toggle="modal" class="btn btn-primary btn-block" style="background-color:#e1bd85;">
                                    <i class="fa fa-user"></i> User</a>
                                    <h4 class="from-seperator"><span>As</span></h4>
                                    <a href="{{route('owner_login')}}" data-toggle="modal" class="btn btn-accent btn-block" 
                                    style="background-color: #2d4052;color: white;">
                                        <i class="fa fa-home"></i> Hostel Owner</a>
                                        <hr>
                                        <p>Not registered? <a href="{{route('user_register')}}" 
                                            style="color: #e1bd85;">Create an Account.</a></p>
                                        <button type="button" class=" close" data-dismiss="modal" id="close-signup" aria-label="Close">Close</button>
                                    </div> 
                                </div> 
                            </div>
                        </div> 
                    </div> 
            </div>
        </div>
    </div>


    <!-- PRELOADER -->
<div id="preloader">
    <span class="preloader-dot"></span>
</div>
<!-- END / PRELOADER -->
 <footer id="footer">

            <!-- FOOTER TOP -->
            <div class="footer_top">
                <div class="container">
                    <div class="row">

                        <!-- WIDGET MAILCHIMP -->
                        <div class="col-lg-9 footer1">
                            <div class="mailchimp">
                                <h4>@lang('lang.new&offer')</h4>
                                <div class="mailchimp-form">
                                    <form action="#" method="POST">
                                        <input type="text" name="email" placeholder="Your email address" class="input-text">
                                        <button class="awe-btn">@lang('lang.signup')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END / WIDGET MAILCHIMP -->
                        
                        <!-- WIDGET SOCIAL -->
                        <div class="col-lg-3 footer2">
                            <div class="social">
                                <div class="social-content">
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
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
        <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="js/lib/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../../js/lib/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../js/lib/bootstrap.min.js"></script>
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
</body>
</html>