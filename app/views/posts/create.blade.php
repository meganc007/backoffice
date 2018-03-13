@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Create a Post</h1>
				<form action="{{ route('post.store') }}" method="POST">
					{{ Form::token(); }}
					
					<div class="form-group {{ $errors->has('company_id') ? ' has-error' : '' }}">
						<label for="company_id">Company ID</label>
						<select class="form-control" name="company_id" size="1" id="company_id">
							<option value="" selected disabled>Choose one of the following</option>
							@foreach ($companies as $company)
								<option value="{{$company->id}}">{{$company->name}}</option>
							@endforeach
							@if( $errors->has('company_id') )
								<span class="help-block">{{ $errors->first('company_id') }}</span>
							@endif
						</select>
					</div>

					<div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
						<label for="user_id">User</label>
						<select name="user_id" class="form-control">
							<option value="" selected disabled>Choose one of the following</option>
							@foreach ($users as $user)
								<option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
							@endforeach
							@if( $errors->has('user_id') )
								<span class="help-block">{{ $errors->first('user_id') }}</span>
							@endif
						</select>
					</div>

					<div class="form-group {{ $errors->has('project_id' ? ' has-error' : '') }}">
						<label for="project_id">Project</label>
						<select class="form-control" name="project_id" id="project_id" disabled>
							<option value="" disabled selected>Choose one of the following</option>
						</select>
						@if ( $errors->has('project_id') )
							<span class="help-block">{{$errors->first('project_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('line_id' ? ' has-error' : '') }}">
						<label for="line_id">Line</label>
						<select class="form-control" name="line_id" id="line_id" disabled>
							<option value="" disabled selected>Choose one of the following</option>
						</select>
						@if ( $errors->has('line_id') )
							<span class="help-block">{{$errors->first('line_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('charge_id' ? ' has-error' : '') }}">
						<label for="charge_id">Charge</label>
						<select class="form-control" name="charge_id" id="charge_id" disabled>
							<option value="" disabled selected>Choose one of the following</option>
						</select>
						@if ( $errors->has('charge_id') )
							<span class="help-block">{{$errors->first('charge_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('comment') ? ' has-error' : '' }}">
						<label for="comment">Comment</label>
						<textarea class="form-control" id="comment" rows="10" name="comment"></textarea>
						@if( $errors->has('comment') )
							<span class="help-block">{{ $errors->first('comment') }}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('internal') ? ' has-error' : '' }}">
						<label for="internal">Is this an internal comment?</label>
						<span class="help-block">Internal comments can only be seen by CySy employees.</span>
						<select name="internal" class="form-control">
							<option value="" selected disabled>Choose one of the following</option>
							<option value="0">No</option>
							<option value="1">Yes</option>
							@if( $errors->has('internal') )
								<span class="help-block">{{ $errors->first('internal') }}</span>
							@endif
						</select>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default">Create Comment</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	@section('scripts')
		<script>
			jQuery(document).ready(function($) {
				$("#company_id").change(function() {
					$.ajax({
					    url: '{{route('post.ajaxchange')}}',
			            type: 'get',
			            data: {company_id:$('#company_id').val()},
			            success: function(projects){ // What to do if we succeed
				            console.log(projects);
				            $('#project_id').children().not(':first').remove();

				            $(projects).each(function(key, value){
							    console.log(value.name);
							    $('#project_id').append('<option value="' + value.id +'">' + value.name + '</option>');
							});//end $(projects)
						}

					});//end ajax
					$('#project_id').removeAttr('disabled');
				}); //end .change function

				$("#project_id").change(function() {
					$.ajax({
					    url: '{{route('post.linechange')}}',
			            type: 'get',
			            data: {project_id:$('#project_id').val()},
			            success: function(lines){ // What to do if we succeed
				            console.log(lines);
				            $('#line_id').children().not(':first').remove();

				            $(lines).each(function(key, value){
							    console.log(value.description);
							    $('#line_id').append('<option value="' + value.id +'">' + value.description + '</option>');
							});//end $(lines)
						}

					});//end ajax
					$('#line_id').removeAttr('disabled');
				}); //end .change function

				$("#line_id").change(function() {
					$.ajax({
					    url: '{{route('post.chargechange')}}',
			            type: 'get',
			            data: {line_id:$('#line_id').val()},
			            success: function(charges){ // What to do if we succeed
				            console.log(charges);
				            $('#charge_id').children().not(':first').remove();

				            $(charges).each(function(key, value){
							    
							    var created = value.created_at;
							    var d = new Date(created);

							    var formatted_date = (d.getMonth() + 1) + '/' + d.getDate() + '/' +  d.getFullYear();

							    $('#charge_id').append('<option value="' + value.id +'">' + formatted_date + ' - ' + value.hours + '</option>');
							});//end $(charges)
						}

					});//end ajax
					$('#charge_id').removeAttr('disabled');
				}); //end .change function
			});	
		</script>
	@stop
@stop