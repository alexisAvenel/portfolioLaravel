@extends('layouts.master-admin')

@section('content')

<div class="section no-pad-bot amber" id="index-banner">
    <div class="container">
        <h1 class="header center-on-small-only">Édition d'un article</h1>
        <div class="row center"></div>
    </div>
</div>

<div class="section">
    <div class="container">
		
		@include('admin.posts.form')

    </div>
</div>

@endsection