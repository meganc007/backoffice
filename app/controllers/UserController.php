<?php

class UserController extends \BaseController {

	public function getSignin()
	{
		return View::make('signin');
	}

	public function postSignin()
	{
		$valid = Validator::make(Input::all(), [
			'email' => 'required|email',
			'password' => 'required',
		]);

		if ( !$valid->fails() ) 
		{
			if( Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]) ) 
			{
				return Redirect::route('index')->with('info', "You have successfully signed in.");
			}
		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}
	}

	public function getSignout() 
	{
		if ( Auth::check() ) 
		{
			Auth::logout();

			return Redirect::route('index');
		}
		else 
		{
			return Redirect::back()->with('info', 'Sorry, there was a problem.');
		}
	}



	public function index()
	{
		$users = User::orderBy('company_id')->get();

		return View::make('users.index')
			->withUsers($users);
	}

	public function create()
	{
		$companies = Company::get();

		return View::make('users.create')
			->withCompanies($companies);

	}

	public function store()
	{
		$valid = Validator::make( Input::all(), [
			'fname' => 'required|max:255',
			'lname' => 'required|max:255',
			'company_id' => 'required',
			'email' => 'required|email|max:255',
			'status' => 'required',
			'password' => 'required|same:confirm_password',
			'confirm_password' => 'required|same:password',
		]);

		if ( !$valid->fails() ) 
		{
			$user = new User;
			$user->fname = Input::get('fname');
			$user->lname = Input::get('lname');
			$user->company_id = Input::get('company_id');
			$user->email = Input::get('email');
			$user->department = Input::get('department');
			$user->status = Input::get('status');
			$user->phone = Input::get('phone');
			$user->password = Hash::make( Input::get('password') );
			$user->save();

			return Redirect::route('user.index')->with('info', 'You have successfully added a user to the database.');
		}
		else 
		{
			return Redirect::back()->withErrors($valid);
		}
	}

	public function show($id)
	{
		$user = User::where('id', Request::segment(2))->first();
		$company = Company::where('id', $user->company_id )->first();

		return View::make('users.show')
			->withUser($user)
			->withCompany($company);
	}

	public function edit($id)
	{
		$user = User::where('id', Request::segment(2))->first();

		$companies = Company::get();

		return View::make('users.edit')
			->withUser($user)
			->withCompanies($companies);
	}

	public function update($id)
	{
		$valid = Validator::make(Input::all(), [
			'fname' => 'required',
			'lname' => 'required|max:255',
			'company_id' => 'required',
			'email' => 'required|email|max:255',
		]);

		if ( !$valid->fails() ) 
		{
			$user = User::where('id', Request::segment(2))->first();

			if ( Input::has('fname') ) {
				$user->fname = Input::get('fname');
			}

			if ( Input::has('lname') ) {
				$user->lname = Input::get('lname');
			}

			if ( Input::has('company_id') ) {
				$user->company_id = Input::get('company_id');
			}

			if ( Input::has('email') ) {
				$user->email = Input::get('email');
			}

			if ( Input::has('department') ) {
				$user->department = Input::get('department');
			}

			if ( Input::has('status') ) {
				$user->status = Input::get('status');
			}

			if ( Input::has('phone') ) {
				$user->phone = Input::get('phone');
			}

			$user->save();

			return Redirect::route('user.index')->with('info', "You have successfully edited " . $user->fname . " " . $user->lname . ".");
		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}
	}

	public function destroy($id)
	{
		$user = User::where('id', Request::segment(2))->first();

		$user->hidden = 1;
		$user->save();

		return Redirect::route('user.index')->with('info', "You have deleted this user.");
	}


}
