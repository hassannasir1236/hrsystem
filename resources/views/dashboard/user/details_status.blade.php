@extends('layouts.user')
@section('content')
@section('cs')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection
<div class="container">
  <div class="row">
          <div class="col-12">
               <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Hostels Details Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">


                <table id="table_id" class="display">
                  <thead>
                      <tr>
                        <th>Hostel Name</th>
                        <th>Hostel PhenoNo</th>
                        <th>Hostel RoomNo</th>
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
                       <tr>
                    
                    <td>{{$record->h_name}}</td>
                    <td>{{$record->h_phoneno}}</td>
                    <td>{{$checkstatus->roomno}}</td>
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
                  </tbody>
              </table>
                <!-- <table id="myTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Hostel Name</th>
                    <th>Hostel PhenoNo</th>
                    <th>Hostel RoomNo</th>
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
                  <tr>
                    
                    <td>{{$record->h_name}}</td>
                    <td>{{$record->h_phoneno}}</td>
                    <td>{{$checkstatus->roomno}}</td>
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
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Hostel Name</th>
                    <th>Hostel PhenoNo</th>
                    <th>Hostel RoomNo</th>
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
                </table> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
</div>

@endsection
@section('js')
<script type="text/javascript" src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript">
 $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endsection