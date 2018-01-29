@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Create a Comment</h1>
				<form action="{{ route('comment.store') }}" method="POST">
					{{ Form::token(); }}
					
					<div class="form-group {{ $errors->has('company_id') ? ' has-error' : '' }}">
						<label for="company_id">Company ID</label>
						<select class="form-control" name="company_id" size="1">
							<option value="" selected disabled>Choose one of the following</option>
							@foreach ($companies as $company)
								<option value="{{$company->id}}">{{$company->name}}</option>
							@endforeach
							@if( $errors->has('company_id') )
								<span class="help-block">{{ $errors->first('company_id') }}</span>
							@endif
						</select>
					</div>

				</form>
			</div>
		</div>
	</div>
@stop