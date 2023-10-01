@extends('layouts.master')
@section('title', 'Hostel Page')
@section('head')
   @parent
@endsection
 @section('header')
      @parent
      <style type="text/css">
          .category{
    cursor: pointer;
    color: #2d4052;
    border: 3px solid #e1bd85;
    padding: 0 5px;
    border-radius: 5px;
    font-size: 13px !important;
    margin-left: 4px;
       }
       .facility{
        color: #e1bd85;
        margin-left: 7px;
       }
      </style>
      @endsection
      <!-- loader -->
      @section('loader')
      @parent
      @endsection
      <!-- Content -->
      @section('content')
      @parent
     
      <section class="section-sub-banner bg-9">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>City Wise Hostels Details</h2>
                        <p>Check details for Hostel &amp; Rates,</p>
                    </div>
                </div>
            </div>
        </section>
           <section class="section-room bg-white">
            <div class="container">
               <div class="row">
                   @foreach($hosteldata as $project)   
                        <div class="col-12 col-md-12 shadow-lg" style="margin-top:65px;     box-shadow: 0 0 30px #b5a6a6;">
                            <div class="card">
                                <div class="card-body">
                                   <div class="row shadow border-1" style="margin-top:10px; padding:40px;">
                                       <div class="col-12 col-md-3">
                                      <p style="display:none;">  {{$count=0}}</p>
                                       @foreach(explode(',', $project->new_filenames)  as  $key => $project1)
                                       @if($count==0)
                               <div class="">
                                  <img class="d-block w-100" src="{{ asset('hostelimg_upload/'.$project1) }}" alt="First slide" style="width:300px; height: 200px;">
                                </div>
                                @endif
                               <p style="display:none;"> {{$count++}}</p>
                                @endforeach
                                       </div>
                                       <div class="col-12 col-md-9">
                                           <div class="row" style=" margin-bottom: 25px;   font-family: 'Poppins', sans-serif;font-size: 14px;line-height: 1.42857143;color: #6f6f6f;">
                                               <div class="col-12">
                                                  <h3> {{$project->h_name}}</h3>
                                               </div>
                                               <div class="col-12">
                                                   <p style="    font-family: 'Poppins', sans-serif;font-size: 14px;line-height: 1.42857143;color: #6f6f6f;">{{$project->h_address}}</p>
                                               </div>
                                               <div class="col-12" style="margin-top: 4px;margin-bottom: 10px;">
                                                   {!! $project->facilities !!}
                                               </div>
                                               <div class="col-12" style="display:flex;">
                                                <ul class="list-unstyled" style="display:flex;">
                                                    <li class="category">{{$project->h_rent}}PKR</li>
                                                    <li class="category">{{$project->rent_period}}</li>
                                                    <li class="category">{{$project->bills_included}}</li>
                                                    <li class="category">{{$project->letting_type}}</li>
                                                    <li class="category">{{$project->hostel_area}}</li>
                                                    <li class="category">{{$project->h_condition}}</li>
                                                    <li class="category">{{$project->h_floor}}</li>
                                                    <li style="font-size:8px;" class="category">{{$project->h_schedule}}</li>
                                                    <li class="category">{{$project->h_bathroom}}</li>
                                                    <li class="category">{{$project->h_mess}}</li>
                                                </ul>
                                               </div>
                                               <div class="col-12">
                                                   <b>{{$project->h_details}}</b>
                                               </div>
                                           </div>
                                           <div style="display: flex;justify-content: space-between;align-items: center;">
                                            <span class="category" style="margin-top:5px;">{{$project->h_category}}</span>
                                               <a href="{{url('allhostel/'.$project->id)}}" class="btn btn-warning">View Details</a>
                                           </div>
                                           
                                       </div>

                                   </div>
                               </div>
                           </div>
                        </div>
                    @endforeach
               </div>
            </div>
           </section>
            @endsection
      @section('footer')
      @parent
      @endsection
      @section('script')
      @parent
      @endsection