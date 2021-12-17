@extends('layouts.app')

@section('title')
{{ $article -> title }}
@endsection

@section('main')
<div class="col-md-8 col-sm-12">
	<div class="mb-5 bg-white p-0">
		<img src="https://picsum.photos/seed/{{ $article -> id }}/540/270" alt="header-photos" class="w-100">
		<div class="my-3">
			<h2 class="text-center m-0">{{ $article -> title }}</h2>
			<p class="text-center">by {{ $article -> user -> name }}</p>
		</div>
		<p class="p-3">{{ $article -> description }}</p>
	</div>
</div>
@endsection

@section('sidebar')
<div class="col-md-4 col-sm-12 ">
	<div class="bg-white p-4">
		<a href="/" class="btn btn-primary w-100">Go Back</a>
	</div>
</div>
@endsection