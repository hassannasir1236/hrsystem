
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
                <h3 class="card-title">All Users Details Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>User picture</th>
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
                    @foreach($record as $record)
                  <tr>
                    <td>
                      @if(isset($record->avatar))
                      <img
                       src="{{$record->avatar}}"
                        class="rounded-circle img-fluid w-50 rounded-circle"
                        loading="lazy"
                        style="border: 14px solid #c5c1c1;"
                      />
                      @elseif(isset($record->my_new_photo))
                       <img
                       src="{{asset('profile/'.$record->my_new_photo)}}"
                        class="rounded-circle img-fluid w-50 rounded-circle"
                        loading="lazy"
                        style="border: 14px solid #c5c1c1;"
                      />
                      @else
                      <img
                        src="{{asset('images/dummy.png')}}"
                        class="rounded-circle img-fluid w-50 rounded-circle"
                        loading="lazy"
                         style="border: 14px solid #c5c1c1;"
                      />
                      @endif
                    </td>
                    <td>{{$record->fname}}</td>
                    <td>{{$record->lname}}</td>
                    <td>{{$record->gender}}</td>
                    <td>{{$record->cnic}}</td>
                    <td>{{$record->phoneno}}</td>
                    <td>{{$record->state}}</td>
                    <td> {{$record->city}}</td>
                    <td>{{$record->address}}</td>
                    <td>{{$record->email}}</td>
                    
                  </tr>
                    @endforeach
                </tbody>
                  <tfoot>
                  <tr>
                    <th>User picture</th>  
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
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>              
    </div>
  </div>
@endsection

@section('script')



@endsection

