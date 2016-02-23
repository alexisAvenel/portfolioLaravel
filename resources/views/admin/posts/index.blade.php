@extends('layouts.master-admin')

@section('content')

<div class="section no-pad-bot amber" id="index-banner">
    <div class="container">
        <h1 class="header center-on-small-only">Manager des News</h1>
        <div class="row center"></div>
    </div>
</div>

<div class="section">
    <div class="container">

    	<div class="row">
    		<div class="col s12">
				<a href="{{ route('admin.news.create') }}" class="waves-effect waves-light btn amber">
					<i class="material-icons right">add_circle_outline</i>Créer un article
				</a>
    		</div>
    	</div>

		<table id="posts" class="centered responsive-table striped manage-table">
			<thead>
				<tr>
					<th data-field="title">Titre</th>
					<th data-field="created">Créé le</th>
					<th data-field="updated">Modifié le</th>
					<th data-field="published">Publié le</th>
					<th data-field="category">Catégorie</th>
					<th data-field="online">En ligne ?</th>
					<th data-field="actions">Actions</th>
				</tr>
			</thead>

			<tbody>
				
				@foreach($posts as $post)
				<tr data-id="{{ $post->id }}">
					<td>{{ $post->title }}</td>
					<td>{{ $post->created_at->format('d-m-Y') }}</td>
					<td>{{ $post->updated_at->format('d-m-Y') }}</td>
					<td>{{ $post->published_at->format('d-m-Y') }}</td>
					<td>@if($post->category) {{ $post->category->name }} @else NULL @endif</td>
					<td class="post-online" data-online="{{ $post->online }}">@if($post->online) <i class="small material-icons green-text">visibility</i> @else <i class="small material-icons red-text">visibility_off</i> @endif</td>
					<td>
						<!--<a class="btn waves-effect waves-light block-center light-blue darken-3" href="{{ route('admin.news.edit', $post) }}">Editer</a>-->
						<div class="fixed-action-btn horizontal click-to-toggle">
							<a class="btn-floating btn-large red">
								<i class="large mdi-navigation-menu"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('admin.news.edit', $post) }}" class="btn-floating waves-effect waves-light amber">
										<i class="material-icons">content_cut</i>
									</a>
								</li>
								<li>
									<a href="{{ route('admin.news.destroy', $post) }}" class="btn-floating waves-effect waves-light red">
										<i class="material-icons">clear</i>
									</a>
								</li>
							</ul>
						</div>
					</td>
					{!! Form::token() !!}
				</tr>
				@endforeach
				
			</tbody>
		</table>
    </div>
</div>

<!-- Modal Structure -->
<div id="modal-post-confirm" class="modal bottom-sheet">
	<div class="modal-content">
		<h4 class="modal-title"></h4>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action waves-effect waves-green btn-flat" data-confirm="yes">Oui</a>
		<a href="#!" class="modal-action waves-effect waves-green btn-flat" data-confirm="no">Non</a>
	</div>
</div>

@endsection