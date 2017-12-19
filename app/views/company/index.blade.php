@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Company Index</h1>
				@if ( isset($companies) && !$companies->isEmpty() )
					<table class="table table-striped">
						<tbody>
							<thead>
								<th></th>
								<th><p>Company</p></th>
								<th><p>Address</p></th>
								<th><p>City</p></th>
								<th><p>State</p></th>
								<th><p>Zip</p></th>
								<th><p>Phone</p></th>
							</thead>
							@foreach( $companies as $company )
								@if ( $company->hidden != 1 )
									<tr>
										<td>
											<a href="{{ route('company.edit', $company->id) }}"><button class="btn editbtn">Edit</button></a>
										</td>
										<td>
											<p><b><a href="{{ route('company.show', $company->id) }}">{{$company->name}}</a></b>
										</td>
										<td>
											<p>{{$company->address}} </p>
										</td>
										<td>
											<p>{{$company->city}}</p>
										</td>
										<td>
											<p>{{$company->state}}</p>
										</td>
										<td>
											<p>{{$company->zip}}</p>
										</td>
											<?php  
												$num = $company->phone;
												if ( strlen($num) == 10) {
													$areaCode = substr($num, 0, 3);
													$firstThree = substr($num, 3, 3);
													$lastFour = substr($num, 6, 10);
													$phone = "(" . $areaCode . ") " . $firstThree . "-" . $lastFour;
													}
												elseif (strlen($num) == 11) {
													$countryCode = substr($num, 0, 1); 
													$areaCode = substr($num, 1, 3);
													$firstThree = substr($num, 4, 3);
													$lastFour = substr($num, 7, 10);
													$phone = $countryCode . "-" . $areaCode . "-" . $firstThree . "-" . $lastFour;
												}
												else {
													$phone = $num;
												}
											?>
										<td>
											<p>{{$phone}}</p>
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