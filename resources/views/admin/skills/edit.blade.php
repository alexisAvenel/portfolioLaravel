@extends('layouts.master-admin')

@section('content')

<div class="section no-pad-bot amber" id="index-banner">
    <div class="container">
        <h1 class="header center-on-small-only">Édition d'une compétence</h1>
        <div class="row center"></div>
    </div>
</div>

<div class="section">
    <div class="container">
    	<div class="row">
			<div class="col s12 m8 l6">
				@include('admin.skills.form')
			</div>
    	</div>
    </div>
</div>

@endsection