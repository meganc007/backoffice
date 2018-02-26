@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<h1>Reset Password</h1>

				<form method="POST">
					
					{{Form::token();}}

					<p>Choose a new password.</p>

					<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password">
						@if( !$errors->has('password') )
							<span class="help-block">{{ $errors->first('password') }}</span>
						@elseif( $errors->has('password') )
							<span class="help-block">{{ $errors->first('password') }}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
						<label for="confirm_password">Confirm Password</label>
						<input type="password" class="form-control" name="confirm_password">
						@if( !$errors->has('confirm_password') )
							<span class="help-block">{{ $errors->first('confirm_password') }}</span>
						@elseif( $errors->has('confirm_password') )
							<span class="help-block">{{ $errors->first('confirm_password') }}</span>
						@endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>

				</form>

			</div>
		</div>
	</div>
@stop