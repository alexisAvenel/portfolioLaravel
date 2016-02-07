@extends('layouts.master')

@section('content')

<div id="blog-post-full">

	@foreach($posts as $post)

	<div class="card medium">
		<div class="card-image">
			@if($post->image)
				<img src="<?php echo asset('images/gallery/'.$post['image']); ?>" alt="sample">
			@else
				<img src="<?php echo asset('images/gallery/default.jpg'); ?>" alt="sample">
			@endif
			<span class="card-title">{{ $post->title }} @if($post->category) ( <em> {{ $post->category->name }} </em> ) @endif </span>
			@if(count($post->tags) > 0)
			<span class="card-title blog-post-full-cat right amber">
				@foreach($post->tags as $tag)
				<a href="/tags/{{ $tag->name }}">#{{ $tag->name }}</a> 
				@endforeach
			</span>
			@endif
		</div>
		<div class="card-content">
			<p class="ultra-small">{{ $post->published_at->format('d-m-Y') }}</p>
			<p>{{ $post->getResumed() }}</p>

		</div>
		<div class="card-action">
			Rédigé par <a href="#">Alexis Avenel</a>
			<a href="#" class="right">Lire la suite &gt;</a>
		</div>
	</div>

	@endforeach

</div>

@endsection