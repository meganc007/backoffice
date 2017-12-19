@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Edit Line</h1>

				<form action="{{ route('line.update', $line->id) }}" method="POST">

					{{Form::token()}}

					<input type="hidden" name="_method" value="put">
						
					<div class="form-group {{ $errors->has('project_id') ? ' has-error' : '' }}">
						<label for="project_id">Project</label>
						<select class="form-control" name="project_id">
							@if ( isset($projects) )
								@foreach ($projects as $project)
									@if ( $project->id == $line->project_id )
										<option value="{{$project->id}}" selected>{{$project->name}}</option>
									@else
										<option value="{{$project->id}}">{{$project->name}}</option>
									@endif
								@endforeach
							@endif
						</select>
						@if ( $errors->has('project_id') )
							<span class="help-block">{{$errors->first('project_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
						<label for="description">Line Item Description</label>
						<input type="text" class="form-control" name="description" placeholder="site updates" value="{{ Request::old('description') ?: $line->description }}">
						@if ( $errors->has('description') )
							<span class="help-block">{{ $errors->first('description') }}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('type') ? ' has-error' : ''}}">
						<label for="type">Type</label>
						<select class="custom-select form-control" name="type">
						  <option value="" disabled selected>Choose one of the following</option>
						  <option value="admin">Admin</option>
						  <option value="content">Content</option>
						  <option value="design">Design</option>
						  <option value="flash">Flash</option>
						  <option value="programming">Programming</option>
						  <option value="seo">SEO</option>
						</select>
						@if( $errors->has('type') )
			            	<span class="help-block">{{ $errors->first('type') }}</span>
			            @endif
					</div>

					<div class="form-group {{ $errors->has('hours') ? ' has-error' : ''}}">
						<label for="hours">Hours to Complete</label>
						<input type="text" class="form-control" name="hours" value="{{ Request::old('hours') ?: $line->hours }}">
						@if( $errors->has('hours') )
			            	<span class="help-block">{{ $errors->first('hours') }}</span>
			            @endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default">Edit a line</button>
					</div>

				</form>

			</div>
		</div>
	</div>
@stop