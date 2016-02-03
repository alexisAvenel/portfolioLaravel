@extends('layouts.master')

@section('content')

	@foreach($posts as $post)

		<h1>{{ $post->title }}</h1>
		@if($post->category)
		<p><em>{{ $post->category->name }}</em></p>
		@endif
		<p>{{ $post->content }}</p>

		<p><a class="btn waves-effect waves-light block-center light-blue darken-3" href="{{ route('news.edit', $post) }}">Editer</a></p>

	@endforeach

@endsection