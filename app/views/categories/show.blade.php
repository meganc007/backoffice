@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Category Show</h1>

				@if ( isset($category) )
					<p>{{$category->name}}</p>

					<button class="btn btn-default">
						<a href="{{ route('category.edit', $category->id) }}">Edit</a>
					</button>

					<form action="{{ route('category.destroy', $category->id) }}" method="POST">

						<input type="hidden" name="_method" value="delete">
						<button class="btn btn-danger">Delete</button>
						
					</form>
				@endif

			</div>
		</div>
	</div>
@stop