@extends('layouts.master')
@section('title', 'Owner forgoy Page')
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
                        <h2>OWNER Forget PAGE</h2>
                        <p>Enter User Email and Password for login ang booking hostel.</p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->

    <!-- Section: Design Block -->
    <div class="container content">
  <div class="row m-5 no-gutters shadow-lg">
  <div class="col-md-6 d-none d-md-block">
  <img src="https://images.unsplash.com/photo-1566888596782-c7f41cc184c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=2134&q=80" class="img-fluid" style="min-height:100%;" />
  </div>
  <div class="col-md-6 bg-white p-5">
  <h3 class="pb-3">Owner Forgot Form</h3>
  <div class="form-style">
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
  <form method="POST" action="{{route('owner.forgot.password.link')}}" class="was-validated">
    @csrf
    <div class="form-group pb-3">    
     <input type="text" id="form3Example97" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{old('email')}}" required placeholder="Enter Email" />
      <label class="form-label" for="form3Example97">Email ID</label>
      <div class="invalid-feedback">Please fill out this field.</div>
      <span class="text-danger">@error('email'){{$message}} @enderror</span>
    </div>
    <div class="d-flex align-items-center justify-content-between">
  <div class="d-flex align-items-center"><input name="" type="checkbox" value="" /> <span class="pl-2 font-weight-bold">Remember Me</span></div>
  <div>
    <a href="{{ route('owner.owner_login') }}">Login Page</a>  </div>
  </div>
     <div class="pb-2">
    <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Forgot password link</button>
     </div>
  </form>
    </div>
  </div>

  </div>
  </div>  
</div>
      @endsection

<!-- footer -->
@section('footer')
@parent
@endsection
@section('script')
@parent
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection