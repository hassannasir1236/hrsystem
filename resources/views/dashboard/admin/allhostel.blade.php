
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
          <div class="col-12">
               <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Hostels Details Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Hostel Picture</th>
                    <th>Hostel Name</th>
                    <th>Hostel PhenoNo</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Hostel Address</th>
                    <th>Hostel Details</th>
                    <th>Hostel Category</th>
                    <th>Hostel Rent</th>
                    <th>Hostel Rent Period</th>
                    <th>Hostel Bill</th>
                    <th>Hostel Letting Type</th>
                    <th>Hostel Area</th>
                    <th>Hostel Condition</th>
                    <th>Hostel Floor</th>
                    <th>Hostel Schedule</th>
                    <th>Hostel Bathroom</th>
                    <th>Hostel Mess</th>
                    <th>Hostel Lawn</th>
                    <th>Hostel Occopancy</th>
                  </tr>
                  </thead>
                <tbody>
                    @foreach($record as $record)
                  <tr>
                    <td>
                        @foreach(explode(',', $record->new_filenames)  as  $key => $project)
                            <div class=" shadow  {{$key == 1 ? 'active' : '' }}">
                                @if($key == 2)
                                <img class="d-block" src="{{ asset('hostelimg_upload/'.$project) }}" alt="First slide" 
                                style="width: 300px;height:300px;">
                                @endif
                            </div>
                        @endforeach
                    </td>
                    <td>{{$record->h_name}}</td>
                    <td>{{$record->h_phoneno}}</td>
                    <td>{{$record->h_state}}</td>
                    <td>{{$record->h_country}}</td>
                    <td>{{$record->h_city}}</td>
                    <td>{{$record->h_address}}</td>
                    <td>{{$record->h_details}}</td>
                    <td>{{$record->h_category}}</td>
                    <td>{{$record->h_rent}}</td>
                    <td>{{$record->rent_period}}</td>
                    <td>{{$record->bills_included}}</td>
                    <td>{{$record->letting_type}}</td>
                    <td>{{$record->hostel_area}}</td>
                    <td>{{$record->h_condition}}</td>
                    <td>{{$record->h_floor}}</td>
                    <td>{{$record->h_schedule}}</td>
                    <td>{{$record->h_bathroom}}</td>
                    <td>{{$record->h_mess}}</td>
                    <td>{{$record->h_lawn}}</td>
                    <td>{{$record->h_occopancy}}</td>
                  </tr>
                    @endforeach
                </tbody>
                  <tfoot>
                  <tr>
                    <th>Hostel Picture</th>
                    <th>Hostel Name</th>
                    <th>Hostel PhenoNo</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Hostel Address</th>
                    <th>Hostel Details</th>
                    <th>Hostel Rent</th>
                    <th>Hostel Rent Period</th>
                    <th>Hostel Bill</th>
                    <th>Hostel Letting Type</th>
                    <th>Hostel Area</th>
                    <th>Hostel Condition</th>
                    <th>Hostel Floor</th>
                    <th>Hostel Schedule</th>
                    <th>Hostel Bathroom</th>
                    <th>Hostel Mess</th>
                    <th>Hostel Lawn</th>
                    <th>Hostel Occopancy</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        </div>
    </div>
@endsection

@section('script')
<!-- Bootstrap -->
<!-- AdminLTE -->

<!-- OPTIONAL SCRIPTS -->


@endsection

