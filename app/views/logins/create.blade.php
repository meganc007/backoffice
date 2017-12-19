@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Edit Login</h1>
				
				<form action="{{ route('login.store') }}" method="POST">
					
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

					<div class="form-group {{ $errors->has('server_id') ? ' has-error' : '' }}">
						<label for="server_id">Server</label>
						<select class="form-control" name="server_id">
							<option value="" selected disabled>Choose one of the following</option>
							@if ( isset($servers) )
								@foreach ($servers as $server)
									<option value="{{$server->id}}">{{$server->username}}</option>
								@endforeach
							@endif
						</select>
						@if ( $errors->has('server_id') )
							<span class="help-block">{{$errors->first('server_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('domain_id') ? ' has-error' : '' }}">
						<label for="domain_id">Domain</label>
						<select class="form-control" name="domain_id">
							<option value="" selected disabled>Choose one of the following</option>
							@if ( isset($domains) )
								@foreach ($domains as $domain)
									<option value="{{$domain->id}}">{{$domain->domain}}</option>
								@endforeach
							@endif
						</select>
						@if ( $errors->has('domain_id') )
							<span class="help-block">{{$errors->first('domain_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" placeholder="XYZ server"
						value="{{Request::old('username')}}">
						@if ( $errors->has('username') )
							<span class="help-block">{{$errors->first('username')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password">Password</label>
						<input type="text" class="form-control" name="password" placeholder="password123"
						value="{{Request::old('password')}}">
						@if ( $errors->has('password') )
							<span class="help-block">{{$errors->first('password')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('login_type') ? ' has-error' : '' }}">
						<label for="login_type">Login Type</label>
						<input type="text" class="form-control" name="login_type" placeholder="Server"
						value="{{Request::old('login_type')}}">
						@if ( $errors->has('login_type') )
							<span class="help-block">{{$errors->first('login_type')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
						<label for="url">URL</label>
						<input type="text" class="form-control" name="url" placeholder="XYZ.com"
						value="{{Request::old('url')}}">
						@if ( $errors->has('url') )
							<span class="help-block">{{$errors->first('url')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('comments') ? ' has-error' : '' }}">
						<label for="comments">Comments</label>
						<textarea class="form-control" name="comments" rows="5" placeholder="Your comments go here" value="{{Request::old('comments')}}"></textarea>
						@if ( $errors->has('comments') )
							<span class="help-block">{{$errors->first('comments')}}</span>
						@endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default">Add Login</button>
					</div>

				</form>

			</div>
		</div>
	</div>
@stop