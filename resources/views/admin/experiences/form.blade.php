<?php
if($experience->id) {
	$options = [
		'method' => 'put',
		'url' => action('Admin\ExperiencesController@update', $experience)
	];
} else {
	$options = [
		'method' => 'post',
		'url' => action('Admin\ExperiencesController@store')
	];
}

$options['class'] = 'col s12 experienceForm';
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

{!! Form::model($experience, $options) !!}

	<div class="row">
		<div class="input-field col s12">
		{!! Form::label('start_date', 'Date de début') !!}
		{!! Form::date('start_date', null, ['class' => 'datepicker']) !!}
		</div>

		<div class="input-field col s12">
		{!! Form::label('end_date', 'Date de fin') !!}
		{!! Form::date('end_date', null, ['class' => 'datepicker']) !!}
		</div>

		<div class="input-field col s12">
		{!! Form::label('slug', ' ') !!}
		{!! Form::text('slug', null, ['disabled' => true]) !!}
		</div>

		<div class="input-field col s12">
		{!! Form::label('resumed', 'Résumé de l\'article') !!}
		{!! Form::textarea('resumed', null, ['class' => 'materialize-textarea', 'length' => '100']) !!}
		</div>

		<div class="row">
			<div class="col s12">
				<button class="btn waves-effect waves-light block-center light-blue darken-3" type="submit">Valider</button>
			</div>
		</div>
	</div>


{!! Form::close() !!}