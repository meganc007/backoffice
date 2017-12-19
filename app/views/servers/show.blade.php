@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Server Show</h1>
				@if ( isset($server) )
					
					@if ( isset($company) )
						<p>
							Company: {{$company->name}}
						</p>
					@endif

					@if ( isset($provider) )
						<p>
							Provider: {{$provider->name}}
						</p>
					@endif

					<p>
						{{$server->username}} <br>
						{{$server->url}} <br>
						{{$server->password}}</p>
					<p>
						Status: {{$server->status}}
					</p>

					<button class="btn btn-default"><a href="{{ route('server.edit', $server->id) }}">Edit</a></button>

					<form action="{{ route('server.destroy', $server->id) }}" method="POST">
						<input type="hidden" name="_method" value="delete">
						<button class="btn btn-danger">Delete</button>
					</form>
				@endif
			</div>
		</div>
	</div>
@stop