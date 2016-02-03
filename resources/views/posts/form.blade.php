<?php
if($post->id) {
	$options = [
		'method' => 'put',
		'url' => action('PostsController@update', $post)
	];
} else {
	$options = [
		'method' => 'post',
		'url' => action('PostsController@store')
	];
}
$postList = $post->tags->lists('id');
$options['class'] = 'col s12';
?>

@if($errors->any())
	<ul>
		@foreach($errors as $type => $error)
			@foreach($error as $message)
				<li> {{ $type }} : {{ $message }} </li>
			@endforeach
		@endforeach
	</ul>
@endif

{!! Form::model($post, $options) !!}
	<div class="row">
		<div class="input-field col s12">
		{!! Form::label('title', 'Titre') !!}
		{!! Form::text('title') !!}
		</div>

		<div class="input-field col s12">
		{!! Form::label('slug', 'Slug') !!}
		{!! Form::text('slug', null, ['disabled' => true]) !!}
		</div>

		<div class="input-field col s12">
		{!! Form::select('category_id', $categories) !!}
		{!! Form::label('category_id', 'Catégorie') !!}
		</div>

		<div class="input-field col s12">
			<select name="tags[]" multiple>
				<option value="" disabled selected>Choisir les tags</option>
				@foreach($tags as $tag_id => $tag_name)
					@foreach($postList as $postTag)
						<?php
						switch ($tag_id) {
							case $postTag:
								$selected[$tag_id] = 'selected';
								break;
						}
						?>
					@endforeach
					<option value="{{ $tag_id }}" <?php if(isset($selected[$tag_id])): echo $selected[$tag_id]; endif; ?> >
						{{ $tag_name }}
					</option>

				@endforeach
			</select>
			{!! Form::label('tags[]', 'Tags') !!}
		</div>

		<div class="input-field col s12">
		{!! Form::label('content', 'Contenu') !!}
		{!! Form::textarea('content', null, ['class' => 'materialize-textarea']) !!}
		</div>

		<div class="input-field col s12">
		{!! Form::hidden('online', 0) !!}
		{!! Form::checkbox('online', 1, null, ['id' => 'online']) !!}
		{!! Form::label('online', 'En ligne ?') !!}
		</div>

		<button class="btn waves-effect waves-light block-center light-blue darken-3" type="submit">Valider</button>		
	</div>


{!! Form::close() !!}