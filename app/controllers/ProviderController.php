<?php

class ProviderController extends \BaseController {


	public function index()
	{
		$providers = Provider::orderBy('name')->get();

		return View::make('providers.index')
			->withProviders($providers);
	}


	public function create()
	{
		return View::make('providers.create');
	}


	public function store()
	{
		$valid = Validator::make(Input::all(), [
			'name' => 'required',
			'type' => 'required',
		]);

		if ( !$valid->fails() ) {
			$provider = new Provider;

			$provider->name = Input::get('name');
			$provider->type = Input::get('type');
			$provider->save();

			return Redirect::route('provider.index')->with('info', "You have successfully added a provider to the database.");

		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}
	}


	public function show($id)
	{
		$provider = Provider::where('id', Request::segment(2))->first();

		return View::make('providers.show')
			->withProvider($provider);
	}


	public function edit($id)
	{
		$provider = Provider::where('id', Request::segment(2))->first();

		return View::make('providers.edit')
			->withProvider($provider);
	}


	public function update($id)
	{
		$valid = Validator::make(Input::all(), [
			'name' => 'required',
		]);

		if ( !$valid->fails() ) 
		{
			$provider = Provider::where('id', Request::segment(2))->first();

			if ( Input::has('name') ) {
				$provider->name = Input::get('name');
			}

			if ( Input::has('type') ) {
				$provider->type = Input::get('type');
			}

			$provider->save();

			return Redirect::route('provider.index')->with('info', "You have edited " . $provider->name . ".");
		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}
	}


	public function destroy($id)
	{
		$provider = Provider::where('id', Request::segment(2))->first();

		$provider->hidden = 1;
		$provider->save();

		return Redirect::route('provider.index')->with('info', "You have deleted this provider.");
	}


}
