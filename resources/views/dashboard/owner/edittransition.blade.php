
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
              <form method="post" action="{{url('owner/edittransitionvalue')}}" class="col-12">
            @csrf
            <input type="hidden" name="id" value="{{$record->id}}">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Select Method</label>
              <select class="form-control" name="method" id="exampleFormControlSelect1">
                <option value="EasyPasia" {{ $record->method == 'EasyPasia' ? 'selected' : '' }}>EasyPasia</option>
                <option value="JazzCash" {{ $record->method == 'JazzCash' ? 'selected' : '' }}>JazzCash</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Enter Account Title</label>
              <input type="text" class="form-control" name="account_title" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$record->account_title}}">
              <span class="text-danger">@error('account_title'){{$message}} @enderror</span>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Enter Account Number</label>
              <input type="text" class="form-control" name="account_no" id="exampleInputPassword1" value="{{$record->account_no}}">
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
    </div>
  </div>
@endsection

@section('script')
<!-- Bootstrap -->
<!-- AdminLTE -->

<!-- OPTIONAL SCRIPTS -->


@endsection

