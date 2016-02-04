@extends('layouts.master')

@section('home-banner')
<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h1 class="header center teal-text text-lighten-2">Parallax Template</h1>
            <div class="row center">
                <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
            </div>
            <div class="row center">
                <a href="#" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
            </div>
            <br><br>

        </div>
    </div>
    <div class="parallax"><img src="<?php echo asset('images/background1.jpg'); ?>"></div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Welcome</h1></div>

                <div class="panel-body">
                    <legend>Your Application's Landing Page.</legend>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
