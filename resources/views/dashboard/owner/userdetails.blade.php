
@extends('layouts.admin_index')
 @section('link')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
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
                    <th>Status</th>
                    <th>Txno</th>
                    <th>People</th>
                    <th>Message</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                <tbody>
                    @foreach($record as $record)
                  <tr>
                    <td>{{$record->fname}}</td>
                    <td>{{$record->lname}}</td>
                    <td>{{$record->gender}}</td>
                    <td>{{$record->cnic}}</td>
                    <td>{{$record->phoneno}}</td>
                    <td>{{$record->state}}</td>
                    <td> {{$record->city}}</td>
                    <td>{{$record->address}}</td>
                    <td>{{$record->email}}</td>
                    @if($record->status == 'Accepted')
                    <td style="color:#ffc107;">
                      <button class="text-white btn-success border-0 shadow">{{$record->status}}</button>
                    </td>
                    @elseif($record->status == 'Pending')
                    <td style="color:#ffc107;">
                      @if(isset($record->payment_status))
                      <button class="text-white btn-warning border-0 shadow">{{$record->payment_status}}</button>
                      @else
                      <button class="text-white btn-warning border-0 shadow">{{$record->status}}</button>
                      @endif
                    </td>
                    @else
                    <td style="color:#ffc107;"><button class="text-white btn-danger border-0 shadow">{{$record->status}}</button></td>
                    @endif
                    <td>{{$record->txno}}</td>
                    <td>{{$record->people}}</td>
                    <td>{{$record->message}}</td>
                    <td>  
                        
                      <a href="{{ url('owner/edit/'.$record->uid .'/' . $record->hid) 
                        . '/Accepted'}}" id="accept" class="btn btn-outline-success rounded-3">Accepted </a>
                      <a href="{{ url('owner/edit/' . $record->uid . '/' . $record->hid 
                        . '/Rejected')}}" class="btn btn-outline-danger rounded-3">Rejected</a>
                      <a href="{{ url('owner/edit/' . $record->uid . '/' . $record->hid 
                        . '/PendingPayment')}}" class="btn btn-outline-warning rounded-3">Pending Payment</a>
                    </td>
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
                    <th>Status</th>
                    <th>Txno</th>
                    <th>People</th>
                    <th>Message</th>
                    <th> Action</th>
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#accept").click(function(){

                Swal.fire(
  'The Demo?',
  'This is Demo ?',
  'Asking'
)
            });
        });
    </script>

@endsection

