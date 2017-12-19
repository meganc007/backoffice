@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Edit Domain</h1>
				@if ( isset($domain) )
					<form action="{{ route('domain.update', $domain->id) }}" method="POST">

						<input type="hidden" name="_method" value="put">
					
						<div class="form-group {{ $errors->has('server_id') ? ' has-error' : '' }}">
							<label for="server_id">Server</label>
							<select class="form-control" name="server_id">
								@if ( isset($servers) )
									@foreach ($servers as $server)
										@if ($server->id == $domain->server_id)
											<option value="{{$server->id}}" selected>{{$server->username}}</option>
										@else
											<option value="{{$server->id}}">{{$server->username}}</option>
										@endif
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
								@if ( isset($providers) )
									@foreach ($providers as $provider)
										@if ( $provider->id == $domain->provider_id )
											<option value="{{$provider->id}}" selected>{{$provider->name}}</option>
										@else
											<option value="{{$provider->id}}">{{$provider->name}}</option>
										@endif
									@endforeach
								@endif
							</select>
							@if ( $errors->has('provider_id') )
								<span class="help-block">{{$errors->first('provider_id')}}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('domain') ? ' has-error' : '' }}">
							<label for="domain">Domain</label>
							<input type="text" class="form-control" name="domain" placeholder="xyz.com" value="{{ Request::old('domain') ?: $domain->domain }}">
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

						<button class="btn btn-default">Edit Domain</button>

					</form>
				@endif
			</div>
		</div>
	</div>
@stop