@extends('layouts.master')
@section('title', 'Hostel Page')
@section('head')
   @parent
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <style type="text/css">
       .carousel-indicators .active {
    width: 12px;
    height: 12px;
    margin: 0;
    background-color: #242121;
}
.color{
    border: 6px solid #d38321;
    padding: 9px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
        margin-left: 100px;
    margin-top: 17px;
    border-radius: 60px;
}
.facility{
  color: #e1bd85;
}
.recommdClass{
  font-size: 15px;
    margin-left: 26px;
    font-weight: 400;
}
#map { 
      height: 300px;  
      width: 600px;     
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
      <!-- SUB BANNER -->
        <section class="section-sub-banner bg-9">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>All Hostels Details</h2>
                        <p>Check details for Room &amp; Rates,</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / SUB BANNER -->

        <!-- ROOM -->
        @if(session()->has('success'))
        <div class="alert alert-success" style="width: 100%;
            height: 58px;
            font-size: 19px;
            text-align: center;
            margin-top: 26px;">
            {{ session()->get('success') }}
        </div>
        @endif
          @if(session()->has('info'))
        <div class="alert alert-info" style="width: 100%;
            height: 58px;
            font-size: 19px;
            text-align: center;
            margin-top: 26px;">
            {{ session()->get('info') }}
        </div>
        @endif
        @if(session()->has('fail'))
        <div class="alert alert-danger" style="width: 100%;
          height: 58px;
          font-size: 19px;
          text-align: center;
          margin-top: 26px;">
            {{ session()->get('fail') }}
        </div>
        @endif
        <section class="section-room bg-white">
            <div class="container">
              <div class="row">
                <div class=" @if(Auth::id()) col-12 col-md-12  @else col-12 col-md-12 @endif">
                    <div class="row">
                        
                        <div class="@if(Auth::id()) col-12 col-md-4 
                        @else col-12 col-md-5 @endif">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:100%;">
                                  <!-- Indicators -->
                                  <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                  </ol>

                                  <!-- Wrapper for slides -->
                                  <div class="carousel-inner">
                                        @foreach(explode(',', $data->new_filenames)  as  $key => $project)
                                   <div class="item  {{$key == 1 ? 'active' : '' }}">
                                      <img class="d-block w-100" src="{{ asset('hostelimg_upload/'.$project) }}" alt="First slide" 
                                      style="width: 100%;height:700px;margin-left: -14px;">
                                    </div>
                                    @endforeach
                                  <!-- Left and right controls -->
                                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </div>
                            </div>
                            <div class="row" style="    border: 6px solid #d38321;
                              padding: 9px;
                              text-align: center;
                              display: flex;
                              justify-content: center;
                              align-items: center;
                              /* margin-left: 100px; */
                              margin-top: 17px;">
                              <div class="col-12 col-md-12" style="font-size: 16px;">
                                <h4 class="text-center">Hostel Description</h4>
                                {{$data->h_details}}
                              </div>
                            </div>  
                        </div>
                        <div class="@if(Auth::id()) col-12 col-md-4 
                        @else col-12 col-md-7 @endif">
                             <h3 class="text-center p-3"><b>Hostel Name: </b>{{$data->h_name}}</h3>
                            <hr>
                            <div class="row">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h3 class="text-center p-3 col-12"><b>Hostel Details</b></h3>
                                <div class="col-12 col-md-4 color">
                                  <h5 class="text-center p-3"><b>Hostel PhoneNo:</b><p>{{$data->h_phoneno}}</p></h5>
                                </div>
                                <div class="col-12 col-md-4 color">
                                  <h5 class="text-center p-3"><b>Hostel city:</b><p>{{$data->h_city}}</p></h5>
                                </div>
                                 <div class="col-12 col-md-4 color">
                                  <h5 class="text-center p-3"><b>Hostel Address:</b><p>{{$data->h_address}}</p></h5>
                                </div>
                                <div class="col-12 col-md-4 color">
                                  <h5 class="text-center p-3"><b>Hostel Rent:</b><p>{{$data->h_rent}}</p></h5>
                                </div>
                                <div class="col-12 col-md-4 color">
                                  <h5 class="text-center p-3"><b>Hostel Rent Period:</b><p>{{$data->rent_period}}</p></h5>
                                </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <hr>
                            <div class="row" style="display: flex;justify-content: space-around; align-items:center;">
                              <div class="col-3 text-center">
                                <div class="course-info__icon">
                                <i class="fa fa-star fa-2x" style="color: #d38321;"></i>
                                </div>
                                <div class="course-info__text">
                                  <span>Rating</span>
                                  <p>0.0 (0 Ratings)</p> 
                                </div>
                              </div>
                              <div class="col-3 text-center">
                                <div class="course-info__icon">
                                <i class="fa fa-eye fa-2x" style="color: #d38321;"></i>
                              </div>
                              <div class="course-info__text">
                                <span>Views</span>
                                <p>{{$pagecount}}</p> 
                              </div>
                              </div>
                              <div class="col-3 text-center">
                                <div class="fa fa-male fa-2x" style="color: #d38321;">
                                <i class="ion-male" aria-hidden="true"></i>
                                </div>
                                <div class="course-info__text">
                                <span>Category</span>
                                <p> {{$data->h_category}}
                                </p>  
                               </div>
                              </div>
                              <div class="col-3 text-center">
                                <a href="https://api.whatsapp.com/send?phone=+92{{$ownerData->manager_phoneno}}">
                                  <div class="course-info__icon" style="color: #d38321;">
                                    <i class="fa fa-whatsapp fa-2x"></i>
                                  </div>
                                </a>
                                <div class="course-info__text">
                                  <span>Whatapps Messanger</span>
                                  <p></p> 
                                </div>
                              </div>
                            </div>
                        </div>
                        @if(Auth::id())
                        <div class="col-12 col-md-4">
                          <div class="card shadow">
                            <div class="card-header d-flex justify-content-center align-items-center">
                               @if(Auth::guard('web')->user()->avatar)
                                  <img
                                   src="{{Auth::guard('web')->user()->avatar}}"
                                    class="rounded-circle"
                                    loading="lazy"
                                    style="width: 150px; height: 150px;"
                                  />
                                  @elseif(Auth::guard('web')->user()->my_new_photo)
                                   <img
                                   src="{{asset('profile/'.Auth::guard('web')->user()->my_new_photo)}}"
                                    class="rounded-circle"
                                    loading="lazy"
                                    style="width: 150px; height: 150px;"
                                  />
                                  @else
                                  <img
                                    src="{{asset('images/dummy.png')}}"
                                    class="rounded-circle"
                                    loading="lazy"
                                    style="width: 150px; height: 150px;"
                                  />
                                @endif

                            </div>
                            @if(isset($paymentStatus->payment_status))
                            <div class="card-body">
                              <h4 class="text-center text-warning">
                                @if($paymentStatus->status == 'Pending')
                                Your Process is {{$paymentStatus->status}} after complete the process Hostel owner assign the room.
                                @else if($paymentStatus->status == 'Accepted')
                                Your Process is {{$paymentStatus->status}}.Congrats your room is assigned.
                                @endif
                              </h4>
                              <form method="post"  action="/transition_save">
                                @csrf
                                <input type="hidden" name="ownerEmail" value="{{$ownerEmail}}">
                                <input type="hidden" name="hid" value="{{$hid}}">
                                <input type="hidden" name="uid" value="{{Auth::id()}}">
                                <input type="hidden" name="ownerid" value="{{$ownerid}}">
                                <div class="form-group">
                                <label for="exampleFormControlSelect1" style="font-size: 13px;">Select Method</label>
                                <select class="form-control" name="method" id="method" style="font-size: 13px;">
                                  <option value="EasyPasia" selected disabled style="font-size: 13px;">Select Method</option>
                                  <option value="EasyPasia" style="font-size: 13px;">EasyPasia</option>
                                  <option value="JazzCash" style="font-size: 13px;">JazzCash</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <div class="card">
                                  <div class="card-body">
                                    @foreach($transitionDetails as $record)
                                      @if($record->method == 'EasyPasia')
                                      <div id="EasyPasia" style="display:none;">
                                        <ul class="list-group" style="font-size:13px;">
                                          <li class="list-group-item"><b>Account Title:</b> {{$record->account_title}}</li>
                                          <li class="list-group-item"><b>Account No:</b> {{$record->account_no}}</li>
                                        </ul>
                                      </div>
                                      @else
                                      <div id="JazzCash" style="display:none;">
                                        <ul class="list-group" style="font-size:13px;">
                                          <li class="list-group-item"><b>Account Title:</b> {{$record->account_title}}</li>
                                          <li class="list-group-item"><b>Account No:</b> {{$record->account_no}}</li>
                                        </ul>
                                      </div>
                                      @endif
                                    @endforeach
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="font-size: 13px;">Enter Transaction ID</label>
                                <input type="text" class="form-control" name="txno" id="exampleInputEmail1" style="font-size: 13px;">
                                <span class="text-danger">@error('txno'){{$message}} @enderror</span>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label" style="font-size: 13px;">Enter Amount (PKR)</label>
                                <input type="number" class="form-control" name="amount" id="exampleInputPassword1" style="font-size: 13px;">
                                <span class="text-danger">@error('amount'){{$message}} @enderror</span>
                              </div>
                              <button type="submit" name="" class="btn btn-warning" style="font-size:13px; width: 58px;height: 35px;">Pay <i class="fa fa-paper-plane-o"></i></button>
                              </form>
                            </div>
                            @else
                            <div class="card-body">
                              <form method="POST" action="{{route('booking')}}">
                                @csrf
                                <input type="hidden" name="ownerEmail" value="{{$ownerEmail}}">
                                <input type="hidden" name="hid" value="{{$hid}}">
                                <input type="hidden" name="uid" value="{{Auth::id()}}">
                                <input type="hidden" name="ownerid" value="{{$ownerid}}">
                                <div class="mb-3">
                                  <label for="fname" class="form-label">Your First-Name</label>
                                  <input type="text" name="fname" class="form-control" id="fname" value="{{Auth::user()->fname}}" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="lname" class="form-label">Your Last-Name</label>
                                  <input type="text" name="lname" class="form-control" 
                                    id="lname" value="{{Auth::user()->lname}}" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="email" class="form-label">Your Email</label>
                                  <input type="email" name="email" class="form-control" 
                                    id="email" value="{{Auth::user()->email}}" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="gender" class="form-label">Gender</label>
                                  <input type="text" class="form-control" 
                                    id="gender" name="gender" value="{{Auth::user()->gender}}" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="cnic" class="form-label">Your CNIC</label>
                                  <input type="text" name="cnic" class="form-control" 
                                    id="cnic" value="{{Auth::user()->cnic}}" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="PhenoNo" class="form-label">Your PhenoNo</label>
                                  <input type="text" value="Phenono" class="form-control" name="pheonno" 
                                    id="PhenoNo" value="{{Auth::user()->Phenono}}" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="Address" class="form-label">Your Address</label>
                                  <input type="text" class="form-control" 
                                    id="Address" name="address" value="{{Auth::user()->address}}" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="people" class="form-label">How Many People are you?</label>
                                  <input type="number" class="form-control" 
                                    id="people" value="" name="people" placeholder="How Many People are you?">
                                    <span class="text-danger">
                                      @error('people')
                                      {{$message}}
                                      @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                  <div class="form-floating">
                                    <label for="floatingTextarea">Any Message Or Information</label>
                                    <textarea class="form-control" name="message" placeholder="Any Message Or Information" id="floatingTextarea"
                                    style="height: 140px">
                                      
                                    </textarea>
                                  </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                  <button type="submit" class="btn btn-outline-warning w-75 text-dark" style="font-size: 13px">
                                    Book <i class="fa fa-paper-plane-o" style="margin-left:7px;"></i>
                                  </button>
                                </div>
                              </form>
                            </div>
                            @endif
                        </div>
                      </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-12" style="margin-top: 23px;">
                    <h4 style="font-size: 30px; padding: 45px; text-align: center;">Amenities/Facilities</h4>
                    @foreach(explode(',', $data->facilities)  as $project)
                    <div class="col-3 col-md-3 p-2" style="font-size: 20px;">{!!$project!!} </div>
                    @endforeach
                </div>
                <div class="col-12 col-md-12" style="margin-top:10px;">
                  <div class="row">
                  <h4 class="col-12 text-center" style="font-size: 30px; padding: 45px;">Hostel Condition</h4>
                  <div class="row" style="margin-left: 117px;">
                    <div class="col-2 col-md-2 color">
                      <h5 class="text-center p-3">
                        <b>Hostel Condition:</b>
                      
                      </h5>
                          <p>{{$data->h_condition}}</p>
                    </div>
                    <div class="col-2 col-md-2 color">
                      <h5 class="text-center p-3">
                        <b>Hostel Floor:</b>
                  
                      </h5>
                          <p>{{$data->h_floor}}</p>
                    </div>
                    <div class="col-2 col-md-2 color">
                      <h5 class="text-center p-3">
                        <b>Hostel Bills:</b>
                        
                      </h5>
                          <p>{{$data->bills_included}}</p>
                    </div>
                    <div class="col-2 col-md-2 color">
                      <h5 class="text-center p-3">
                        <b>Hostel Letting Type:</b>
                       
                      </h5>
                         <p>{{$data->letting_type}}</p>
                    </div>
                    <div class="col-2 col-md-2 color">
                      <h5 class="text-center p-3">
                        <b>Hostel Rent Negotiable:</b>
                       
                      </h5>
                         <p>{{$data->letting_type}}</p>
                    </div>
                    <!-- <div class="col-2 col-md-2 color">
                      <h5 class="text-center p-3">
                        <b>Hostel Schedule:</b>
                     
                      </h5>
                         <p>{{$data->h_schedule}}</p>
                    </div> -->
                    <div class="col-2 col-md-2 color">
                      <h5 class="text-center p-3">
                        <b>Hostel Bathroom:</b>
                     
                      </h5>
                         <p>{{$data->h_bathroom}}</p>
                    </div>
                    <div class="col-2 col-md-2 color">
                      <h5 class="text-center p-3">
                        <b>Hostel Mess:</b>
                 
                      </h5>
                         <p>{{$data->h_mess}}</p>
                    </div>
                    <div class="col-2 col-md-2 color">
                      <h5 class="text-center p-3">
                        <b>Hostel Occupancy:</b>
                      
                      </h5>
                          <p>{{$data->h_occopancy}}</p>
                    </div>
                    <div class="col-2 col-md-2 color">
                      <h5 class="text-center p-3">
                        <b>Hostel Hostel Size:</b>
                      
                      </h5>
                          <p>{{$data->hostel_area}}</p>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <h4 class="col-12 text-center" style="font-size: 30px; padding: 45px;">Hostel Location</h4>
                    <div class="col-12 col-md-12" style="display:flex;justify-content: center; align-items:center;">
                      <div id="map" ></div>
                    </div>
                  </div>
                </div>
              </div>
        </section>
        <div class="container">
          <div class="row">
        <div class="col-12 col-md-4">
          <div class="card pt-4 mb-4 shadow mt-5 rounded-6" style="background-color: #eee">
              <h3 class="text-center pt-4 mb-4">Owner Profile</h3>
              <div class="bg-image hover-overlay ripple rounded-circle text-center" data-mdb-ripple-color="light" style="padding-bottom: 25px;">
                  
                   @if($ownerData)
                      @if($ownerData->profile)
                           <img style="border: 14px solid #c5c1c1; width: 180px;height: 180px;" class="text-center w-50 rounded-circle img-fluid" src="{{asset('profile/'.$ownerData->profile)}}"
                            />
                       @else
                   <img style="border: 14px solid #c5c1c1; width: 180px;height: 180px;" class="text-center w-50 rounded-circle img-fluid" src="{{asset('images/dummy.png')}}"
                            />    
                       
                       @endif 
                  @else
                  <img style="border: 14px solid #c5c1c1; width: 180px;height: 180px;" class="text-center w-50 rounded-circle img-fluid" src="{{asset('images/dummy.png')}}"
                            /> 
                  @endif
                  <a href="">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
              </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card pt-4 mb-4 shadow mt-5 rounded-6 " id="business_data"  style="display: block;">
              <div class="card-body">
                  <h3 class="pt-2 mb-4 text-center">Owner Profile</h3>
                  <div class="row">
                      <div class="col-sm-3">
                          <b class="mb-0" style="font-size:15px;">Your Name:</b>
                      </div>
                      <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$ownerData->manager_name}}</p>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <b class="mb-0" style="font-size:15px;">Your Email:</b>
                      </div>
                      <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$ownerData->email}}</p>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <b class="mb-0" style="font-size:15px;">Your Phone No:</b>
                      </div>
                      <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$ownerData->manager_phoneno}}</p>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        </div>
        </div>

        <!-- Recommdation hostel  -->
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-12" style="margin-top: 45px;
              margin-bottom: 39px;">
              <p class="col-12 text-center" style="font-family: 'Sintony', sans-serif;
              font-size: 18px;font-weight: 700;text-transform: uppercase;">RELATED AND NEAR BY <span style="color: #d38321;">HOSTELS</span> OF <span style="color: #d38321;">SEARCHED AREA.</span> </p>
              <h3 class="col-12 text-center" style="    font-size: 40px !important;    letter-spacing: .1em !important; font-family: 'Poppins', sans-serif; color: #2d4052; font-weight: 700;
                text-transform: uppercase">RELATED HOSTELS</h3>
            </div>
            @foreach($recomand as $project) 
            <div class="col-12 col-md-4" style="margin-bottom: 30px;">
              <div class="card" style="width: 100%;">
                <p style="display:none;">  {{$count=0}}</p>
                 @foreach(explode(',', $project->new_filenames)  as  $key => $project1)
                 @if($count==0)
                 <div class="">
                    <img class="d-block w-100" src="{{ asset('hostelimg_upload/'.$project1) }}" alt="First slide" style="width:300px; height: 200px;">
                  </div>
                  @endif
                 <p style="display:none;"> {{$count++}}</p>
                  @endforeach
                <div class="card-body">
                  <h3 class="card-title">Hostel Name:<span class="recommdClass">{{$project->h_name}}</span></h3>
                  <h3 class="card-text">Hostel Details:<span class="recommdClass">{{$project->h_details}}</span></h3>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><h3>Hostel Phone No:<span class="recommdClass">{{$project->h_phoneno}}</span></h3></li>
                  <li class="list-group-item"><h3>Hostel Address:<span class="recommdClass">{{$project->h_address}}</span></h3></li>
                </ul>
                <div class="card-body">
                  <a href="{{url('allhostel/'.$project->id)}}" class="btn btn-warning card-link text-white" style="width: 85px;height: 25px;font-size: 11px;">View Details
                  </a>
                </div>
              </div>
            </div>
           
            @endforeach
          </div>
        </div>
 
    
        <!-- END / ROOM -->
      @endsection

      <!-- footer -->
      @section('footer')
      @parent
      @endsection
      @section('script')
      @parent

<script type="text/javascript">
    var map;
    
    function initMap() {      
      var latitude = {{$h_latitude}}; // YOUR LATITUDE VALUE
      var longitude = {{$h_longitude}}; // YOUR LONGITUDE VALUE
      var myLatLng = {lat: latitude, lng: longitude};
      
      map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 14          
      });
          
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        //title: 'Hello World'
        
        // setting latitude & longitude as title of the marker
        // title is shown when you hover over the marker
        title: latitude + ', ' + longitude 
      });     
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&callback=initMap"
    async defer></script>
    <script type="text/javascript">
      // var jazzcash = document.getElementById('JazzCash');
      // var e = document.getElementById("method");
      // var value = e.value;
      // var text = e.options[e.selectedIndex].text;
      // console.warn(text);
      const select = document.getElementById('method');

      select.addEventListener('change', function handleChange(event) {
        if (event.target.value =='EasyPasia') {
            document. getElementById("EasyPasia"). style. display = "block";
            document. getElementById("JazzCash"). style. display = "none";
        }else if(event.target.value =='JazzCash'){
            document. getElementById("JazzCash"). style. display = "block";
            document. getElementById("EasyPasia"). style. display = "none";
        }

        // 👇️ get selected VALUE even outside event handler
        // console.log(select.options[select.selectedIndex].value);

        // 👇️ get selected TEXT in or outside event handler
        // console.log(select.options[select.selectedIndex].text);
      });
    </script>
      @endsection