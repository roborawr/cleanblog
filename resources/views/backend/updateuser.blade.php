@extends('layouts.layoutbackend')

@section('content')

<div class="col-lg-12">
    <h1 class="page-header">Update User Data</h1>
</div>

<div class="col-md-12">
  <form action="{{config('app.url')}}/backend/update-user/{{$record->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-body form-horizontal">
            <div class="form-group">
              <div class="col-sm-12" style="margin-bottom: 0.5em">
                <img src="{{ isset($record->profpic) ? config('app.url').'/assets/img/profpic/'.$record->profpic : 'http://placehold.it/240x240' }}" class="img-responsive img-thumbnail center-block">
              </div>
              <label for="inputphoto" class="col-sm-3 control-label">Select Image</label>
                <div class="col-sm-9">
                    <input type="file" name="photo">
                    <p class="help-block">Select image type png or jpg. Max file size:1mb</p>
                    @if (is_object($errors) && $errors->first('photo'))
                      <p class="bg-danger">&nbsp;{{ $errors->first('photo') }}</p>
                    @endif
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-body form-horizontal">
                  <div class="form-group">
                      <label for="Name" class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control"  name="name" value="{{isset($record->name) ? $record->name : old('name') }}">
                          <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                          @if (is_object($errors) && $errors->first('name'))
                            <p class="bg-danger">&nbsp;{{ $errors->first('name') }}</p>
                          @endif
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="Email" class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="email" value="{{isset($record->email) ? $record->email : old('email') }}" readonly>
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
                  </div>
                  @endcan
                  <div class="col-sm-12">
                    <p class="help-block">You can leave <strong>Password</strong> and <strong>Password Confirmation</strong> form blank if you dont want to change your password.</p>
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
                          <input type="password" class="form-control" name="password_confirmation">
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
      </div> <!-- / panel preview -->
    </div> <!-- /col-sm-6 -->
  </form>  
</div>
@endsection()

