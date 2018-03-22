@if ( $comment->parent_id == '' )
	<div class="child">
		<p>{{ $comment->comment }}</p>
		<p>Comment ID {{$comment->id}}</p>
		<p>Parent ID {{$comment->parent_id}}</p>
		<span class="help-block">
			{{ $user->fname }} {{ $user->lname }}, {{ $created_at->format('M d, Y') }} at {{ $created_at->format('g:ia') }}
			<br><br>
			</span>
		@include('comments.create')
	</div>
@endif
	
