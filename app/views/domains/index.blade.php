@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Domains Index</h1>
				@if ( isset($domains) && !$domains->isEmpty() )
					<table class="table table-striped">
						<tbody>
							<thead>
								@if ( Auth::user()->company_id == 1 )
									<th></th>
								@endif
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
											@if ( Auth::user()->company_id == 1 )
												<td>
													<a href="{{ route('domain.edit', $domain->id) }}"><button class="btn editbtn">Edit</button></a>
												</td>
											@endif
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
				@else
					<p>No domains were found for your company.</p>
				@endif
			</div>
		</div>
	</div>
@stop