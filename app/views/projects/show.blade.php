@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Project Show</h1>

				@if ( isset($project) )
					<p>
						{{$project->name}} <br>
						Project Manager: {{$user->fname}} {{$user->lname}} <br>
						Type: {{ucfirst($project->type)}} <br>
					</p>
					<p>
						Company: {{$company->name}} <br>
						Domain: {{$domain->domain}} <br>
					</p>
					<p>
						Status: {{ucfirst($project->status)}} <br>
						Status Date: {{Carbon::parse($project->status_date)->toDayDateTimeString()}}
					</p>
					
					<button class="btn btn-default"><a href="{{ route('project.edit', $project->id) }}">Edit</a></button>

					<form action="{{ route('project.destroy', $project->id) }}" method="POST">
													
						<input type="hidden" name="_method" value="delete">

						<button class="btn btn-danger">Delete</button>

					</form>

				@endif

			</div>
		</div>
	</div>
@stop