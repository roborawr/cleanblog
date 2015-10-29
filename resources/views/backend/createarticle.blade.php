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
    <h1 class="page-header">Create Article</h1>
</div>

<div class="col-md-12">
  <form action="{{config('app.url')}}/backend/create-article" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <textarea name="editor1" rows="10" cols="80">
        
      </textarea>

      <button class="btn btn-info" type="submit">Submit</button>
  </form>
</div>


@endsection()

