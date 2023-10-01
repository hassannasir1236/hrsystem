
@extends('layouts.admin_index')
 @section('link')
  <script src="https://cdn.tiny.cloud/1/2wdcn9d3snm1f3avfuleeygwuwz3gsfve3no8v7qsyxefijp/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
     <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
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

       @if(session()->has('success'))
              <div class="alert alert-success mt-5">
                  {{ session()->get('success') }}
              </div>
          @endif
          @if(session()->has('fail'))
              <div class="alert alert-danger mt-5">
                  {{ session()->get('fail') }}
              </div>
          @endif
      <!-- <h3 class="mb-2 text-center p-4">Over all details <i class="fas fa-calendar-week"></i></h3> -->
        <div class="row pt-4">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">{{$alluser}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div> 
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-house-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Owner</span>
                <span class="info-box-number">{{$allowner}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-hotel text-white"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Hostel</span>
                <span class="info-box-number">{{$allhostel}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fab fa-telegram-plane"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today Mail</span>
                <span class="info-box-number">{{$todaymail}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- <h3 class="mb-2 col text-center p-3"> Product Charts <i class="fas fa-chart-bar"></i></h3> -->
        <div class="row d-flex justify-content-center align-items-center pt-5 mb-5">
         
          <div class="col-12 col-md-6">
            <!-- LINE CHART -->
            <div class="card card-info shadow">
              <div class="card-header">
                <h3 class="card-title">Line Chart For User</h3>

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
          </div>
          <div class="col-12 col-md-6">
            <!-- BAR CHART -->
            <div class="card card-success shadow">
              <div class="card-header">
                <h3 class="card-title">Bar Chart For Hostel Owner</h3>

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
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-12 col-md-6">
             <div class="card card-danger shadow">
              <div class="card-header">
                <h3 class="card-title">Donut Chart For User Booking</h3>

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
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="card card-primary shadow">
              <div class="card-header">
                <h3 class="card-title">Area Chart For Hostel</h3>

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
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
    </div>
    <div class="container">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Complain List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Time</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($todaymaildata as $data)
                  <tr>
                    <td>{{$data->name}}</td>
                    <td><a id="mail" href="mailto:{{$data->email}}">{{$data->email}}</a></td>
                    <td>{{$data->subject}}</td>
                    <td>{{$data->usermessage}}</td>
                    <td>{{$data->created_at->diffForHumans()}}</td>
                    <td>
                      <a id="{{ $data->id }}" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-delete-{{ $data->id }}" onClick="reply_click(this.id)">
                      <i class="fas fa-reply"></i> Replay</a>
                    </td>
                  </tr>
                  @endforeach
                  <!-- <div class="modal fade" id="modal-delete-{{ $data->id }}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <div class="modal fade" id="modal-delete-{{ $data->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Default Modal</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('admin.sendmail')}}" method="post">
                            @csrf
                            <input type="hidden" id="userid" name="userid" value="">
                            <div class="mb-3">
                              <label class="form-label">MailTo:</label>
                              <input type="text" class="form-control" id="mailto" aria-describedby="emailHelp" disabled value="">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Enter Subject</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="subject">
                              <span class="text-danger">@error('subject'){{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                              <div>
                                  <label for="questionUpdate">what are you want to write:</label>
                                  <textarea name="usermessage"></textarea>
                                  <span class="text-danger">@error('usermessage'){{$message}} @enderror</span>
                              </div>
                            </div>
                          
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary"><i class="fas fa-share"></i>  Send Mail</button>
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Time</th>
                    <th>Action</th>
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
<!-- 
  ///////////
  Line Chart 
////////////
-->

<script src="../../plugins/chart.js/Chart.min.js"></script>
<script type="text/javascript">
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
          data                : [{{ implode(",",$userPerMonth) }}]
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
          data                :[{{ implode(",",$LastYearMonth) }}],
        },
      ]
    }
    // for area chart record
          var areachartrecord = {
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
              data                : [{{ implode(",",$HostelPerMonth) }}]
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
              data                : [{{ implode(",",$LastYearMonthHostel) }}]
            },
          ]
        }
        // for Bar chart record
        var barchartrecord = {
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
              data                : [{{ implode(",",$HostelOwnerPerMonth) }}]
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
              data                :[{{ implode(",",$LastYearMonthHostelOwner) }}],
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
    // Area Chart
         new Chart(areaChartCanvas, {
          type: 'line',
          data: areachartrecord,
          options: areaChartOptions
        })
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
        // Bar Chart 
         var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, barchartrecord)
        var temp0 = barchartrecord.datasets[0]
        var temp1 = barchartrecord.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
          responsive              : true,
          maintainAspectRatio     : false,
          datasetFill             : false
        }

        new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
        })
        // Donut Chart
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
          labels: [
              'Rejected Booking',
              'Accepted Booking',
              'Pending Booking',
          ],
          datasets: [
            {
              data: [{{ implode(",",$BookingRecordThisMonth) }}],
              backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
            }
          ]
        }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
         //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        })
      });  
</script>
<script type="text/javascript">
  function reply_click(clicked_id)
  {
      document.querySelector('#userid').value = clicked_id;
     var mailtext = document.querySelector('#mail').innerText;
     document.querySelector('#mailto').value = mailtext;
  }
</script>
@endsection

