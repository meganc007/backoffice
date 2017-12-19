@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Category Index</h1>
					@if ( isset($categories) && !$categories->isEmpty() )
						<table class="table table-striped">
							<tbody>
								<thead>
									<th></th>
									<th><p>Category</p></th>
								</thead>
								@foreach ($categories as $category)
									@if ( $category->hidden != 1 )
										<tr>
											<td>
												<a href="{{ route('category.edit', $category->id) }}"><button class="btn editbtn">Edit</button></a>
											</td>
											<td><p><a href="{{ route('category.show', $category->id) }}">{{$category->name}}</a></p></td>
										</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					@endif
			</div>
		</div>
	</div>
@stop