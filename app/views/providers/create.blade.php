@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Create a Provider</h1>
				<form action="{{ route('provider.store') }}" method="POST">
					{{Form::token()}}

					<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name">Provider Name</label>
						<input type="text" class="form-control" name="name" placeholder="DomainsRUs" value="{{Request::old('name')}}">
						@if ( $errors->has('name') )
							<span class="help-block">{{$errors->first('name')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('type') ? ' has-error' : ''}}">
						<label for="type">Type</label>
						<select class="custom-select form-control" name="type">
						  <option value="" disabled selected>Choose one of the following</option>
						  <option value="email">Email</option>
						  <option value="server">Server</option>
						  <option value="other">Other</option>
						</select>
						@if( $errors->has('type') )
			            	<span class="help-block">{{ $errors->first('type') }}</span>
			            @endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default">Create Provider</button>
					</div>

				</form>
			</div>
		</div>
	</div>
@stop