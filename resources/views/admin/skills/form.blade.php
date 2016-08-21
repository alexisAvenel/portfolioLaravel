<?php
if($skill->id) {
    $options = [
        'method' => 'put',
        'url' => action('Admin\SkillsController@update', $skill)
    ];
} else {
    $options = [
        'method' => 'post',
        'url' => action('Admin\SkillsController@store')
    ];
}

$options['class'] = 'col s12 skillForm';
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

{!! Form::model($skill, $options) !!}

    <div class="row">
        <div class="input-field col s12">
        {!! Form::label('name', 'Nom') !!}
        {!! Form::text('name') !!}
        </div>

        <div class="input-field col s12">
        {!! Form::label('value', 'Valeur en %') !!}
        {!! Form::input('number', 'value', null, ['step' => '0.01']) !!}
        </div>

        <div class="input-field col s12">
        {!! Form::label('description', 'Description de la compétence') !!}
        {!! Form::textarea('description', null, ['class' => 'materialize-textarea', 'length' => '100']) !!}
        </div>

        <div class="row">
            <div class="col s12">
                <button class="btn waves-effect waves-light block-center light-blue darken-3" type="submit">Valider</button>
            </div>
        </div>
    </div>

{!! Form::close() !!}