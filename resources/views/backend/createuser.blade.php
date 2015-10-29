@extends('layouts.layoutbackend')

@section('content')
@if (count($errors) > 0)
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
      </ul>
  </div>
@endif
<div class="col-lg-12">
    <h1 class="page-header">User Data</h1>
</div>

<div class="col-md-12">
  <form action="{{config('app.url')}}/backend/create-user" class="form-horizontal" method="post">
      {!! csrf_field() !!}
      <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-body form-horizontal payment-form">
                  <div class="form-group">
                      <label for="Name" class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control"  name="name" value="{{ old('name') }}">
                          <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                          @if (is_object($errors) && $errors->first('name'))
                            <p class="bg-danger">&nbsp;{{ $errors->first('name') }}</p>
                          @endif
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="Email" class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="email" value="{{old('email') }}">
                          <p class="help-block">Please provide your E-mail</p>
                          @if (is_object($errors) && $errors->first('email'))
                            <p class="bg-danger">&nbsp;{{ $errors->first('email') }}</p>
                          @endif
                      </div>
                  </div> 
                  @can('define-role')
                  <div class="form-group">
                      <label for="User Role" class="col-sm-3 control-label">User Role</label>
                      <div class="col-sm-9">
                          <label class="radio-inline"><input type="radio" name="role" value="admin">Admin</label>
                          <label class="radio-inline"><input type="radio" name="role" value="user">User</label>
                          <p class="help-block">Please determine what is user role</p>
                          @if (is_object($errors) && $errors->first('role'))
                            <p class="bg-danger">&nbsp;{{ $errors->first('role', 'Choose one') }}</p>
                          @endif
                      </div>
                  @endcan
                  </div> 
                  <div class="form-group">
                      <label for="Password" class="col-sm-3 control-label">Password</label>
                      <div class="col-sm-9">
                          <input type="password" class="form-control" name="password" value="">
                          <p class="help-block">Password between 4-8 character</p>
                          @if (is_object($errors) && $errors->first('password'))
                            <p class="bg-danger">&nbsp;{{ $errors->first('password') }}</p>
                          @endif
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="Password Confirmation" class="col-sm-3 control-label">Password Confirmation</label>
                      <div class="col-sm-9">
                          <input type="password" class="form-control"  name="password_confirmation">
                          <p class="help-block">Password Confirmation must be same with Password Form</p>
                          @if (is_object($errors) && $errors->first('password_confirmation'))
                            <p class="bg-danger">&nbsp;{{ $errors->first('password_confirmation') }}</p>
                          @endif  
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-12">
                        <button class="btn btn-success pull-right">Submit</button>
                        
                      </div>
                  </div>
                  
              </div>
          </div>            
      </div> <!-- / panel preview -->
  </form>  
</div>
@endsection()

