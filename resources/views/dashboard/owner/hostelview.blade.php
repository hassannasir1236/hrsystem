
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
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pending Details Of Booking</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Cnic</th>
                    <th>PhenoNo</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Email</th>
                  </tr>
                  </thead>
                <tbody>
                    @foreach($result as $record)
                  <tr>
                    <td>{{$record->fname}}</td>
                    <td>{{$record->lname}}</td>
                    <td>{{$record->gender}}</td>
                    <td>{{$record->cnic}}</td>
                    <td>{{$record->phoneno}}</td>
                    <td>{{$record->state}}</td>
                    <td> {{$record->city}}</td>
                    <td>{{$record->address}}</td>
                    <td><a href="mailto:{{$record->email}}"> {{$record->email}}</a></td>
                    
                  </tr>
                    @endforeach
                </tbody>
                  <tfoot>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Cnic</th>
                    <th>PhenoNo</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Email</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
  </div>
@endsection

@section('script')
<!-- Bootstrap -->
<!-- AdminLTE -->

<!-- OPTIONAL SCRIPTS -->


@endsection

