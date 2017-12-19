@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Servers Index</h1>
				@if ( isset($servers) )
					<ul>
						@foreach ($servers as $server)
							@if ( $server->hidden != 1 )
								<li>
									<p><a href="{{ route('server.show', $server->id) }}">{{$server->username}}</a></p>
								</li>
							@endif
						@endforeach
					</ul>
				@endif
			</div>
		</div>
	</div>
@stop