@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Create a Domain</h1>

				<form action="{{ route('domain.store') }}" method="POST">
					
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

					<div class="form-group {{ $errors->has('provider_id') ? ' has-error' : '' }}">
						<label for="provider_id">Provider</label>
						<select class="form-control" name="provider_id">
							<option value="" selected disabled>Choose one of the following</option>
							@if ( isset($providers) )
								@foreach($providers as $provider)
									<option value="{{$provider->id}}">{{$provider->name}}</option>
								@endforeach
							@endif
						</select>
						@if ( $errors->has('provider_id') )
							<span class="help-block">{{$errors->first('provider_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('domain') ? ' has-error' : '' }}">
						<label for="domain">Domain</label>
						<input type="text" class="form-control" name="domain" placeholder="xyz.com" value="{{Request::old('domain')}}">
						@if ( $errors->has('domain') )
							<span class="help-block">{{$errors->first('domain')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('status') ? ' has-error' : ''}}">
						<label for="status">Status</label>
						<select class="custom-select form-control" name="status">
						  <option value="" disabled selected>Choose one of the following</option>
						  <option value="active">Active</option>
						  <option value="inactive">Inactive</option>
						  <option value="parked">Parked</option>
						  <option value="cash parked">Cash Parked</option>
						</select>
						@if( $errors->has('status') )
			            	<span class="help-block">{{ $errors->first('status') }}</span>
			            @endif
					</div>

					<button class="btn btn-default">Create a Domain</button>

				</form>

			</div>
		</div>
	</div>
@stop