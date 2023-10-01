
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
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Welcome to Hostel OWner to Add & Check Details of hostel.</h1>
          </div><!-- /.col --><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     @if(session()->has('success'))
        <div class="alert alert-success" >
            {{ session()->get('success') }}
        </div>
        @endif
          @if(session()->has('info'))
        <div class="alert alert-info">
            {{ session()->get('info') }}
        </div>
        @endif
        @if(session()->has('fail'))
        <div class="alert alert-danger">
            {{ session()->get('fail') }}
        </div>
        @endif
    <!-- /.content-header -->
    <div class="row ml-4 mr-4">
      
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$pagecountuser}}</h3>

                <p>Hostel views</p>
              </div>
              <div class="icon">
                <i class="fa fa-building"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$PendingRoom}}<sup style="font-size: 20px"></sup></h3>

                <p>Pending Room</p>
              </div>
              <div class="icon">
                <i class="fa fa-home"></i>
              </div>
              <a href="#section1" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning" style="color:white;">
              <div class="inner" style="color:white;">
                <h3>{{$TotalUser}}</h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{url('owner/user_details')}}" class="small-box-footer" style="color:white;">
                More info <i class="fas fa-arrow-circle-right" style="color:white;"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$RoomAssign}}</h3>

                <p>Room Assign</p>
              </div>
              <div class="icon">
                <i class="fa fa-bed"></i>
              </div>
              <a href="{{url('owner/roomassign')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    
    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-12">
             <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Yearly Hostel Visitors</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-lg-6 col-12">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Hostel Overview This Month</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                 @if($count>0)
                  @if($RejectCondition == 'increase')
                       <p class="text-success text-xl">
                          <i class="ion ion-ios-people-outline"></i>
                        </p> 
                      @elseif($RejectCondition == 'warning')
                       <p class="text-warning text-xl">
                           <i class="ion ion-ios-people-outline"></i>
                        </p>
                      @elseif($RejectCondition == 'decrease')
                       <p class="text-danger text-xl">
                          <i class="ion ion-ios-people-outline"></i>
                        </p>
                      @endif
                         @endif    
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                     @if($count>0)
                      @if($RejectCondition == 'increase')
                      <i class="ion ion-android-arrow-up text-success"></i>
                      {{$RejectUser_current_month/$count*100}}% 
                      @elseif($RejectCondition == 'warning')
                      <i class="ion ion-android-arrow-up text-warning"></i>
                      {{$RejectUser_current_month/$count*100}}%
                      @elseif($RejectCondition == 'decrease')
                      <i class="ion ion-android-arrow-down text-danger"></i>
                      {{$RejectUser_LastMonth/$count*100}}%
                      @endif
                      @endif 
                    </span>
                    <span class="text-muted">Rejected User</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                @if($count>0)
                  @if($BookingCondition == 'increase')
                       <p class="text-success text-xl">
                          <i class="fa fa-building"></i>
                        </p> 
                      @elseif($BookingCondition == 'warning')
                       <p class="text-warning text-xl">
                          <i class="fa fa-building"></i>
                        </p>
                      @elseif($BookingCondition == 'decrease')
                      <p class="text-danger text-xl">
                        <i class="fa fa-building"></i>
                      </p>
                      @endif 
                  @endif
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      @if($count>0)
                     @if($BookingCondition == 'increase')
                      <i class="ion ion-android-arrow-up text-success"></i>
                       {{$RoomBooking_current_month/$count*100}}%  
                      @elseif($BookingCondition == 'warning')
                      <i class="ion ion-android-arrow-up text-warning"></i>
                       {{$RoomBooking_current_month/$count*100}}% 
                      @elseif($BookingCondition == 'decrease')
                      <i class="ion ion-android-arrow-down text-danger"></i>
                       {{$RoomBooking_LastMonth/$count*100}}% 
                      @endif 
                       @endif
                    </span>
                    <span class="text-muted">Room Booking</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center mb-0">
                  @if($count>0)
                   @if($RegistrationCondition == 'increase')
                      <p class="text-success text-xl">
                        <i class="fas fa-registered"></i>
                      </p> 
                      @elseif($RegistrationCondition == 'warning')
                      <p class="text-warning text-xl">
                        <i class="fas fa-registered"></i>
                      </p>
                      @elseif($RegistrationCondition == 'decrease')
                      <p class="text-danger text-xl">
                        <i class="fas fa-registered"></i>
                      </p>
                      @endif 
                    @endif 
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                     @if($count>0)
                       @if($RegistrationCondition == 'increase')
                      <i class="ion ion-android-arrow-up text-success"></i>
                      {{$RegisterUser_current_month/$count*100}}% 
                      @elseif($RegistrationCondition == 'warning')
                      <i class="ion ion-android-arrow-up text-warning"></i>
                      {{$RegisterUser_current_month/$count*100}}%
                      @elseif($RegistrationCondition == 'decrease')
                      <i class="ion ion-android-arrow-down text-danger"></i>
                      {{$RegisterUser_LastMonth/$count*100}}%
                      @endif 
                     @endif  
                    </span>
                    <span class="text-muted">Registration Pending</span>
                  </p>
                </div>
                <!-- /.d-flex -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- Main content -->
    <section class="content" id="section1">
      <div class="container-fluid">
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
                    <th>Room No</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                <tbody>
                    @foreach($PendingUserRecord as $record)
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
                    <td style="color:#ffc107;">
                      @if(isset($record->payment_status))
                      <button class="text-white btn-warning border-0 shadow">{{$record->payment_status}}</button>
                      @else
                      <button class="text-white btn-warning border-0 shadow">{{$record->status}}</button>
                      @endif
                    </td>
                    <td>{{$record->txno}}</td>
                    <td>{{$record->people}}</td>
                    <td>{{$record->message}}</td>
                    <td>
                      <form  method="get" action="roomNoassign" >
                        <input type="hidden" name="id" id="{{$record->id}}" value="{{$record->id}}">
                        <input type="number" name="roomno" value="{{$record->roomno}}">
                        <input type="submit" class="btn btn-outline-primary">
                      </form>
                    </td>
                    <td>  
                      <a href="{{ url('owner/edit/'.$record->uid .'/' . $record->hid) 
                        . '/Accepted'}}" class="btn btn-outline-success rounded-3">Accepted</a>
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
                     <th>Room No</th>
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  


@endsection

@section('script')
<!-- Bootstrap -->
<!-- AdminLTE -->

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script> -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->


<!-- <script type="text/javascript">
   $(function () {
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
      // for Line chart record
     var linechartrecord = {
      labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label               : 'This Year',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [1,2,3,4,5,6,7,8,9,1,2,3]
        },
        {
          label               : 'Last Year',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                :[1,2,3,4,5,6,7,8,9,1,2,3],
        },
      ]
    }
    //  var areaChartOptions = {
    //   maintainAspectRatio : false,
    //   responsive : true,
    //   legend: {
    //     display: false
    //   },
    //   scales: {
    //     xAxes: [{
    //       gridLines : {
    //         display : false,
    //       }
    //     }],
    //     yAxes: [{
    //       gridLines : {
    //         display : false,
    //       }
    //     }]
    //   }
    // }
    // Line chart
      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        var lineChartOptions = $.extend(true, {}, areaChartOptions)
        var lineChartData = $.extend(true, {}, linechartrecord)
        lineChartData.datasets[0].fill = false;
        lineChartData.datasets[1].fill = false;
        lineChartOptions.datasetFill = false

        var lineChart = new Chart(lineChartCanvas, {
          type: 'line',
          data: lineChartData,
          options: lineChartOptions
        })
</script> -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#lineChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{{ implode(",",$userPerMonth) }}]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{ implode(",",$LastYearMonth) }}]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })
 })
</script>
<script type="text/javascript">
   $(document.body).on('click', '.js-submit-confirm', function (event) {
        event.preventDefault();
        var $form = $(this).closest('form');
        swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true
        },
                function () {
                    $form.submit();
                });
      });
</script>
<script>
$(function() {
    $('a[href*=\\#]:not([href=\\#])').on('click', function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
        if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    });
});
</script>
@endsection













<!-- 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
<div class="dropdown">
          <button class="btn bg-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right:30px;">
          {{Auth::guard('owner')->user()->manager_name}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                @if (!Auth::check())
                <a class="dropdown-item" href="{{route('owner.home')}}"  >
                Admin Login<i class="fas fa-sign-out-alt" style="margin-left:5px;"></i>   
              </a>
                @else
              <a class="dropdown-item" href="{{ route('owner.logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('owner.logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              @endif
            </li>
          </ul>
        </div>
</body>
</html> -->