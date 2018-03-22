@if ( isset($comments) && !empty($comments) )
	@foreach ($comments as $comment)
		<?php
			$children = Comment::find($comment->id)->children()->where('parent_id', $comment->id)->orderBy('parent_id')->get();
		?>
		@foreach ($children as $child)
			@if ( isset($child) && $child->parent_id !='' && $child->parent_id == $comment->id )
				<div class="nested">
					<p>{{ $child->comment }}</p>
					<p>Comment ID {{$child->id}}</p>
					<p>Parent ID {{$child->parent_id}}</p>
					<span class="help-block">
						{{ $user->fname }} {{ $user->lname }}, {{ $created_at->format('M d, Y') }} at {{ $created_at->format('g:ia') }}
						<br><br>
					</span>
					@include('comments.create')
				</div>
			@endif
		@endforeach
	@endforeach
@endif