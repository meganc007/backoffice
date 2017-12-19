@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="module">
					<h1>Home</h1>
					<h3>Your Projects</h3>
						<div class="text-center">
							@if ( isset($projects) && !$projects->isEmpty() )
								@foreach ($projects as $project)
									@if ( $project->status == 'active' )
										<h4>{{$project->name}}</h4>

										<?php 
											$total = 0;
											$hours = 0;

											$lines = Line::where('project_id', $project->id)->get();
										?>

										@if ( !$lines->isEmpty() )
											@foreach ($lines as $line)
												<?php
													$total += $line->hours;

													$charges = Charge::where('line_id', $line->id)->get();
												?>

												@if ( !$charges->isEmpty() )
													@foreach ($charges as $charge)
														<?php 
															$hours += $charge->hours;
														?>
													@endforeach
												@endif
											@endforeach
										@endif

										@if ( $total != 0 )
											<progress max="{{$total}}" value="{{$hours}}" class="projectsprogress"></progress>
											@if ($hours > $total)
												<p class="small danger percentage">Your project is over budget by: {{ number_format(($hours/$total) * 100, 2) }}%</p>
											@elseif ($hours <= $total && ($hours != 0 || $total !=0 ) )
												<p class="small percentage">{{ number_format(($hours/$total) * 100, 2) }}%</p>
											@endif
										@else
											<p>No line items have been entered yet.</p>
										@endif
									@else
										<p>There are currently no active projects.</p>
									@endif
								@endforeach
							@else
								<p>No projects were found.</p>
							@endif
						</div>

						<p class="pull-right small"><a href="{{ route('project.index') }}">See more <span class="glyphicon glyphicon-menu-right"></span></p></a>
				</div>
			</div>
		</div>
	</div>

	<div class="clear"></div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6 pull-left">
				<div class="module">
					<h3>Your Company</h3>
					@if ( isset($company) )
						<p>{{$company->name}}</p>
						<p>
							{{$company->address}} <br>
							{{$company->city}}, {{$company->state}} {{$company->zip}}<br>
						</p>
						<p>
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
							{{$phone}}
						</p>

						<p class="pull-right small"><a href="{{ route('company.edit', $company->id) }}">Edit <span class="glyphicon glyphicon-menu-right"></span></p></a>
					@else
						<p>There was an error while looking up your company.</p>
					@endif
				</div>
			</div>

			<div class="col-sm-12 col-md-6 pull-right">
				<div class="module">
					<h3>{{$company->name}}'s Users</h3>
					@if ( isset($users) && !$users->isEmpty() )
						<h4>Active Users</h4>
						@foreach ($users as $user)
							@if ( $user->status == 'active' )
								<p>
									{{$user->fname}} {{$user->lname}}, {{ucfirst($user->department)}} <br>
									{{$user->email}}
								</p>
							@else
								<p>No active users.</p>
							@endif
						@endforeach
						<h4>Inactive Users</h4>
						@foreach ($users as $user)
							@if ( $user->status == 'inactive' )
								<p>
									{{$user->fname}} {{$user->lname}}, {{ucfirst($user->department)}} <br>
									{{$user->email}}
								</p>
							@else
								<p>No inactive users.</p>
							@endif
						@endforeach
					@else
						<p>There was an error while retrieving your company's users.</p>
					@endif
				</div>
			</div>

		</div>
	</div>

	<div class="clear"></div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="module domains">
					<h3>{{$company->name}}'s Domains</h3>
					@if ( isset($servers) && !$servers->isEmpty() )
						<table class="table">
							<tbody>
								@foreach ($servers as $server)
									<?php 
										$domains = Domain::where('server_id', $server->id)->get();
									?>
									@foreach ($domains as $domain)
										@if ( $domain->status == 'inactive' )
											<tr class="inactive">
										@elseif ($domain->status == 'parked' || $domain->status == 'cash parked' )
											<tr class="parked">	
										@else
											<tr>									
										@endif
												<td>
													<p>{{$domain->domain}}</p>
												</td>
												<td>
													<p>{{$domain->status}}</p>
												</td>
											</tr>
									@endforeach
								@endforeach
							</tbody>
						</table>
						@else
							<p>No domains were found.</p>
					@endif
				</div>
			</div>
		</div>
	</div>

@stop