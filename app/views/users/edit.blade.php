@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Edit User</h1>
				@if ( isset($user) )
					<form action="{{ route('user.update', $user->id) }}" method="POST">
						{{ Form::token(); }}

						<input type="hidden" name="_method" value="put">

						<div class="form-group {{ $errors->has('fname') ? ' has-error' : '' }}">
							<label for="fname">First Name</label>
							<input type="text" class="form-control" name="fname" placeholder="Jane" value="{{ Request::old('fname') ?: $user->fname }}">
							@if ( $errors->has('fname') )
								<span class="help-block">{{ $errors->first('fname') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('lname') ? ' has-error' : '' }}">
							<label for="lname">Last Name</label>
							<input type="text" class="form-control" name="lname" placeholder="Doe" value="{{ Request::old('lname') ?: $user->lname }}">
							@if ( $errors->has('lname') )
								<span class="help-block">{{ $errors->first('lname') }}</span>
							@endif						
						</div>

						<div class="form-group {{ $errors->has('company_id') ? ' has-error' : '' }}">
							<label for="company_id">Company</label>
							<select class="form-control" name="company_id">
								@if ( isset($companies) )
									@foreach ($companies as $company)
										@if ( $company->id == $user->company_id )
											<option value="{{$company->id}}" selected>{{$company->name}}</option>
										@else
											<option value="{{$company->id}}">{{$company->name}}</option>
										@endif
									@endforeach
								@endif
							</select>
							@if ( $errors->has('company_id') )
								<span class="help-block">{{ $errors->first('company_id') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email">Email</label>
							<input type="email" class="form-control"  name="email" placeholder="email@test.com" value="{{ Request::old('email') ?: $user->email }}">
							@if ( $errors->has('email') )
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('department') ? ' has-error' : ''}}">
							<label for="department">Department</label>
							<select class="custom-select form-control" name="department">
								<option value="" disabled selected>Choose one of the following</option>
								<option value="owner">Owner</option>
								<option value="design">Design</option>
								<option value="programming">Programming</option>
								<option value="support">Support</option>
								<option value="sales">Sales</option>
								<option value="other">Other</option>
							</select>
							@if( $errors->has('department') )
				            	<span class="help-block">{{ $errors->first('department') }}</span>
				            @endif
						</div>

						<div class="form-group {{ $errors->has('status') ? ' has-error' : ''}}">
							<label for="status">Status</label>
							<select class="custom-select form-control" name="status">
							  <option value="" disabled selected>Choose one of the following</option>
							  <option value="active">Active</option>
							  <option value="inactive">Inactive</option>
							</select>
							@if( $errors->has('status') )
				            	<span class="help-block">{{ $errors->first('status') }}</span>
				            @endif
						</div>

						<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" name="phone" value="{{ Request::old('phone') ?: $user->phone }}">
							@if( !$errors->has('phone') )
							@elseif( $errors->has('phone') )
								<span class="help-block">{{ $errors->first('phone') }}</span>
							@endif
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-default">Edit user</button>
						</div>

					</form>
				@endif
			</div>
		</div>
	</div>
@stop