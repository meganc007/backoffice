@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Show Provider</h1>
				@if ( isset($provider) )
					<p>
						{{$provider->name}} <br>
						Type: {{ucfirst($provider->type)}}
					</p>

					<button class="btn btn-default"><a href="{{ route('provider.edit', $provider->id) }}">Edit</a></button>

					<form action="{{ route('provider.destroy', $provider->id) }}" method="POST">
						<input type="hidden" name="_method" value="delete">
						
						<button class="btn btn-danger">Delete</button>
					</form>

				@endif
			</div>
		</div>
	</div>
@stop