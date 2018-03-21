<div class="child">
	{{ $comment->comment }}
	<span class="help-block">
		{{ $user->fname }} {{ $user->lname }}, {{ $created_at->format('M d, Y') }} at {{ $created_at->format('g:ia') }}
		<br><br>
		</span>
	@include('comments.create')
</div>
	
