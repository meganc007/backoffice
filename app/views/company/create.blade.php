@extends('templates.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h1>Add a Company</h1>

				@if ( isset($users) )
					<form action="{{ route('company.store') }}" method="POST">
						{{ Form::token(); }}

						<div class="form-group {{ $errors->has('name') ? ' has-error' : ''}}">
						    <label for="name">Company Name</label>
						    <input type="text" class="form-control" name="name" placeholder="XYZ Corporation" value="{{ Request::old('name') ?: '' }}">
						    @if( $errors->has('name') )
						    	<span class="help-block">{{ $errors->first('name') }}</span>
						    @endif
						</div>

						<div class="form-group {{ $errors->has('user_id') ? ' has-error' : ''}}">
							<label for="user_id">Salesperson</label>
							<select class="form-control" name="user_id" size="1">
								<option value="" selected disabled>Choose one of the following</option>
								@foreach ($users as $user)
									<option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
								@endforeach
							</select>
							@if( $errors->has('user_id') )
								<span class="help-block">{{ $errors->first('user_id') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('address') ? ' has-error' : ''}}">
							<label for="address">Street Address</label>
							<input type="text" class="form-control" name="address" placeholder="123 Main St." value="{{ Request::old('address') ?: '' }}">
							@if( $errors->has('address') )
								<span class="help-block">{{ $errors->first('address') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('city') ? ' has-error' : ''}}">
							<label for="city">City</label>
							<input type="text" class="form-control" name="city" placeholder="Panama City" value="{{ Request::old('city') ?: '' }}">
							@if( $errors->has('city') )
								<span class="help-block">{{ $errors->first('city') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('state') ? ' has-error' : ''}}">
							<label for="state">State</label>
							<select class="form-control" name="state" size="1" >
								<option value="" selected disabled>Choose one of the following</option>
								<option value="AL" id="AL">Alabama</option>
								<option value="AK" id="AK">Alaska</option>
								<option value="AZ" id="AZ">Arizona</option>
								<option value="AR" id="AR">Arkansas</option>
								<option value="CA" id="CA">California</option>
								<option value="CO" id="CO">Colorado</option>
								<option value="CT" id="CT">Connecticut</option>
								<option value="DE" id="DE">Delaware</option>
								<option value="DC" id="DC">Dist of Columbia</option>
								<option value="FL" id="FL">Florida</option>
								<option value="GA" id="GA">Georgia</option>
								<option value="HI" id="HI">Hawaii</option>
								<option value="ID" id="ID">Idaho</option>
								<option value="IL" id="IL">Illinois</option>
								<option value="IN" id="IN">Indiana</option>
								<option value="IA" id="LA">Iowa</option>
								<option value="KS" id="KS">Kansas</option>
								<option value="KY" id="KY">Kentucky</option>
								<option value="LA" id="LA">Louisiana</option>
								<option value="ME" id="ME">Maine</option>
								<option value="MD" id="MD">Maryland</option>
								<option value="MA" id="MA">Massachusetts</option>
								<option value="MI" id="MI">Michigan</option>
								<option value="MN" id="MN">Minnesota</option>
								<option value="MS" id="MS">Mississippi</option>
								<option value="MO" id="MO">Missouri</option>
								<option value="MT" id="MT">Montana</option>
								<option value="NE" id="NE">Nebraska</option>
								<option value="NV" id="NV">Nevada</option>
								<option value="NH" id="NH">New Hampshire</option>
								<option value="NJ" id="NJ">New Jersey</option>
								<option value="NM" id="NM">New Mexico</option>
								<option value="NY" id="NY">New York</option>
								<option value="NC" id="NC">North Carolina</option>
								<option value="ND" id="ND">North Dakota</option>
								<option value="OH" id="OH">Ohio</option>
								<option value="OK" id="OK">Oklahoma</option>
								<option value="OR" id="OR">Oregon</option>
								<option value="PA" id="PA">Pennsylvania</option>
								<option value="RI" id="RI">Rhode Island</option>
								<option value="SC" id="SC">South Carolina</option>
								<option value="SD" id="SD">South Dakota</option>
								<option value="TN" id="TN">Tennessee</option>
								<option value="TX" id="TX">Texas</option>
								<option value="UT" id="UT">Utah</option>
								<option value="VT" id="VT">Vermont</option>
								<option value="VA" id="VA">Virginia</option>
								<option value="WA" id="WA">Washington</option>
								<option value="WV" id="WV">West Virginia</option>
								<option value="WI" id="WI">Wisconsin</option>
								<option value="WY" id="WY">Wyoming</option>
							</select>
							@if( $errors->has('state') )
								<span class="help-block">{{ $errors->first('state') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('zip') ? ' has-error' : ''}}">
							<label for="zip">Zip Code</label>
							<input type="text" class="form-control" name="zip" placeholder="32401" value="{{ Request::old('zip') ?: '' }}">
							@if( $errors->has('zip') )
								<span class="help-block">{{ $errors->first('zip') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('phone') ? ' has-error' : ''}}">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" name="phone" placeholder="(850) 867-5309" value="{{ Request::old('phone') ?: '' }}">
							@if( $errors->has('phone') )
								<span class="help-block">{{ $errors->first('phone') }}</span>
							@endif
						</div>

						@if ( isset($categories) )
							<div class="form-group {{ $errors->has('category_id') ? ' has-error' : ''}}">
								<label for="category_id">Company Category</label>
								<select class="form-control" name="category_id">
									<option value="" selected disabled>Choose one of the following</option>
									@foreach ($categories as $category)
										<option value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
								</select>
								@if( $errors->has('category_id') )
									<span class="help-block">{{ $errors->first('category_id') }}</span>
								@endif
							</div>
						@endif

						<div class="form-group">
							<button type="submit" class="btn btn-default">Add company</button>
						</div>

					</form>
				@endif

			</div>
		</div>
	</div>
@stop