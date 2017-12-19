@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Logins Index</h1>
				@if ( isset($logins) && !$logins->isEmpty() )
					<table class="table table-striped">
						<tbody>
							<thead>
								<th></th>
								<th><p>Username</p></th>
								<th><p>Type</p></th>
							</thead>
						</tbody>
						@foreach ($logins as $login)
							@if ( $login->hidden != 1 )
								<tr>
									<td>
										<a href="{{ route('login.edit', $login->id) }}"><button class="btn editbtn">Edit</button></a>
									</td>
									<td>
										<p><a href="{{ route('login.show', $login->id) }}">{{$login->username}}</a></p>
									</td>
									<td>
										<p>{{$login->login_type}}</p>
									</td>
								</tr>
							@endif
						@endforeach
					</table>
				@endif
			</div>
		</div>
	</div>
@stop