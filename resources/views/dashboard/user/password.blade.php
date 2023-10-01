@extends('layouts.user')
@section('content')
<div class="container">
                      <div class="row d-flex justify-content-center align-items-center pt-5 mb-5">

                          <div class="card col-12 col-md-6 col-lg-8 shadow">
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
                              <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                  <h3 class="text-center mt-4">Change Password</h3>
                                  <p class="text-center">Please enter the following information to change your password</p>
                                  <form class="py-3 px-4 col-12 col-md-6 col-lg-8" method="post" action="{{route('user.userpassword')}}">
                                     @csrf
                                      <!-- Email input -->
                                      <div class="mb-4 col">
                                          <div class="form-outline ">
                                           
                                              <input type="password" name="old_password" id="form1Example1" class="form-control" value="{{old('old_password')}}" required />
                                              <label class="form-label" for="form1Example1">Old Password</label>
                                          </div>
                                          <span class="text-danger">@error('old_password'){{$message}} @enderror</span>
                                      </div>
                                      <!-- Password input -->
                                      <div class="col mb-4">
                                          <div class="form-outline">
                                            
                                              <input type="password" id="form1Example2" class="form-control" name="new_password"  value="{{old('new_password')}}" required/>
                                              <label class="form-label" for="form1Example2">New Password</label>
                                          </div>
                                          <span class="text-danger">@error('new_password'){{$message}} @enderror</span>
                                      </div>
                                      <!-- Confirm Password input -->
                                      <div class="col mb-4">
                                          <div class="form-outline">
                                            
                                              <input type="password" id="form1Example2" class="form-control" name="confirm_password" value="{{old('confirm_password')}}" required/>
                                              <label class="form-label" for="form1Example2">Confirm Password  </label>
                                          </div>
                                          <span class="text-danger">@error('confirm_password'){{$message}} @enderror</span>
                                      </div>
                                      <!-- Submit button -->
                                      <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
@endsection