@extends('layouts.master')

@section('content')
<main class="container">
    <div class="row">
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
								<span class="card-title"><p>{{ $post->title }}</p> @if($post->category) <em>( <a href="/category/{{ $post->category->name }}">{{ $post->category->name }}</a> )</em> @endif </span>
								@if(count($post->tags) > 0)
								<span class="card-title blog-post-full-cat right grey darken-4">
									@foreach($post->tags as $tag)
									<a href="/tags/{{ $tag->name }}">#{{ $tag->name }}</a> 
									@endforeach
								</span>
								@endif
							</div>
							<div class="card-content">
								<div class="col s12 m12 l12">
									<p class="flow-text">{{ $post->getResumed() }}</p>
								</div>
								<div class="col s12 m12 l12">
									<div class="chip right">
										<i class="material-icons time">access_time</i>
										{{ $post->published_at->format('d/m/Y') }}
									</div>
								</div>
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
	</div>
</main>
@endsection