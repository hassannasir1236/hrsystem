
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
       @if(session()->has('success'))
            <div class="alert alert-success mt-5 col-12">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('fail'))
            <div class="alert alert-danger mt-5 col-12">
                {{ session()->get('fail') }}
            </div>
        @endif
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-6">
          
          <div class="card mt-4">
            <div class="card-body">
              <h3 class="text-center p-3 col">
                <i class="fas fa-money-check-alt fa-1xx"></i>
                Enter Transition Details
              </h3>
              <form method="post" action="savetransitionDetails" class="col-12">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlSelect1">Select Method</label>
              <select class="form-control" name="method" id="exampleFormControlSelect1">
                <option value="EasyPasia">EasyPasia</option>
                <option value="JazzCash">JazzCash</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Enter Account Title</label>
              <input type="text" class="form-control" name="account_title" id="exampleInputEmail1" aria-describedby="emailHelp">
              <span class="text-danger">@error('account_title'){{$message}} @enderror</span>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Enter Account Number</label>
              <input type="text" class="form-control" name="account_no" id="exampleInputPassword1">
              <span class="text-danger">@error('account_no'){{$message}} @enderror</span>
            </div>
            <!-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">I understand after the funds added i will not ask fraudulent dispute or charge-back.</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
            </div>
          </div>
        </div>
      </div>
      @if(isset($record))
      <div class="row">
        <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Transition Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Method Name</th>
                    <th>Account Title</th>
                    <th>Account Number</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                <tbody>
                    @foreach($record as $record)
                  <tr>
                    <td>{{$record->method}}</td>
                    <td>{{$record->account_title}}</td>
                    <td>{{$record->account_no}}</td>
                    <td>
                      <a href="{{url('owner/edittransition/'.$record->id)}}" class="btn btn-outline-secondary" >
                        <i class="fas fa-edit"></i> Edit 
                      </a>
                      <form action="delete_transition/{{$record->id}}" method="post" style="display: inline-block;">
                  @csrf
                    {{ method_field('delete') }}
                      <!-- Alert::success('Success Title', 'Success Message'); -->
                      <input type="hidden" name="deletekey" value=" {{$record->id}}">
                    <button class="btn btn-outline-danger mt-4 mb-4 show_confirm" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
                    </td>
                  </tr>
                    @endforeach
                </tbody>
                  <tfoot>
                  <tr>
                    <th>Method Name</th>
                    <th>Account Title</th>
                    <th>Account Number</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
      @endif
    </div>
  </div>
@endsection

@section('script')

<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
@endsection

