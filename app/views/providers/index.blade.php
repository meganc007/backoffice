@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Providers Index</h1>
				@if ( isset($providers) && !$providers->isEmpty() )
					<table class="table table-striped">
						<tbody>
							<thead>
								<th></th>
								<th><p>Provider</p></th>
							</thead>
							@foreach ($providers as $provider)
								@if ( $provider->hidden != 1 )
									<tr>
										<td>
											<a href="{{ route('provider.edit', $provider->id) }}"><button class="btn editbtn">Edit</button></a>
										</td>
										<td>
											<p><a href="{{ route('provider.show', $provider->id) }}">{{$provider->name}}</a></p>
										</td>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				@endif
			</div>
		</div>
	</div>
@stop