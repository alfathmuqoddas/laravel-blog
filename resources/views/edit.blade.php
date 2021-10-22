@extends('layouts.app')

@section('title', 'Edit Article')

@section('heaader')
<div class="mt">
	<h2 class="text-center">Edit Article</h2>
</div>
@endsection

@section('main')
<div class="col-md-8 col-12">
	<div class="bg-white p-4">
		<form method="post" action="/edit_process">
			@csrf
			<input type="hidden" value="{{ $article -> id}}" name="id">
			<div class="form-group">
				<label for="title">Article Title</label>
				<input type="text" class="form-control" value="{{ $article -> title }}" name="title" placeholder="article-title">
			</div>
			<div class="form-group">
				<label for="description">
					Article Content
				</label>
				<textarea class="form-control" name="description" rows="15">
					{{ $article -> description }}
				</textarea>
			</div>
	</div>
</div>
@endsection

@section('sidebar')
<div class="col-md-4 col-12" style="height:120px !important">
	<div class="bg-white p-4">
		<div class="form-group">
			<label for="edit">Edit</label>
			<input type="submit" class="form-control btn btn-primary" value="edit" name="edit">
		</div>
	</div>
</div>
</form>
@endsection