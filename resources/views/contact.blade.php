@extends('layouts.master')
@section('title', 'Contact Page')
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
 <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>CONTACT WITH US</h2>
                    <p>Anyone contact with us we will replay few hours.</p>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

    <!-- CONTACT -->
    <section class="section-contact">
        <div class="container">
            <div class="contact">
                <div class="row">
                    @if(session()->has('success'))
                          <div class="alert alert-success mt-5">
                              {{ session()->get('success') }}
                          </div>
                      @endif
                      @if(session()->has('fail'))
                          <div class="alert alert-danger mt-5">
                              {{ session()->get('fail') }}
                          </div>
                      @endif
                    <div class="col-md-6 col-lg-5">

                        <div class="text">
                            <h2>Contact</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                            <ul>
                                <li><i class="icon lotus-icon-location"></i> Pakpattan chowk, Sahiwal Pakistan</li>
                                <li><i class="icon lotus-icon-phone"></i> <a href="tel:03166717394" style="color:black;"> +92-3166717394</a></li>
                                <li><i class="icon fa fa-envelope-o"></i> <a href="mailto:Hassannasir6321@gmail.com">Hassannasir6321@gmail.com</a> </li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-md-6 col-lg-6 col-lg-offset-1">
                        <div class="contact-form">
                            <form id="sendcontactform" action="{{route('contactform')}}" 
                                method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text" name="name" placeholder="Name" 
                                        value="@if(Auth::id()){{Auth::user()->name}}@endif">
                                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text" name="email" placeholder="Email" 
                                        value="@if(Auth::id()){{Auth::user()->email}}@endif">
                                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" class="field-text" name="subject" placeholder="Subject">
                                        <span class="text-danger">@error('subject'){{$message}} @enderror</span>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea cols="30" rows="10" name="usermessage" class="field-textarea" placeholder="Write what do you want"></textarea>
                                        <span class="text-danger">@error('usermessage'){{$message}} @enderror</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="awe-btn awe-btn-13">SEND</button>
                                    </div>
                                </div>
                                <div id="contact-content"></div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END / CONTACT -->

    <!-- MAP -->
   
        <div class="container mb-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54905.11802285773!2d73.02570583125!3d30.67423830000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922b7e3933d7d33%3A0x9484af65945ab89c!2sHotel%20Red%20Roof%20Sahiwal!5e0!3m2!1sen!2s!4v1665160281625!5m2!1sen!2s" width="1170" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    <!-- END / MAP -->
         <!-- END / PAGE WRAP -->
      @endsection

      <!-- footer -->
      @section('footer')
      @parent
      @endsection
      @section('script')
      @parent
      <script type="text/javascript">
          /*Validate message*/
    if ($('#sendcontactform').length) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#sendcontactform').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                subject: {
                    required: true,
                    minlength: 2
                },
                message: {
                    required: true,
                    minlength: 10
                }
            },
            messages: {
                name: {
                    required: "Please enter your name.",
                    minlength: $.format("At least {0} characters required.")
                },
                email: {
                    required: "Please enter your email.",
                    email: "Please enter a valid email."
                },
                subject: {
                    required: "Please enter your subject.",
                    minlength: $.format("At least {0} characters required.")
                },
                message: {
                    required: "Please enter a message.",
                    minlength: $.format("At least {0} characters required.")
                }
            },

            // $.ajax({
            //     url: '/contactform/',
            //     type: 'POST',
            //     data: {_token: CSRF_TOKEN},
            //     dataType: 'JSON',
            //     success: function (response,data) {
            //         console.warn(data);
            //     }
            // });
            // submitHandler: function (form) {
            //     $(form).ajaxSubmit({
            //         success: function (responseText, statusText, xhr, $form) {
            //             $('#contact-content').slideUp(600, function () {
            //                 $('#sendcontactform input[type=text], #sendcontactform textarea').val('');
            //                 $('#contact-content').html(responseText).slideDown(600);
            //             });
            //         }
            //     });
            //     return false;
            // }
        });
    }

      </script>
      @endsection