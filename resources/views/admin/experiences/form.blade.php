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

{!! Form::model($experience, $options) !!}

	<div class="row">
		<div class="input-field col s12">
		{!! Form::label('start_date', 'Date de début') !!}
		{!! Form::date('start_date', null, ['class' => 'datepicker', 'required']) !!}
		</div>

		<div class="input-field col s12">
		{!! Form::label('end_date', 'Date de fin') !!}
		{!! Form::date('end_date', null, ['class' => 'datepicker', 'required']) !!}
		</div>

		<div class="input-field col s12">
		{!! Form::label('job', 'Job/étude') !!}
		{!! Form::text('job', null, ['required']) !!}
		</div>

		<div class="input-field col s12">
		{!! Form::label('society', 'Société/école') !!}
		{!! Form::text('society', null, ['required']) !!}
		</div>

		<div class="input-field col s12">
		{!! Form::label('link', 'Lien') !!}
		{!! Form::text('link', null, ['required']) !!}
		</div>

		<div class="input-field col s12">
		{!! Form::label('description', 'Description') !!}
		{!! Form::textarea('description', null, ['class' => 'materialize-textarea', 'length' => '100']) !!}
		</div>

		<div class="row">
			<div class="col s12">
				<button class="btn waves-effect waves-light block-center light-blue darken-3" type="submit">Valider</button>
			</div>
		</div>
	</div>


{!! Form::close() !!}