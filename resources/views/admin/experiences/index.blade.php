@extends('layouts.master-admin')

@section('content')

<div class="section no-pad-bot amber" id="index-banner">
    <div class="container">
        <h1 class="header center-on-small-only">Manager des Expériences</h1>
        <div class="row center"></div>
    </div>
</div>

<div class="section">
    <div class="container">

    	<div class="row">
    		<div class="col s12">
				<a href="{{ route('admin.experiences.create') }}" class="waves-effect waves-light btn amber">
					<i class="material-icons right">add_circle_outline</i>Créer une expérience
				</a>
    		</div>
    	</div>

		<table id="experiences" class="centered responsive-table striped manage-table">
			<thead>
				<tr>
					<th data-field="start_date">Date de début</th>
					<th data-field="end_date">Date de fin</th>
					<th data-field="job">Job</th>
					<th data-field="society">Société</th>
					<th data-field="actions">Actions</th>
				</tr>
			</thead>

			<tbody>

				@foreach($experiences as $experience)
				<tr data-id="{{ $experience->id }}">
					<td>{{ $experience->start_date->format('d/m/Y') }}</td>
					<td>{{ $experience->end_date->format('d/m/Y') }}</td>
					<td>{{ $experience->job }}</td>
					<td>{{ $experience->society }}</td>
					<td>
						<div class="fixed-action-btn horizontal click-to-toggle">
							<a class="btn-floating btn-large red">
								<i class="large mdi-navigation-menu"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('admin.experiences.edit', $experience) }}" class="btn-floating waves-effect waves-light amber">
										<i class="material-icons">content_cut</i>
									</a>
								</li>
								<li class="experience-delete">
									<a href="{{ route('admin.experiences.destroy', $experience) }}" class="btn-floating waves-effect waves-light red">
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
<div id="modal-experience-confirm" class="modal bottom-sheet">
	<div class="modal-content">
		<h4 class="modal-title"></h4>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action waves-effect waves-green btn-flat" data-confirm="yes">Oui</a>
		<a href="#!" class="modal-action waves-effect waves-green btn-flat" data-confirm="no">Non</a>
	</div>
</div>

@endsection