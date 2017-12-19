@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Show Domains</h1>
				<p>
					Server: {{$server->username}} <br>
					Provider: {{$provider->name}} <br>
				</p>
				<p>
					Domain: {{$domain->domain}} <br>
					Status: {{$domain->status}} <br>
				</p>

				<button class="btn btn-default"><a href="{{ route('domain.edit', $domain->id) }}">Edit</a></button>

				<form action="{{ route('domain.destroy', $domain->id) }}" method="POST">
					<input type="hidden" name="_method" value="delete">

					<button class="btn btn-danger">Delete</button>

				</form>

			</div>
		</div>
	</div>
@stop