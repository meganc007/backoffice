@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Domains Index</h1>
				@if ( isset($domains) )
					<table class="table table-striped">
						<tbody>
							<thead>
								<th></th>
								<th><p>Domain</p></th>
								<th><p>Status</p></th>
							</thead>
							@foreach ($domains as $domain)
								@if ( $domain->hidden != 1 )
									@if ( $domain->status == 'inactive' )
											<tr class="inactive">
									@elseif ($domain->status == 'parked' || $domain->status == 'cash parked' )
										<tr class="parked">	
									@else
										<tr>
									@endif
											<td>
												<a href="{{ route('domain.edit', $domain->id) }}"><button class="btn editbtn">Edit</button></a>
											</td>
											<td>
												<p><a href="{{ route('domain.show', $domain->id) }}">{{$domain->domain}}</a></p>
											</td>
											<td>
												<p>{{$domain->status}}</p>
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