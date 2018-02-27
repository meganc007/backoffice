@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>Comments Index</h1>
				@if( isset($ids) )
					@foreach( $ids as $id )
						<?php
							$company = Company::where('id', $id)->first();
							$comments = Comment::where('company_id', $company->id )->get();
						?>
						<div class="col-xs-12">
							<h3>{{$company->name}}</h3>
							@foreach( $comments as $comment )
							<?php
								$user = User::where('id', $comment->user_id)->first();
								$created_at = Carbon::parse($comment->created_at);
							?>
								<div class="parent-master">
									<p>
										{{ $comment->comment }}
									</p>
									<span class="help-block">
										{{ $user->fname }} {{ $user->lname }}, {{ $created_at->format('M d, Y') }} at {{ $created_at->format('g:ia') }}
 									</span>
								</div>
							@endforeach
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
@stop