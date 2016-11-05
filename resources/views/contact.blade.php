@extends('layouts.master')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Contact</h1></div>

                <div class="panel-body">

					@if (session('status'))
						<div class="row alert-message">
							<div class="col s12">
							    <div class="chip green accent-4 white-text">
							        {{ session('status') }}
							    </div>
							</div>
						</div>
					@endif

					{!! Form::open(['url' => action('ContactsController@sendMail'), 'method' => 'post']) !!}

						<div class="row">
							<div class="input-field col s6">
							{!! Form::label('name', 'Votre nom *') !!}
							{!! Form::text('name', null, ['required' => 'required']) !!}
							</div>

							<div class="input-field col s6">
							{!! Form::label('email', 'Votre email *') !!}
							{!! Form::email('email', null, ['required' => 'required']) !!}
							</div>

							<div class="input-field col s12">
							{!! Form::label('message', 'Votre message *') !!}
							{!! Form::textarea('message', null, ['class' => 'materialize-textarea', 'required' => 'required']) !!}
							</div>

							<div class="input-field col s12">
								<div class="valign-wrapper">
									<div class="g-recaptcha valign required" data-sitekey="{{ env('RE_CAP_SITE', '6LfuPhwTAAAAAG2oEQDuJNaJRlQKY2rJNntvDfID') }}"></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col s12">
								<button class="btn waves-effect waves-light block-center light-blue darken-3" type="submit">Envoyer</button>
							</div>
						</div>

					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection