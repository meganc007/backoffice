@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Users Index</h1>
					@if ( isset($users) && !$users->isEmpty() )
						<table class="table table-striped">
							<tbody>
								<thead>
									<th></th>
									<th><p>User</p></th>
									<th><p>Company</p></th>
									<th><p>Email</p></th>
								</thead>
								@foreach ($users as $user)
									@if ( $user->hidden != 1 )
										<?php 
											$company = Company::where('id', $user->company_id )->first();
										?>
										<tr>
											<td>
												<button class="btn editbtn"><a href="{{ route('user.edit', $user->id) }}">Edit</a></button>
											</td>
											<td>
												<p><a href="{{ route('user.show', $user->id) }}">{{$user->fname}} {{$user->lname}}</a></p>
											</td>
											<td>
												<p>{{$company->name}}</p>
											</td>
											<td>
												<p>{{$user->email}}</p>
											</td>
										</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					@else
						<p>No users were found for your company.</p>
					@endif
			</div>
		</div>
	</div>
@stop