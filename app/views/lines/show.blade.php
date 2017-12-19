@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Show Line</h1>
				@if ( isset($line) )
					<p>
						{{$line->description}} <br>
						Type: {{$line->type}}
					</p>
					<p>
						Project: {{$project->name}} <br>
						Price: {{$line->price}} <br>
						Hours: {{$line->hours}}
					</p>

					@if ( Auth::user()->company_id == 1 )
						<button class="btn btn-default"><a href="{{ route('line.edit', $line->id) }}">Edit</a></button>

						<form action="{{ route('line.destroy', $line->id) }}" method="POST">

							<input type="hidden" name="_method" value="delete">

							<button class="btn btn-danger">Delete</button>

						</form>
					@endif

				@endif
			</div>
		</div>
	</div>
@stop