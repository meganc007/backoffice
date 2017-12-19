@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Create a Server</h1>
				<form action="{{ route('server.store') }}" method="POST">
					{{Form::token();}}

					<div class="form-group {{ $errors->has('provider_id') ? ' has-error' : '' }}">
						<label for="provider_id">Provider</label>
						<select class="form-control" name="provider_id">
							<option value="" selected disabled>Choose one of the following</option>
							@if ( isset($providers) )
								@foreach ($providers as $provider)
									<option value="{{$provider->id}}">{{$provider->name}}</option>
								@endforeach
							@endif
						</select>
						@if ( $errors->has('provider_id') )
							<span class="help-block">{{$errors->first('provider_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('company_id') ? ' has-error' : '' }}">
						<label for="company_id">Company</label>
						<select class="form-control" name="company_id">
							<option value="" selected disabled>Choose one of the following</option>
							@if ( isset($companies) )
								@foreach ($companies as $company)
									<option value="{{$company->id}}">{{$company->name}}</option>
								@endforeach
							@endif
						</select>
						@if ( $errors->has('company_id') )
							<span class="help-block">{{$errors->first('company_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" placeholder="xyzcorp" value="{{Request::old('username')}}">
						@if ( $errors->has('username') )
							<span class="help-block">{{$errors->first('username')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
						<label for="url">URL</label>
						<input type="text" class="form-control" name="url" placeholder="xyzcorp.com" value="{{Request::old('url')}}">
						@if ( $errors->has('url') )
							<span class="help-block">{{$errors->first('url')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password">Password</label>
						<input type="text" class="form-control" name="password" placeholder="password123" value="{{Request::old('password')}}">
						@if ( $errors->has('password') )
							<span class="help-block">{{$errors->first('password')}}</span>
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

					<div class="form-group">
						<button type="submit" class="btn btn-default">Add server</button>
					</div>

				</form>
			</div>
		</div>
	</div>
@stop