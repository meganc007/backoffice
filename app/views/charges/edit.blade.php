@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Edit Charge</h1>

				<form action="{{ route('charge.update', $charge->id) }}" method="POST">
					
					{{Form::token()}}

					<input type="hidden" name="_method" value="put">
					
					<div class="form-group {{ $errors->has('line_id' ? ' has-error' : '') }}">
						<label for="line_id">Line Item</label>
						<select class="form-control" name="line_id">
							@if ( isset($lines) )
								@foreach ($lines as $line)
									@if ( $line->id == $charge->line_id )
										<option value="{{$line->id}}" selected>{{$line->description}}</option>
									@else
										<option value="{{$line->id}}">{{$line->description}}</option>
									@endif
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
							@if ( isset($users) )
								@foreach ($users as $user)
									@if ( $user->id == $charge->user_id )
										<option value="{{$user->id}}" selected>{{$user->fname}} {{$user->lname}}</option>
									@else
										<option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
									@endif
								@endforeach
							@endif
						</select>
						@if ( $errors->has('user_id') )
							<span class="help-block">{{$errors->first('user_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('hours') ? ' has-error' : '' }}">
						<label for="hours">Hours Worked</label>
						<input type="text" class="form-control" name="hours" placeholder="3.75" value="{{ Request::old('hours') ?: $charge->hours }}">
						@if ( $errors->has('hours') )
							<span class="help-block">{{$errors->first('hours')}}</span>
						@endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default">Edit Charge</button>
					</div>

				</form>

			</div>
		</div>
	</div>
@stop