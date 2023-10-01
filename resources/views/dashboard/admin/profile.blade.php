
@extends('layouts.admin_index')
 @section('link')
 <style type="text/css">
   .bg-warning, .bg-warning>a {
    color: #ffff;
}
 </style>
 @endsection
@section('content')
@parent
  <div class="content-wrapper">
     <div class="container">
        <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success mt-5 col-12">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('fail'))
            <div class="alert alert-danger mt-5 col-12">
                {{ session()->get('fail') }}
            </div>
        @endif
        <div class="col-12 col-md-12 ml-auto d-flex justify-content-end pt-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary " id="business_button"  onclick="admin()">
                Update Your Profile
            </button>
        </div>
        <div class="col-12 col-md-4">
          <div class="card pt-4 mb-4 shadow mt-5 rounded-6" style="background-color: #eee">
              <h3 class="text-center pt-4 mb-4">Business Logo</h3>
              <div class="bg-image hover-overlay ripple rounded-circle text-center" data-mdb-ripple-color="light">
                  <img class="text-center w-50 rounded-circle img-fluid" style="border: 14px solid #c5c1c1;"
                      @if(Auth::guard('admin')->user()->profile)
                           src="{{asset('profile/'.Auth::guard('admin')->user()->profile)}}"
                       @else
                       src="{{asset('images/dummy.png')}}"
                       @endif 
                  />
                  <a href="">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
              </div>
              <div class="card-body text-center">
                  <form method="post" action="{{route('admin.UpdateProfile')}}" enctype="multipart/form-data" class="d-flex justify-content-center align-items-center flex-column">
                  @csrf
                  <label for="logo-upload" id="logo-upload-container">
                      <div class="text-center" style="margin-top: 8px;">
                          <span class="text-center" style="cursor: pointer;">
                              <i class="  fa fa-edit" aria-hidden="true"></i>
                              <span >Upload Your profile</span>
                          </span>
                      </div>
                      <input type="file" name="ownerlogo" id="logo-upload" accept=".jpg,.jpeg,.png"  style="display: none;">
                  </label>
                    <span class="text-danger">@error('ownerlogo'){{$message}}@enderror</span>
                      <button type="submit" class="btn btn-primary mt-3">Save Profile</button>
                  </form>
              </div>
          </div>
        </div>
        <div class="col-12 col-md-8">
          <div class="card pt-4 mb-4 shadow mt-5 rounded-6 " id="business_data"  style="display: block;">
              <div class="card-body">
                  <h3 class="pt-2 mb-4 text-center">Owner Profile</h3>
                  <div class="row">
                      <div class="col-sm-3">
                          <b class="mb-0">Your Name:</b>
                      </div>
                      <div class="col-sm-9">
                          <p class="text-muted mb-0">{{Auth::guard('admin')->user()->admin_name}}</p>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <b class="mb-0">Your Email:</b>
                      </div>
                      <div class="col-sm-9">
                          <p class="text-muted mb-0">{{Auth::guard('admin')->user()->email}}</p>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <b class="mb-0">Your Phone No:</b>
                      </div>
                      <div class="col-sm-9">
                          <p class="text-muted mb-0">{{Auth::guard('admin')->user()->admin_phoneno}}</p>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <b class="mb-0">Your Address:</b>
                      </div>
                      <div class="col-sm-9">
                          <p class="text-muted mb-0">{{Auth::guard('admin')->user()->admin_address}}</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="card pt-4 mb-4 shadow mt-5 rounded-6" id="business_form" style="display: none;">
          <div class="card-body d-flex flex-column justify-content-center align-items-center">
            <h3 class="text-center mt-4">Update Your Profile</h3>
            <p class="text-center">Please enter the following information to change your Profile</p>
            <form class="py-3 px-4 col-12 col-md-6 col-lg-8" method="post" action="{{route('admin.UpdateProfile')}}">
               @csrf
                <!-- Email input -->
                <div class="mb-4 col">
                    <div class="form-outline ">
                      <label class="form-label" for="form1Example1">Your Name</label>
                        <input type="text" name="name" id="form1Example1" class="form-control" value="{{Auth::guard('admin')->user()->admin_name}}" placeholder="Enter Your Name:" required />
                    </div>
                    <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>
                <!-- Password input -->
                <div class="col mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="form1Example2">Your Email</label>
                        <input type="email" id="form1Example2" class="form-control" name="email"  value="{{Auth::guard('admin')->user()->email}}" placeholder="Enter Your Email:" required/>
                    </div>
                    <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>
                <!-- Confirm Password input -->
                <div class="col mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="form1Example2">Your Phone No:  </label>
                        <input type="number" id="form1Example2" class="form-control" name="phoneno" value="{{Auth::guard('admin')->user()->admin_phoneno}}" placeholder="Enter Your Phone No(only 11 Digits):" required/>
                    </div>
                    <span class="text-danger">@error('phoneno'){{$message}} @enderror</span>
                </div>
                <!-- admin address -->
                <div class="col mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="form1Example2">Your Address:  </label>
                        <input type="text" id="form1Example2" class="form-control" name="address" value="{{Auth::guard('admin')->user()->admin_address}}" 
                        placeholder="Enter Your Address:" required/>
                    </div>
                    <span class="text-danger">@error('address'){{$message}} @enderror</span>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
          </div>
          </div>
        </div>
      </div>
      </div>
  </div>
@endsection

@section('script')
 <script>
        function admin() {
            var x = document.getElementById("business_form");
            var y = document.getElementById("business_data");
            var z = document.getElementById("business_button");
            if (x.style.display === "none" && y.style.display === "block") {
                x.style.display = "block";
                y.style.display = "none";
                document.getElementById("business_button").innerText='Check Your Profile';
                z.style.backgroundColor = 'salmon';
                z.style.color = 'white';
            } else {
                x.style.display = "none";
                y.style.display = "block";
                document.getElementById("business_button").innerText=' Edit Your Profile';
                z.style.backgroundColor = '#3b71ca';
                z.style.color = 'white';
            }
        }
    </script>
@endsection

