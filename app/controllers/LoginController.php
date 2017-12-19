<?php

class LoginController extends \BaseController {

	
	public function index()
	{
		$logins = Login::orderBy('company_id')->get();

		return View::make('logins.index')
			->withLogins($logins);
	}

	
	public function create()
	{
		$companies = Company::get();
		$servers = Server::get();
		$domains = Domain::get();

		return View::make('logins.create')
			->withCompanies($companies)
			->withServers($servers)
			->withDomains($domains);
	}


	public function store()
	{
		$valid = Validator::make(Input::all(), [
			'company_id' => 'required',
			'server_id' => 'required',
			'domain_id' => 'required',
			'username' => 'required|max:255',
			'password' => 'required|max:255',
			'login_type' => 'required|max:255',
			'url' => 'required|max:255',
		]);

		if ( !$valid->fails() ) 
		{
			$login = new Login;

			$login->company_id = Input::get('company_id');
			$login->server_id = Input::get('server_id');
			$login->domain_id = Input::get('domain_id');
			$login->username = Input::get('username');
			$login->password = Input::get('password');
			$login->login_type = Input::get('login_type');
			$login->url = Input::get('url');
			$login->comments = Input::get('comments');

			$login->save();

			return Redirect::route('login.index')->with('info', "You have successfully added a login to the database.");
		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}
	}


	public function show($id)
	{
		$login = Login::where('id', Request::segment(2))->first();

		$company = Company::where('id', $login->company_id)->first();
		$server = Server::where('id', $login->server_id)->first();
		$domain = Domain::where('id', $login->domain_id)->first();

		return View::make('logins.show')
			->withLogin($login)
			->withCompany($company)
			->withServer($server)
			->withDomain($domain);
	}


	public function edit($id)
	{
		$login = Login::where('id', Request::segment(2))->first();

		$companies = Company::get();
		$servers = Server::get();
		$domains = Domain::get();	

		return View::make('logins.edit')
			->withLogin($login)
			->withCompanies($companies)
			->withServers($servers)
			->withDomains($domains);
	}


	public function update($id)
	{
		$valid = Validator::make(Input::all(), [
			'company_id' => 'required',
			'username' => 'required|max:255',
			'password' => 'required|max:255',
		]);

		if ( !$valid->fails() ) 
		{
			$login = Login::where('id', Request::segment(2))->first();

			if ( Input::has('company_id') ) {
				$login->company_id = Input::get('company_id');
			}

			if ( Input::has('server_id') ) {
				$login->server_id = Input::get('server_id');
			}

			if ( Input::has('domain_id') ) {
				$login->domain_id = Input::get('domain_id');
			}

			if ( Input::has('username') ) {
				$login->username = Input::get('username');
			}
			
			if ( Input::has('password') ) {
				$login->password = Input::get('password');
			}
			
			if ( Input::has('login_type') ) {
				$login->login_type = Input::get('login_type');
			}
			
			if ( Input::has('url') ) {
				$login->url = Input::get('url');
			}

			if ( Input::has('comments') ) {
				$login->comments = Input::get('comments');
			}

			$login->save();

			return Redirect::route('login.index')->with('info', "You have successfully edited the " . $login->username . " login.");
		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}
	}


	public function destroy($id)
	{
		$login = Login::where('id', Request::segment(2))->first();

		$login->hidden = 1;
		$login->save();

		return Redirect::route('login.index')->with('info', "You have deleted this login.");
	}


}
