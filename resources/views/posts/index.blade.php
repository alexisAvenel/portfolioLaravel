@extends('layouts.master')

@section('content')

<div id="blog-post-full">
	<div class="row">
		@if(count($posts))
			@foreach($posts as $post)
			<div class="col s12 m6 l6">
				<div class="card medium">
					<div class="card-image">
						@if($post->image)
							<img src="<?php echo asset('uploads/news/'.$post['slug'].'/'.$post['image']); ?>" alt="sample">
						@else
							<img src="<?php echo asset('images/gallery/default.jpg'); ?>" alt="sample">
						@endif
						<span class="card-title">{{ $post->title }} @if($post->category) ( <em> {{ $post->category->name }} </em> ) @endif </span>
						@if(count($post->tags) > 0)
						<span class="card-title blog-post-full-cat right grey darken-4">
							@foreach($post->tags as $tag)
							<a href="/tags/{{ $tag->name }}">#{{ $tag->name }}</a> 
							@endforeach
						</span>
						@endif
					</div>
					<div class="card-content">
						<div class="chip">
							<i class="material-icons time">access_time</i>
							{{ $post->published_at->format('d/m/Y') }}
						</div>
						<p class="flow-text"><blockquote>{{ $post->getResumed() }}</blockquote>></p>

					</div>
					<div class="card-action">
						Rédigé par <a href="#">Alexis Avenel</a>
						<a href="#" class="right">Lire la suite &gt;</a>
					</div>
				</div>
			</div>
			@endforeach
		@else
			<div class="col s12 m6 l6"><h3>Aucun article en vu !</h3></div>
		@endif
	</div>
</div>

@endsection