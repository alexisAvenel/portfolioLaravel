@extends('layouts.master-admin')

@section('content')
<div class="section no-pad-bot amber" id="index-banner">
    <div class="container">
        <h1 class="header center-on-small-only">Dashboard</h1>
        <div class="row center"></div>
    </div>
</div>

<div id="dashboard" class="section">
    <div class="container">
        <div class="row">
			<div id="card-stats">
			    <div class="row">
			        <div class="col s12 m6 l6">
			            <div class="card">
			                <div class="card-content green white-text">
			                    <p class="card-stats-title"><i class="material-icons">email</i> Derniers messages de contact</p>
			                    <h4 class="card-stats-number"></h4>
			                    <p class="card-stats-compare"></p>
			                </div>
			                <div id="contact-collection" class="card-action green darken-2 black-text">
			                    @foreach($contacts as $contact)
			                    	<p class="contact-field" data-id="{{$contact->id}}"><b>{{ $contact->date->format('d/m/Y') }}</b> | <i class="truncate">{{ $contact->message }}</i></p>
			                    @endforeach
			                </div>
			            </div>
			        </div>
			        <div class="col s12 m6 l6">
			            <div class="card">
			                <div class="card-content pink lighten-1 white-text">
			                    <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i> New Invoice</p>
			                    <h4 class="card-stats-number">1806</h4>
			                    <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i> 3% <span class="deep-purple-text text-lighten-5">from last month</span>
			                    </p>
			                </div>
			                <div class="card-action  pink darken-2">
			                    <div id="invoice-line" class="center-align"><canvas width="280" height="25" style="display: inline-block; width: 280px; height: 25px; vertical-align: top;"></canvas></div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
        </div>
    </div>
	{!! Form::token() !!}
</div>

<!-- Modal Structure -->
<div id="modal-dashboard" class="modal modal-fixed-footer">
	<div class="modal-content">
		<h4></h4>
		<blockquote></blockquote>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
		<a href="#!" class="waves-effect waves-green btn-flat amber hide">Répondre</a>
	</div>
</div>
@endsection