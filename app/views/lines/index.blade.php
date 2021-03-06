@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Line Index</h1>
				@if ( isset($lines) && !$lines->isEmpty() )
					<table class="table table-striped">
						<tbody>
							<thead>
								<th></th>
								<th><p>Line</p></th>
								<th><p>Type</p></th>
								<th><p>Hours</p></th>
							</thead>
							@foreach ($lines as $line)
								@if ( $line->hidden != 1 )
									<tr>
										<td>
											<a href="{{ route('line.edit', $line->id) }}"><button class="btn editbtn">Edit</button></a>
										</td>
										<td>
											<p><a href="{{ route('line.show', $line->id) }}">{{$line->description}} - {{$line->hours}}hrs</a></p>
										</td>
										<td>
											<p>{{$line->type}}</p>
										</td>
										<td>
											<p>{{$line->hours}}</p>
										</td>
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