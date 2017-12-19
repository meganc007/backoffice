@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Create a Category</h1>
				<form action="{{ route('category.store') }}" method="POST">
					{{Form::token();}}

					<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name">Category Name</label>
						<input type="text" class="form-control" name="name" placeholder="Computers &amp; IT" value="{{ Request::old('name') }}">
						@if ( $errors->has('name') )
							<span class="help-block">{{ $errors->first('name') }}</span>
						@endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default">Create Category</button>
					</div>

				</form>
			</div>
		</div>
	</div>
@stop