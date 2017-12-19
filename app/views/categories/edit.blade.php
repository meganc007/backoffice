@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Edit Category</h1>
				@if ( isset($category) )

					<form action="{{ route('category.update', $category->id) }}" method="POST">
						
						{{Form::token();}}

						<input type="hidden" name="_method" value="put">

						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name">Category Name</label>
							<input type="text" class="form-control" name="name" value="{{$category->name}}">
							@if ( $errors->has('name') )
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-default">Edit Category</button>
						</div>

					</form>

				@endif
			</div>
		</div>
	</div>
@stop