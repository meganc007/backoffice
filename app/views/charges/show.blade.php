@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Show Charge</h1>
				@if ( isset($charge) )
					<p>
						Line: {{$line->description}} <br>
						User: {{$user->fname}} {{$user->lname}} <br>
						Date: {{ Carbon::parse($charge->created_at)->toDayDateTimeString() }} <br>
						Hours: {{$charge->hours}} hrs
					</p>

					<button class="btn btn-default"><a href="{{ route('charge.edit', $charge->id) }}">Edit</a></button>

					<form action="{{ route('charge.destroy', $charge->id) }}" method="POST">
						
						<input type="hidden" name="_method" value="delete">

						<button class="btn btn-danger">Delete</button>

					</form>

				@endif
			</div>
		</div>
	</div>
@stop