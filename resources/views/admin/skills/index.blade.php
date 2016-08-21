@extends('layouts.master-admin')

@section('content')

<div class="section no-pad-bot amber" id="index-banner">
    <div class="container">
        <h1 class="header center-on-small-only">Manager des Compétences</h1>
        <div class="row center"></div>
    </div>
</div>

<div class="section">
    <div class="container">

    	<div class="row">
    		<div class="col s12">
				<a href="{{ route('admin.skills.create') }}" class="waves-effect waves-light btn amber">
					<i class="material-icons right">add_circle_outline</i>Créer une compétence
				</a>
    		</div>
    	</div>

		<table id="skills" class="centered responsive-table striped manage-table">
			<thead>
				<tr>
					<th data-field="name">Nom</th>
					<th data-field="value">Valeur</th>
					<th data-field="created">Créée le</th>
					<th data-field="updated">Modifiée le</th>
					<th data-field="actions">Actions</th>
				</tr>
			</thead>

			<tbody>

				@foreach($skills as $skill)
				<tr data-id="{{ $skill->id }}">
					<td>{{ $skill->name }}</td>
					<td>{{ $skill->value }}</td>
					<td>{{ $skill->created_at->format('d/m/Y') }}</td>
					<td>{{ $skill->updated_at->format('d/m/Y') }}</td>
					<td>
						<div class="fixed-action-btn horizontal click-to-toggle">
							<a class="btn-floating btn-large red">
								<i class="large mdi-navigation-menu"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('admin.skills.edit', $skill) }}" class="btn-floating waves-effect waves-light amber">
										<i class="material-icons">content_cut</i>
									</a>
								</li>
								<li class="skill-delete">
									<a href="{{ route('admin.skills.destroy', $skill) }}" class="btn-floating waves-effect waves-light red">
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
<div id="modal-skill-confirm" class="modal bottom-sheet">
	<div class="modal-content">
		<h4 class="modal-title"></h4>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action waves-effect waves-green btn-flat" data-confirm="yes">Oui</a>
		<a href="#!" class="modal-action waves-effect waves-green btn-flat" data-confirm="no">Non</a>
	</div>
</div>

@endsection