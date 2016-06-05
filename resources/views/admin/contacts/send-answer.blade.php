@extends('layouts.master-admin')

@section('content')

<div class="section no-pad-bot amber" id="index-banner">
    <div class="container">
        <h1 class="header center-on-small-only">Manager des Messages</h1>
        <div class="row center"></div>
    </div>
</div>

<div id="section" class="section">
    <div class="container">
		<ul class="collection">
			<li class="collection-item avatar">
				<i class="material-icons circle">email</i>
				<span class="title"><strong>Message de : </strong>{{ $contact->name }}</span>
				<p class="blockquote"><strong>Son message : </strong><br/>
					{{ $contact->message }}
				</p>
			</li>
		</ul>
    </div>

	<div class="row">
		<div class="col s12">
			<div class="center">
					{!! Form::open(['method' => 'post']) !!}
						
						<div class="row">

							<div class="input-field col s12">
							{!! Form::label('message', 'Votre message *') !!}
							{!! Form::textarea('message', null, ['class' => 'materialize-textarea', 'required' => 'required']) !!}
							</div>

						</div>

						<div class="row">
							<div class="col s12">
								<button class="btn waves-effect waves-light block-center light-blue darken-3" type="submit">Répondre</button>
							</div>
						</div>
						
					{!! Form::close() !!}
			</div>
		</div>
	</div>

</div>

@endsection