<div class="row">
	<div class="col-xs-12 col-md-6">
		<form action="{{ route('comment.store') }}" method="POST">
			{{ Form::token(); }}

			<input type="hidden" value="{{$post->id}}" name="post_id">

			@if ( isset($comment->id) )
				<input type="hidden" value="{{$comment->id}}" name="comment_id">
			@endif

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