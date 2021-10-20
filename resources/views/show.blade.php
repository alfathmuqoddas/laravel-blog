@extends('master')

@section('title', 'All Blog')

@section('header')
<div class="text-center">
	<h1>All Blog</h1>
	<a href="/add" class="text-light btn btn-primary">Add New Article</a>
</div>
@endsection

@section('main')
    @foreach ($articles as $article)
    <div class="col-md-4 col-sm-12 mt-4">
        <div class="card">
            <img src="https://picsum.photos/seed/{{ $article->id }}/540/270" class="card-img-top" alt="gambar" >
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <a href="/detail/{{ $article->id }}" class="btn btn-primary">Read</a>
            </div>
        </div>
    </div>
   @endforeach
@endsection