@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Create a Project</h1>

				<form action="{{ route('project.store') }}" method="POST">

					{{Form::token()}}
					
					<div class="form-group {{ $errors->has('company_id') ? ' has-error' : '' }} ">
						<label for="company_id">Company</label>
						<select class="form-control" name="company_id">
							<option value="" selected disabled>Choose one of the following</option>
							@if ( isset($companies) )
								@foreach($companies as $company)
									<option value="{{$company->id}}">{{$company->name}}</option>
								@endforeach
							@endif
						</select>
						@if ( $errors->has('company_id') )
							<span class="help-block">{{$errors->first('company_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('domain_id') ? ' has-error' : '' }}">
						<label for="domain_id">Domain</label>
						<select class="form-control" name="domain_id">
							<option value="" selected disabled>Choose one of the following</option>
							@if ( isset($domains) )
								@foreach ($domains as $domain)
									<option value="{{$domain->id}}">{{$domain->domain}}</option>
								@endforeach
							@endif
						</select>
						@if ( $errors->has('domain_id') )
							<span class="help-block">{{$errors->first('domain_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
						<label for="user_id">Project Manager</label>
						<select class="form-control" name="user_id">
							<option value="" selected disabled>Choose one of the following</option>
							@if ( isset($users) )
								@foreach ($users as $user)
									<option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
								@endforeach
							@endif
						</select>
						@if ( $errors->has('user_id') )
							<span class="help-block">{{$errors->first('user_id')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name">Name</label>
						<input type="text" class="form-control" name="name" placeholder="Project Name" value="{{Request::old('name')}}">
						@if ( $errors->has('name') )
							<span class="help-block">{{$errors->first('name')}}</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('type') ? ' has-error' : ''}}">
						<label for="type">Type</label>
						<select class="custom-select form-control" name="type">
						  <option value="" disabled selected>Choose one of the following</option>
						  <option value="ticket">Ticket</option>
						  <option value="seo">SEO</option>
						  <option value="design">Design</option>
						</select>
						@if( $errors->has('type') )
			            	<span class="help-block">{{ $errors->first('type') }}</span>
			            @endif
					</div>

					<div class="form-group {{ $errors->has('status') ? ' has-error' : ''}}">
						<label for="status">Status</label>
						<select class="custom-select form-control" name="status">
						  <option value="" disabled selected>Choose one of the following</option>
						  <option value="active">Active</option>
						  <option value="on hold">On Hold</option>
						  <option value="complete">Complete</option>
						  <option value="cancelled">Cancelled</option>
						  <option value="stalled">Stalled</option>
						</select>
						@if( $errors->has('status') )
			            	<span class="help-block">{{ $errors->first('status') }}</span>
			            @endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default">Create project</button>
					</div>

				</form>

			</div>
		</div>
	</div>
@stop