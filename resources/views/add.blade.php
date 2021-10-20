@extends('master')
@section('title', 'Add Article')

@section('main')
<div class="col-md-8 col-sm-12 bg-white p4">
	<form method="POST" action="/add_process">
		@csrf
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" name="title" placeholder="Insert Title">
		</div>
		<div class="form-group">
			<label for="body">Article Content</label>
			<textarea name="description" id="body-text" rows="15" class="form-control"></textarea>
		</div>
</div>
@endsection

@section('sidebar')
<div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important">
	<div class="form-group">
		<label for="upload">Upload</label>
		<input type="submit" class="form-control btn btn-primary" value="Upload">
	</div>
</div>
</form>
@endsection