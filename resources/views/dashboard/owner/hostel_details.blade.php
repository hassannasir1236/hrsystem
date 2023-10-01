
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
          <div class="col-12 col-md-12">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                
                @foreach(explode(',', $data->new_filenames)  as  $key => $project)
               <div class="carousel-item {{$key == 1 ? 'active' : '' }}">
                  <img class="d-block w-100" src="{{ asset('hostelimg_upload/'.$project) }}" alt="First slide" style="width:400px; height: 600px;">
                </div>
                @endforeach
                
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="col-12 col-md-8">
            <h3 class="text-center p-3"><b>Hostel Name: </b>{{$data->h_name}}</h3>
            <hr>
            <div class="row">
                <h3 class="text-center p-3 col-12"><b>Hostel Details</b></h3>
                <div class="col-12 col-md-4">
                  <h5 class="text-center p-3"><b>Hostel Name:</b><p>{{$data->h_name}}</p></h5>
                </div>
                <div class="col-12 col-md-4">
                  <h5 class="text-center p-3"><b>Hostel PhoneNo:</b><p>{{$data->h_phoneno}}</p></h5>
                </div>
                <div class="col-12 col-md-4">
                  <h5 class="text-center p-3"><b>Hostel Country:</b><p>{{$data->h_country}}</p></h5>
                </div>
                <div class="col-12 col-md-4">
                  <h5 class="text-center p-3"><b>Hostel State:</b><p>{{$data->h_state}}</p></h5>
                </div>
                <div class="col-12 col-md-4">
                  <h5 class="text-center p-3"><b>Hostel city:</b><p>{{$data->h_city}}</p></h5>
                </div>
                 <div class="col-12 col-md-4">
                  <h5 class="text-center p-3"><b>Hostel Address:</b><p>{{$data->h_address}}</p></h5>
                </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-3 text-center">
                <div class="course-info__icon">
                <i class="ion-android-star fa-2x"></i>
                </div>
                <div class="course-info__text">
                  <span>Rating</span>
                  <p>0.0 (0 Ratings)</p> 
                </div>
              </div>
              <div class="col-3 text-center">
                <div class="course-info__icon">
                <i class="ion-ios-eye fa-2x"></i>
              </div>
              <div class="course-info__text">
                <span>Views</span>
                <p>{{$pagecount}}</p> 
              </div>
              </div>
              <div class="col-3 text-center">
                <div class="course-info__icon fa-2x">
                <i class="ion-male" aria-hidden="true"></i>
                </div>
                <div class="course-info__text">
                <span>Category</span>
                <p> {{$data->h_category}}
                </p>  
               </div>
              </div>
              <div class="col-3 text-center">
                <div class="course-info__icon">
                  <i class="fab fa-facebook-f fa-2x"></i>
                </div>
                <div class="course-info__text">
                  <span>Messanger</span>
                  <p><div class="fb-messengermessageus" messenger_app_id="1627885680581754" page_id="574918909533031" color="white" size="large"></div></p> 
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-12 col-md-12">
                <h3 class="text-center p-3"><b>Amenities</b></h3>
                <div class="row p-4">
                @foreach(explode(',', $data->facilities)  as $project)
                <div class="col-3 col-md-3 p-2">{!!$project!!} </div>
                @endforeach
              </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4" style="border-left: 1px dotted black;">
            <h3 class="text-center p-3"><b>Features</b></h3>
            <hr>
            <div class="row">
              <div class="col-12 col-md-12 d-flex justify-content-between">
                <b>Condition</b>
                <span style="border: 1px solid;background-color: black;color: white;width: 109px;border-radius: 42px;padding: 7px; text-align: center;">{{$data->h_condition}}</span>
              </div>
              <div class="col-12 col-md-12 d-flex justify-content-between">
                <b>Floor</b>
                <span style="border: 1px solid;background-color: black;color: white;width: 109px;border-radius: 42px;padding: 7px; text-align: center;">{{$data->h_floor}}</span>
              </div>
              <div class="col-12 col-md-12 d-flex justify-content-between">
                <b>Bills:</b>
                <span style="border: 1px solid;background-color: black;color: white;width: 109px;border-radius: 42px;padding: 7px; text-align: center;">{{$data->bills_included}}</span>
              </div>
              <div class="col-12 col-md-12 d-flex justify-content-between">
                <b>Letting Type:</b>
                <span style="border: 1px solid;background-color: black;color: white;width: 109px;border-radius: 42px;padding: 7px; text-align: center;">{{$data->letting_type}}</span>
              </div>
              <div class="col-12 col-md-12 d-flex justify-content-between">
                <b>Rent Negotiable:</b>
                <span style="border: 1px solid;background-color: black;color: white;width: 109px;border-radius: 42px;padding: 7px; text-align: center;">{{$data->h_rent}}</span>
              </div>
              <div class="col-12 col-md-12 d-flex justify-content-between">
                <b>Rent Period:</b>
                <span style="border: 1px solid;background-color: black;color: white;width: 109px;border-radius: 42px;padding: 7px; text-align: center;">{{$data->rent_period}}</span>
              </div>
              <div class="col-12 col-md-12 d-flex justify-content-between">
                <b>Schedule:</b>
                <span style="border: 1px solid;background-color: black;color: white;width: 109px;border-radius: 42px;padding: 7px; text-align: center;">{{$data->h_schedule}}</span>
              </div>
              <div class="col-12 col-md-12 d-flex justify-content-between">
                <b>Bathroom:</b>
                <span style="border: 1px solid;background-color: black;color: white;width: 109px;border-radius: 42px;padding: 7px; text-align: center;">{{$data->h_bathroom}}</span>
              </div>
              <div class="col-12 col-md-12 d-flex justify-content-between">
                <b>Mess:</b>
                <span style="border: 1px solid;background-color: black;color: white;width: 109px;border-radius: 42px;padding: 7px; text-align: center;">{{$data->h_mess}}</span>
              </div>
              <div class="col-12 col-md-12 d-flex justify-content-between">
                <b>Occupancy:</b>
                <span style="border: 1px solid;background-color: black;color: white;width: 109px;border-radius: 42px;padding: 7px; text-align: center;">{{$data->h_occopancy}}</span>
              </div>
              <div class="col-12 col-md-12 d-flex justify-content-between">
                <b>Hostel Size:</b>
                <span style="border: 1px solid;background-color: black;color: white;width: 109px;border-radius: 42px;padding: 7px; text-align: center;">{{$data->hostel_area}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>



@endsection

@section('script')
<!-- Bootstrap -->
<!-- AdminLTE -->

<!-- OPTIONAL SCRIPTS -->


@endsection

