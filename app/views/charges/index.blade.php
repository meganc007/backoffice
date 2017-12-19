@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Charges Index</h1>
				@if ( isset($charges) && !$charges->isEmpty() )
					<table class="table table-striped">
						<tbody>
							<thead>
								@if ( Auth::user()->company_id == 1 )
									<th></th>
								@endif
								<th><p>Charge</p></th>
							</thead>
							@foreach ($charges as $charge)
								@if ( $charge->hidden != 1 )
									<tr>
										@if ( Auth::user()->company_id == 1 )
											<td>
												<a href="{{ route('charge.edit', $charge->id) }}"><button class="btn editbtn">Edit</button></a>
											</td>
										@endif
										<td>
											<p><a href="{{ route('charge.show', $charge->id) }}">{{Carbon::parse($charge->created_at)->toDayDateTimeString()}}</a></p>
										</td>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				@else
					<p>No charges were found for your company.</p>
				@endif
			</div>
		</div>
	</div>
@stop