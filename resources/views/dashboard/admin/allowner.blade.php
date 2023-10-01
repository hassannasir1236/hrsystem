
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
                    <th>Manager Picture</th>
                    <th>Manager Name</th>
                    <th>Manager Cnic</th>
                    <th>Manager Phoneno</th>
                    <th>Manager Email</th>
                  </tr>
                  </thead>
                <tbody>
                    @foreach($record as $record)
                  <tr>
                    <td>
                        <img class="text-center w-50 rounded-circle img-fluid" style="border: 14px solid #c5c1c1;"
                      @if($record->profile)
                           src="{{asset('profile/'.$record->profile)}}"
                       @else
                       src="{{asset('images/dummy.png')}}"
                       @endif 
                  />
                    </td>
                    <td>{{$record->manager_name}}</td>
                    <td>{{$record->manager_cnic}}</td>
                    <td>{{$record->manager_phoneno}}</td>
                    <td>{{$record->email}}</td>
                    
                  </tr>
                    @endforeach
                </tbody>
                  <tfoot>
                  <tr>
                    <th>Manager Picture</th>
                    <th>Manager Name</th>
                    <th>Manager Cnic</th>
                    <th>Manager Phoneno</th>
                    <th>Manager Email</th>
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

