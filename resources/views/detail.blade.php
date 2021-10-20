@extends('master')

@section('title')
{{ $article -> title }}
@endsection

@section('main')
<div class="col-md-7 col-sm-12 mb-5 bg-white p-0">
	<img src="https://picsum.photos/seed/{{ $article -> id }}/540/270" alt="header-photos" class="w-100">
	<h2 class="text-center mt-5">{{ $article -> title }}</h2>
	<p class="m-3">{{ $article -> description }}</p>
</div>
@endsection

@section('sidebar')
<div class="col-md-4 offset-md-1 col-sm-12 bg-white p-4 h-100">
	<a href="/" class="btn btn-info w-100">Go Back</a>
</div>
@endsection