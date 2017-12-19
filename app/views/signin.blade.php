@extends('templates.default')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 login">
				<div class="loginbox center text-center">
					<form action="{{ route('signin') }}" method="POST">
						
						{{Form::token()}}

						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<input type="email" class="form-control" name="email" placeholder="janedoe@xyzcorp.com" value="{{Request::old('email')}}">
							@if ( $errors->has('email') )
								<span class="help-block">{{$errors->first('email')}}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
							<input type="password" class="form-control" name="password" placeholder="Your password" >
							@if ( $errors->has('password') )
								<span class="help-block">{{$errors->first('password')}}</span>
							@endif
							<a href="" class="forgotpw pull-left"><u>I forgot my password</u></a>
						</div>

						<div class="form-group">
							<button class="btn loginbtn">Submit</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
@stop