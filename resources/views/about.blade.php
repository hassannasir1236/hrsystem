@extends('layouts.master')
@section('title', 'About Page')
@section('head')
   @parent
@endsection
 
      <!-- header -->
      @section('header')
      @parent
      @endsection
      <!-- loader --> 
      @section('loader')
      @parent
      @endsection
      <!-- Content -->
      @section('content')
      @parent 
       <!-- PAGE WRAP -->
    <div id="page-wrap">
      <!-- SUB BANNER -->
        <section class="section-sub-banner bg-9">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>ABOUT PAGE</h2>
                        <p>Check for about page and details for our team member</p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->
        
        <!-- ABOUT -->
        <section class="section-about">
            <div class="container">

                <div class="about">

                    <!-- ITEM -->
                    <div class="about-item">

                        <div class="img owl-single">
                            <img src="https://thumbs.dreamstime.com/z/hotel-room-bright-modern-interior-condominium-37608929.jpg" alt="">
                            <img src="https://thumbs.dreamstime.com/z/interior-design-room-chairs-sofas-tables-made-plastic-41419966.jpg" alt="">
                        </div>

                        <div class="text">
                            <h2 class="heading">ABOUT Of OUR WEBSITES </h2>
                            <div class="desc">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. <b>The point of using Lorem Ipsum is that it has a more-or-less normal</b> distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing<br> packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p><br>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                            </div>
                        </div>

                    </div>
                    <!-- END / ITEM -->

                    <!-- ITEM -->
                    <div class="about-item about-right">

                        <div class="img">
                            <img src="images/about/img-2.jpg" alt="">
                        </div>

                        <div class="text">
                            <h2 class="heading">WHY GUEST CHOOSE OUR HOTEL WEBSITE?</h2>
                            <div class="desc">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, <b>sometimes by accident, sometimes on purpose</b> (injected humour and the like).</p>
                            </div>
                        </div>

                    </div>
                    <!-- END / ITEM -->

                </div>

            </div>
        </section>
        <!-- END / ABOUT -->
        
        <!-- HOTEL STATISTICS -->
        <section class="section-statistics bg-10">
            
            <div class="awe-overlay"></div>

            <div class="container">
                <div class="statistics">
                
                    <h2 class="heading white text-center">Hotel statistics</h2>
                
                    <div class="statistics_content">
                        <div class="row">
                
                            <!-- ITEM -->
                            <div class="col-xs-6 col-md-3">
                                <div class="statistics_item">
                                    <span class="count">768</span>
                                    <span>Guest Stay</span>
                                </div>
                            </div>
                            <!-- END ITEM -->
                
                            <!-- ITEM -->
                            <div class="col-xs-6 col-md-3">
                                <div class="statistics_item">
                                    <span class="count">632</span>
                                    <span>BOOK ROOM</span>
                                </div>
                            </div>
                            <!-- END ITEM -->
                
                            <!-- ITEM -->
                            <div class="col-xs-6 col-md-3">
                                <div class="statistics_item">
                                    <span class="count">1024</span>
                                    <span>MEMBER STAY</span>
                                </div>
                            </div>
                            <!-- END ITEM -->
                
                            <!-- ITEM -->
                            <div class="col-xs-6 col-md-3">
                                <div class="statistics_item">
                                    <span class="count">256</span>
                                    <span>MEALS SERVED</span>
                                </div>
                            </div>
                            <!-- END ITEM -->
                
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / HOTEL STATISTICS -->

        <!-- TEAM -->
        <section class="section-team">
            <div class="container">

                <div class="team">
                    <h2 class="heading text-center">Team Member</h2>
                    <p class="sub-heading text-center">Details of our Team Member anyone contact with our team.</p>
                    
                    <div class="team_content">
                        <div class="row">

                            <!-- ITEM -->
                            <div class="col-xs-6 col-md-4">
                                <div class="team_item text-center">

                                    <div class="img">
                                        <a href=""><img src="images/team/sajawal.jpeg" alt=""></a>
                                    </div> 

                                    <div class="text">
                                        <h2>Muhammad Sajawal</h2>
                                        <span>Manager Hotel</span>
                                        <p>I'm Muhammad Hassan currently in my last semester of BCS. I'm passionate about to learn emerging technologies.I am Working on Laravel and React js.</p>
                                        <div class="team-share">
                                            <a href="https://www.facebook.com/muhammadsajawal.gujjar"><i class="fa fa-facebook"></i></a>
                                            <a href="https://twitter.com/Muhamma21044397?t=vcz6sp03gVOQBUBriAOXGQ&s=09"><i class="fa fa-twitter"></i></a>
                                            <a href="mailto:Hassannasir6321@gmail.com"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END / ITEM -->

                            <!-- ITEM -->
                            <div class="col-xs-6 col-md-4">
                                <div class="team_item text-center">

                                    <div class="img">
                                        <a href=""><img src="images/team/hassan.jpg" alt=""></a>
                                    </div> 

                                    <div class="text">
                                        <h2>Muhammad Hassan</h2>
                                        <span>Founder Hostel</span>
                                        <p>I'm Muhammad Hassan currently in my last semester of BCS. I'm passionate about to learn emerging technologies.I am Working on Laravel and React js.</p>
                                        <div class="team-share">
                                            <a href="https://www.facebook.com/hassan.nasir.79827"><i class="fa fa-facebook"></i></a>
                                            <a href="https://twitter.com/hassann14593454"><i class="fa fa-twitter"></i></a>
                                            <a href="mailto:Hassannasir6321@gmail.com"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END / ITEM -->

                            <!-- ITEM -->
                            <div class="col-xs-6 col-md-4">
                                <div class="team_item text-center">

                                    <div class="img">
                                        <a href=""><img src="images/team/img-4.jpg" alt=""></a>
                                    </div> 

                                    <div class="text">
                                        <h2>David Gari</h2>
                                        <span>Lorem lipsum</span>
                                        <p>Mea omnium explicari te, eu sit vidit harum fabellas, his no legere feugaitper in laudem malorum epicuri, quod natum evertitur ne per.</p>
                                        <div class="team-share">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END / ITEM -->

                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- END / TEAM -->

    </div>
    <!-- END / PAGE WRAP -->
      @endsection

      <!-- footer -->
      @section('footer')
      @parent
      @endsection
      @section('script')
      @parent
      @endsection