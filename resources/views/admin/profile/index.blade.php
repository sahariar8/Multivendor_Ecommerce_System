@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-7 mx-auto">
            <div class="card">
              <form action="{{ route('admin.profile.update') }}" method="post" class="needs-validation" enctype="multipart/form-data" >
                @csrf
                <div class="card-header">
                  <h4>Admin Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">                               
                      <div class="form-group col-md-12 col-12">
                        <div class="mb-3">
                            <img src="{{ asset(Auth::user()->image) }}" height="200px" width="200px" alt="">
                        </div>
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                      </div>
                    </div>
                    <div class="row">                               
                        <div class="form-group col-md-6 col-12">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required="">
                          <div class="invalid-feedback">
                            Please fill in the first name
                          </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email"  value="{{ Auth::user()->email }}" required="">
                          <div class="invalid-feedback">
                            Please fill in the email
                          </div>
                        </div>
                      </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-7 mx-auto">
            <div class="card">
              <form action="{{ route('admin.password.update') }}" method="post" class="needs-validation" " >
                @csrf
                <div class="card-header">
                  <h4>Password Update</h4>
                </div>
                <div class="card-body">
                    <div class="row">                               
                      <div class="form-group col-md-12 col-12">
                        <label>Current Password</label>
                        <input type="password" name="current_password" class="form-control">
                        @if ($errors->has('current_password'))
                            <span class="text-danger">
                               <strong> {{ $errors->first('current_password') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="row">                               
                      <div class="form-group col-md-12 col-12">
                        <label>New Password</label>
                        <input type="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                            <span class="text-danger">
                               <strong> {{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="row">                               
                      <div class="form-group col-md-12 col-12">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                      </div>
                    </div>
                   
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection