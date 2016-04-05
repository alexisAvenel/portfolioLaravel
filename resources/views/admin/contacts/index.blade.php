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
	    	@foreach ($contacts as $contact)
			<li class="collection-item avatar contact-field" data-id="{{$contact->id}}">
				<i class="material-icons circle @if(!empty($contact->email)) @if($contact->answered == 1) green @else red @endif @endif">email</i>
				<span class="title"><strong>Message de : </strong>{{ $contact->name }}</span>
				<p class="blockquote"><strong>Son message : </strong><br/>
					{{ $contact->message }}
				</p>
				@if(!empty($contact->email) && $contact->answered == 0)
				<a href="{{ url('admin/contacts/send', [$contact->id]) }}" class="secondary-content"><i class="material-icons">send</i></a>
				@endif
			</li>
	    	@endforeach
		</ul>

    </div>

	@if($contacts->lastPage() != 1)
	<div class="row">
		<div class="col s12">
			<div class="center">
				<ul class="pagination">
					<li class="@if($contacts->currentPage() == 1) disabled @else waves-effect @endif"><a href="{{$contacts->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a></li>
					@for($i=1; $i<$contacts->total(); $i++)
					<li class="@if($i == $contacts->currentPage()) active amber @endif"><a href="{{$contacts->url($i)}}">{{ $i }}</a></li>
					@endfor
					<li class="@if($contacts->currentPage() == $contacts->lastPage()) disabled @else waves-effect @endif"><a href="{{$contacts->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a></li>
				</ul>
			</div>
		</div>
	</div>
	@endif

	{!! Form::token() !!}
</div>

@extends('admin.modals.modal-contact')

@endsection