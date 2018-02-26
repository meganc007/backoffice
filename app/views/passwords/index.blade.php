@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<h1>Forgot Password</h1>

				<form method="POST">
					{{Form::token();}}
				
					<p>Enter your email into the box below and we'll send you a link to reset your password.</p>

					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email">Email</label>
						<input type="email" class="form-control"  name="email" placeholder="email@test.com" value="{{Request::old('email')}}">
						@if ( $errors->has('email') )
							<span class="help-block">{{ $errors->first('email') }}</span>
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