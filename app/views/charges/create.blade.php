@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Create a Charge</h1>

				<form action="{{ route('charge.store') }}" method="POST">
					
					{{Form::token()}}

					<div class="form-group {{ $errors->has('line_id' ? ' has-error' : '') }}">
						<label for="line_id">Line Item</label>
						<select class="form-control" name="line_id">
							<option value="" disabled selected>Choose one of the following</option>
							@if ( isset($lines) )
								@foreach ($lines as $line)
									<option value="{{$line->id}}">{{$line->description}}</option>
								@endforeach
							@endif
						</select>
						@if ( $errors->has('line_id') )
							<span class="help-block">{{$errors->first('line_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
						<label for="user_id">User</label>
						<select class="form-control" name="user_id">
							<option value="" disabled selected>Choose one of the following</option>
							@if ( isset($users) )
								@foreach ($users as $user)
									<option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
								@endforeach
							@endif
						</select>
						@if ( $errors->has('user_id') )
							<span class="help-block">{{$errors->first('user_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('hours') ? ' has-error' : '' }}">
						<label for="hours">Hours Worked</label>
						<input type="text" class="form-control" name="hours" placeholder="3.75" value="{{Request::old('hours')}}">
						@if ( $errors->has('hours') )
							<span class="help-block">{{$errors->first('hours')}}</span>
						@endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default">Create Charge</button>
					</div>

				</form>

			</div>
		</div>
	</div>
@stop