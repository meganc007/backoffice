@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>User Show</h1>
				@if ( isset($user) )
					<h3><b>{{$user->fname}} {{$user->lname}}</b></h3>
					<p>
						{{$company->name}} <br>
						{{$user->email}} <br>

						@if (isset($user->phone))
							<?php  
								$num = $user->phone;
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
						@endif
					</p>
					<p>
						@if ( isset($user->department) )
							Department: {{ucfirst($user->department)}} <br>
						@endif

						Status: {{ucfirst($user->status)}} <br>
					</p>
				@endif
				<button class="btn btn-default"><a href="{{ route('user.edit', $user->id) }}">Edit</a></button>

				<form action="{{ route('user.destroy', $user->id) }}" method="POST">
					
					<input type="hidden" name="_method" value="delete">
					<button class="btn btn-danger">Delete</button>

				</form>
			</div>
		</div>
	</div>
@stop