@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Projects Index</h1>
				@if ( isset($projects) && !$projects->isEmpty() )
					<table class="table table-striped">
						<tbody>
							<thead>
								@if( Auth::user()->company_id == 1 )
									<th></th>
								@else
								@endif
								<th><p>Project</p></th>
								<th><p>Type</p></th>
								<th><p>Status</p></th>
							</thead>
							@foreach ($projects as $project)
								@if ( $project->hidden != 1 )
									@if ( $project->status == 'on hold' || $project->status == 'stalled' )
										<tr class="parked">
									@elseif( $project->status == 'cancelled' )
										<tr class="danger">
									@elseif( $project->status == 'complete' )
										<tr class="complete">
									@else
										<tr>
									@endif
									@if( Auth::user()->company_id == 1 )
										<td>
											<a href="{{ route('project.edit', $project->id) }}"><button class="btn editbtn">Edit</button></a>
										</td>
									@else
									@endif
										
										<td>
											<p><a href="{{ route('project.show', $project->id) }}">{{ucfirst($project->name)}}</a></p>
										</td>
										<td>
											<p>{{ucfirst($project->type)}}</p>
										</td>
										<td>
											<p>{{$project->status}}</p>
										</td>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				@else
					<p>No projects were found for your company.</p>
				@endif
			</div>
		</div>
	</div>
@stop