<?php

class DomainController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$domains = Domain::orderBy('domain')->get();

		return View::make('domains.index')
			->withDomains($domains);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$servers = Server::get();
		$providers = Provider::get();

		return View::make('domains.create')
			->withServers($servers)
			->withProviders($providers);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$valid = Validator::make(Input::all(), [
			'server_id' => 'required',
			'provider_id' => 'required',
			'domain' => 'required|max:255',
			'status' => 'required',
		]);

		if ( !$valid->fails() ) 
		{
			$domain = new Domain;

			$domain->server_id = Input::get('server_id');
			$domain->provider_id = Input::get('provider_id');
			$domain->domain = Input::get('domain');
			$domain->status = Input::get('status');

			$domain->save();

			return Redirect::route('domain.index')->with('info', "You have successfully added a domain to the database.");
		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$domain = Domain::where('id', Request::segment(2))->first();

		$server = Server::where('id', $domain->server_id)->first();
		$provider = Provider::where('id', $domain->provider_id)->first();

		return View::make('domains.show')
			->withDomain($domain)
			->withServer($server)
			->withProvider($provider);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$domain = Domain::where('id', Request::segment(2))->first();

		$servers = Server::get();
		$providers = Provider::get();

		return View::make('domains.edit')
			->withDomain($domain)
			->withServers($servers)
			->withProviders($providers);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$valid = Validator::make(Input::all(), [
			'server_id' => 'required',
			'domain' => 'required|max:255',
		]);

		if ( !$valid->fails() ) 
		{
			$domain = Domain::where('id', Request::segment(2))->first();

			if ( Input::has('server_id') ) {
				$domain->server_id = Input::get('server_id');
			}

			if ( Input::has('provider_id') ) {
				$domain->provider_id = Input::get('provider_id');
			}
			
			if ( Input::has('domain') ) {
				$domain->domain = Input::get('domain');
			}
			
			if ( Input::has('status') ) {
				$domain->status = Input::get('status');
			}

			$domain->save();

			return Redirect::route('domain.index')->with('info', "You have edited " . $domain->domain . "." );

		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$domain = Domain::where('id', Request::segment(2))->first();

		$domain->hidden = 1;
		$domain->save();

		return Redirect::route('domain.index')->with('info', "You deleted this domain.");

	}


}
