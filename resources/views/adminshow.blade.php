@extends('layouts.app')

@section('header')
<h2 class="text-center">Article List</h2>
@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">x</button>
	<strong>{{ $message }}</strong>
</div>
@endif
@endsection

@section('title', 'Admin Page')

@section('main')
<div class="col-12 bg-white p-4">
	<a href="/add" class="btn btn-primary mb-3">Add Article</a>
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
		<thead>
			<tr>
				<th scope="col">No.</th>
				<th scope="col">Title</th>
				<th scope="col">Description</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($articles as $i => $article)
			<tr>
				<td scope="row">{{ ++$i }}</td>
				<td>{{ $article -> title }}</td>
				<td>{{ $article -> description }}</td>
				<td>
					<a href="/edit/{{ $article -> id }}" class="btn btn-success">Edit</a>
					<a href="/delete/{{ $article -> id }}" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>
@endsection