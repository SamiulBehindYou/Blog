@extends('admin.layout')

@section('main')

<div class="row w-100 mx-0 auth-page">
    <div class="col-md-10 col-xl-8 mx-auto">
        <div class="card">
            <div class="row">
<div class="col-md-4 pr-md-0">
  <div class="auth-left-wrapper">
    <img width="100%" height="100%" src="{{ asset('admin/images/auth.jpg') }}" alt="">
  </div>
</div>
<div class="col-md-8 pl-md-0">
  <div class="auth-form-wrapper px-4 py-5">
    <a href="#" class="noble-ui-logo d-block mb-2">ADMIN<span>REGISTER</span></a>
    <h5 class="text-muted font-weight-normal mb-4">Create a free account.</h5>
    <form class="forms-sample" action="{{ route('admin.register') }}" method="POST">
        @csrf
      <div class="form-group">
        <label for="exampleInputUsername1">Username</label>
        <input type="text" class="form-control" name="name" id="exampleInputUsername1" autocomplete="Username" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
      </div>

      <div class="mt-3">
        <button type="submit" class="btn btn-primary text-white mr-2 mb-2 mb-md-0">Sing up</button>
      </div>
    </form>
  </div>
</div>
</div>
        </div>
    </div>
</div>

@endsection
