@extends('layouts.master')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Contact</h1></div>

                <div class="panel-body">
					{!! Form::open(['url' => action('ContactController@sendMail'), 'method' => 'post']) !!}
						
						<div class="row">
							<div class="input-field col s6">
							{!! Form::label('name', 'Votre nom *') !!}
							{!! Form::text('name', null, ['required' => 'required']) !!}
							</div>

							<div class="input-field col s6">
							{!! Form::label('email', 'Votre email') !!}
							{!! Form::email('email') !!}
							</div>

							<div class="input-field col s12">
							{!! Form::label('message', 'Votre message *') !!}
							{!! Form::textarea('message', null, ['class' => 'materialize-textarea', 'required' => 'required']) !!}
							</div>
							
							<div class="input-field col s12">
								<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
							</div>

							<div class="row">
								<div class="col s12">
									<button class="btn waves-effect waves-light block-center light-blue darken-3" type="submit">Valider</button>
								</div>
							</div>
						</div>


					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection