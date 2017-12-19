<?php

class ServerController extends \BaseController {

	public function index()
	{

		$servers = Server::orderBy('username')->get();

		return View::make('servers.index')
			->withServers($servers);
	}

	public function create()
	{

		$providers = Provider::get();
		$companies = Company::get();

		return View::make('servers.create')
			->withProviders($providers)
			->withCompanies($companies);
	}

	public function store()
	{
		$valid = Validator::make(Input::all(), [
			'company_id' => 'required|integer',
			'username' => 'required|max:255',
			'url' => 'required|max:255',
			'password' => 'required|max:255',
			'status' => 'required|max:255',
		]);

		if ( !$valid->fails() ) 
		{
			$server = new Server;

			$server->provider_id = Input::get('provider_id');
			$server->company_id = Input::get('company_id');
			$server->username = Input::get('username');
			$server->url = Input::get('url');
			$server->password = Input::get('password');
			$server->status = Input::get('status');

			$server->save();

			return Redirect::route('server.index')->with('info', "You have successfully added a server to the database.");
		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}

	}

	public function show($id)
	{
		$server = Server::where('id', Request::segment(2))->first();

		$provider = Provider::where('id', $server->provider_id)->first();
		$company = Company::where('id', $server->company_id)->first();

		return View::make('servers.show')
			->withServer($server)
			->withProvider($provider)
			->withCompany($company);
	}

	public function edit($id)
	{
		$server = Server::where('id', Request::segment(2))->first();

		$providers = Provider::get();
		$companies = Company::get();

		return View::make('servers.edit')
			->withServer($server)
			->withProviders($providers)
			->withCompanies($companies);
	}

	public function update($id)
	{
		$valid = Validator::make(Input::all(), [
			'company_id' => 'required|integer',
			'username' => 'required|max:255',
			'url' => 'required|max:255',
			'password' => 'required|max:255',
		]);

		if ( !$valid->fails() ) {
			$server = Server::where('id', Request::segment(2))->first();

			if ( Input::has('provider_id') ) {
				$server->provider_id = Input::get('provider_id');
			}

			if ( Input::has('company_id') ) {
				$server->company_id = Input::get('company_id');
			}

			if ( Input::has('username') ) {
				$server->username = Input::get('username');
			}

			if ( Input::has('url') ) {
				$server->url = Input::get('url');
			}

			if ( Input::has('password') ) {
				$server->password = Input::get('password');
			}

			if ( Input::has('status') ) {
				$server->status = Input::get('status');
			}

			$server->save();

			return Redirect::route('server.index')->with('info', "You have successfully edited " . $server->username . ".");

		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}
	}

	public function destroy($id)
	{
		$server = Server::where('id', Request::segment(2))->first();

		$server->hidden = 1;
		$server->save();

		return Redirect::route('server.index')->with('info', "You have deleted this server.");
	}


}
