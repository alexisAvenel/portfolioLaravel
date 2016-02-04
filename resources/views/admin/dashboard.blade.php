@extends('layouts.master-admin')

@section('content')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <h1 class="header center-on-small-only">Materialize</h1>
        <div class="row center">
        <h4 class="header col s12 light center">Un framework front-end moderne basé sur le Material Design</h4>
        </div>
        <div class="row center">
        	<a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light">Démarrer</a>
        </div>
        <div class="row center"><a class="red-text text-lighten-4" href="https://github.com/Dogfalo/materialize">alpha release v0.97.5</a></div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <br>
                <img id="responsive-img" src="<?php echo asset('images/background1.jpg'); ?>">
            </div>
        </div>
        <div class="row">
            <h3 class="col s12 light center header">Materialize simplifie la vie des développeurs et de leurs utilisateurs.</h3>
        </div>
    </div>
</div>
@endsection