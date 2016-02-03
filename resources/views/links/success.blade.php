@extends('layouts.master')

@section('content')

<h1>Bravo !</h1>

<p>
	<a class="btn waves-effect waves-light block-center light-blue darken-3"
		href="{{ action('LinksController@show', ['id' => $link->id]) }}">
		{{ route('link.show', $link) }}
	</a>
</p>

@endsection