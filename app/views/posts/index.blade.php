@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>Posts Index</h1>
				@if( isset($ids) )
					@foreach( $ids as $id )
						<?php
							$company = Company::where('id', $id)->first();
							$posts = Post::where('company_id', $company->id )->get();
							$comments = Post::find(1)->comments;
						?>
						<div class="col-xs-12">
							<h3>{{$company->name}}</h3>
							@foreach( $posts as $post )
								<?php
									$user = User::where('id', $post->user_id)->first();
									$created_at = Carbon::parse($post->created_at);
								?>
								<div class="parent-master">
									<p>
										{{ $post->comment }}
									</p>
									<span class="help-block">
										{{ $user->fname }} {{ $user->lname }}, {{ $created_at->format('M d, Y') }} at {{ $created_at->format('g:ia') }}
										<br><br>
 									</span>
 									@include('comments.create')
								</div>
								@if ( isset($comments) )
									@foreach ($comments as $comment)
										<div class="child">
											{{ $comment->comment }}
											<span class="help-block">
												{{ $user->fname }} {{ $user->lname }}, {{ $created_at->format('M d, Y') }} at {{ $created_at->format('g:ia') }}
												<br><br>
		 									</span>
											@include('comments.create')
										</div>
									@endforeach
								@endif
							@endforeach
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
@stop