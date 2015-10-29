@extends('layouts.layoutbackend')

@section('content')
<div class="col-lg-12">
    @include('layouts.flash_message')
</div>
<div class="col-lg-12">

    <h1 class="page-header">Users Table
    <a href="{{config('app.url')}}/backend/create-user">
    <span class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add User</span></a></h1>

</div>
<div class="col-md-12">
	<table class="table table-striped table-hover table-bordered">
		<thead >
			<th width="5%">No.</th>
			<th>Name</th>
			<th>Email</th>
			<th>role</th>
			<th colspan="2" width="5%">Action</th>
		</thead>
		<tbody>
			<?php $i=1 ?>
			@forelse ($users_record as $user)
			<tr>
				<td>{{$i}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->role}}</td>
				@if(Request::user()->role === 'admin')
					<td><a href="{{config('app.url')}}/backend/update-user/{{$user->id}}" style="text-decoration:none"><button class="btn btn-warning btn-sm btn-block">Update</button></a></td>
					<td><button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#delModal">Delete</button></td>
				@else
					<td><a href="{{config('app.url')}}/backend/update-user/{{$user->id}}" style="text-decoration:none"><button class="btn btn-warning btn-sm btn-block">Update</button></a></td>
				@endif
			</tr>
			<?php $i++ ?>
			@empty
			<tr>
				<td class="info" colspan="6"> <h2 class="text-center">No Data</h2> </td>
			</tr>
			@endforelse
			
		</tbody>
	</table>
</div>

<!-- modal -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <div class="modal-body">
        Are you sure want to delete ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="{{config('app.url')}}/backend/delete-user/{{$user->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->
@endsection()

