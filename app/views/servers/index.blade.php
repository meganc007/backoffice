@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Servers Index</h1>
				@if ( isset($servers) && !$servers->isEmpty() )
					<table class="table table-striped">
						<tbody>
							<thead>
								@if( Auth::user()->company_id == 1 )
									<th></th>
								@endif
								<th><p>Username</p></th>
								<th><p>URL</p></th>
								<th><p>Status</p></th>
							</thead>
							@foreach ($servers as $server)
								@if ( $server->hidden != 1 )
									@if ( $server->status == 'inactive' )
										<tr class="parked">
									@else
										<tr>
									@endif
									@if( Auth::user()->company_id == 1 )
										<td>
											<a href="{{ route('server.edit', $server->id) }}"><button class="btn editbtn">Edit</button></a>
										</td>
									@endif
										
										<td>
											<p><a href="{{ route('server.show', $server->id) }}">{{ucfirst($server->username)}}</a></p>
										</td>
										<td>
											<p>{{ucfirst($server->url)}}</p>
										</td>
										<td>
											<p>{{$server->status}}</p>
										</td>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				@else
					<p>No servers were found.</p>
				@endif
			</div>
		</div>
	</div>
@stop