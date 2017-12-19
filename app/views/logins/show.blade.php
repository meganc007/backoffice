@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Login Show</h1>
				@if ( isset($login) )
					<p>
						Company: {{$company->name}} <br>
						Server: {{$server->username}} <br>
						Domain: {{$domain->domain}}
					</p>
					<p>
						Username: {{$login->username}} <br>
						Password: {{$login->password}} <br>
					</p>
					<p>
						Login type: {{$login->login_type}} <br>
						URL: {{$login->url}} <br>
						Comments: {{$login->comments}} <br>
					</p>
					
					<button class="btn btn-default"><a href="{{ route('login.edit', $login->id) }}">Edit</a></button>

					<form action="{{ route('login.destroy', $login->id) }}" method="POST">
						<input type="hidden" name="_method" value="delete">
						<button class="btn btn-danger">Delete</button>
					</form>

				@endif
			</div>
		</div>
	</div>
@stop