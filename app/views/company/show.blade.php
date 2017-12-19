@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Company Show</h1>
				@if( isset($company) )
					<h3><b>{{$company->name}}</b></h3>

					@if ( isset($user) )
						<p>
							Salesperson: {{$user->fname}} {{$user->lname}}
						</p>
					@endif

					@if ( isset($category) )
						<p>
							Category: {{$category->name}}
						</p>
					@endif

					@if ( !empty($company->city) && !empty($company->state) &&  !empty($company->zip) && !empty($company->phone) )
						<p>
							{{$company->address}}, <br>
							{{$company->city}}, {{$company->state}} {{$company->zip}} <br>
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
					@endif
					
					<button class="btn btn-default"><a href="{{ route('company.edit', $company->id) }}">Edit</a></button>
					
					<form action="{{ route('company.destroy', $company->id) }}" method="POST">

						<input type="hidden" name="_method" value="delete" />

						<button class="btn btn-danger">Delete</button>
					</form>
				@endif
			</div>
		</div>
	</div>
@stop