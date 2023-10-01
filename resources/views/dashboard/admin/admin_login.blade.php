@extends('layouts.master')
@section('title', 'Admin Login Page')
@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
   @parent
   <style type="text/css">
      .btn-link {
    font-weight: 400;
    color: #e1bd85;
    border-radius: 0;
}
.modal-header {
    display: flex; 
    flex-direction: row-reverse;
    flex-shrink: 0;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 1rem;
    border-bottom: 1px solid #dee2e6;
    border-top-left-radius: calc(0.3rem - 1px);
    border-top-right-radius: calc(0.3rem - 1px);
}
   </style>
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
                        <h2>Admin LOGIN PAGE</h2>
                        <p>Enter your Email and Password for login then you acces owner facilites.</p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->

        <!-- Section: Design Block -->
<section class="">
  @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
          @endif
          @if(session()->has('fail'))
          <div class="alert alert-success">
              {{ session()->get('fail') }}
          </div>
          @endif
           @if(session()->has('info'))
          <div class="alert alert-info">
              {{ session()->get('info') }}
          </div>
          @endif
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        @if(session()->has('success'))
                  <div class="alert alert-success">
                      {{ session()->get('success') }}
                  </div>
                  @endif
                  @if(session()->has('fail'))
                  <div class="alert alert-danger">
                      {{ session()->get('fail') }}
                  </div>
                  @endif
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            The best offer <br />
            <span class="" style="color:#e1bd85;">for your business</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
            quibusdam tempora at cupiditate quis eum maiores libero
            veritatis? Dicta facilis sint aliquid ipsum atque?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form class="was-validated" method="post" action="check">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Enter your Email *</label>
                  <input type="email" id="form3Example3" name="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" required 
                  value="{{old('email')}}" placeholder="Enter your Email *"  />
                  <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4">Enter your password *</label>
                  <input type="password" id="form3Example4" name="password"  class="form-control form-control-lg  @error('password') is-invalid @enderror" required value="{{old('password')}}" placeholder="Enter your password *" />
                  <span class="text-danger">@error('password'){{$message}} @enderror</span>
                </div>

                <!-- Checkbox -->
                <div class="form-check mb-4">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                  <label class="form-check-label" for="form2Example33">
                    Subscribe to our newsletter
                  </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-block mb-4" style="background-color:#e1bd85;">
                  Sign up
                </button>

                <!-- Register buttons -->
                <div class="text-center">
                  <p>or sign up with:</p>
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </button>

                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fa fa-google" aria-hidden="true"></i>
                  </button>

                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </button>

                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fa fa-github" aria-hidden="true"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
      @endsection

<!-- footer -->
@section('footer')
@parent
@endsection
@section('script')
@parent
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection