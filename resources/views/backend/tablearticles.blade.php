@extends('layouts.layoutbackend')

@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Articles Table</h1>
</div>
<div class="col-md-12">
	<table class="table table-striped table-hover table-bordered">
		<thead >
			<th>Name</th>
			<th>Email</th>
			<th>role</th>
			<th colspan="2">Action</th>
		</thead>
		<tbody>
			
			@forelse ($articles_record as $user)
			<tr>
				<td>{{$articles_record->name}}</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			@empty
			<tr>
				<td class="info" colspan="6"> <h2 class="text-center">No Data</h2> </td>
			</tr>
			@endforelse
			
		</tbody>
	</table>
</div>
@endsection()

