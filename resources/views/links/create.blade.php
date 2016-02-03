@extends('layouts.master')

@section('content')

<h1>Raccourcir un nouveau lien</h1>


<form method="post" action="{{ route('link.store') }}">
	{!! csrf_field() !!}
	<label for="url">Lien à raccourcir</label>
	<input type="text" name="url" id="url" placeholder="http://....">

    <button class="btn waves-effect waves-light block-center light-blue darken-3" type="submit">Raccourcir</button>
</form>

@endsection