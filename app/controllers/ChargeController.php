<?php

class ChargeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$charges = Charge::get();

		return View::make('charges.index')
			->withCharges($charges);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$lines = Line::get();
		$users = User::where('company_id', 1)->get();

		return View::make('charges.create')
			->withLines($lines)
			->withUsers($users);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$valid = Validator::make(Input::all(), [
			'line_id' => 'required',
			'user_id' => 'required',
			'hours' => 'required|numeric',
		]);

		if ( !$valid->fails() ) 
		{
			$charge = new Charge;

			$charge->line_id = Input::get('line_id');
			$charge->user_id = Input::get('user_id');
			$charge->hours = Input::get('hours');

			$charge->save();

			return Redirect::route('charge.index')->with('info', "You have successfully added a charge to the database.");
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
		$charge = Charge::where('id', Request::segment(2))->first();
		$line = Line::where('id', $charge->line_id)->first();
		$user = User::where('id', $charge->user_id)->first();

		return View::make('charges.show')
			->withCharge($charge)
			->withLine($line)
			->withUser($user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$charge = Charge::where('id', Request::segment(2))->first();
		$lines = Line::get();
		$users = User::where('company_id', 1)->get();

		return View::make('charges.edit')
			->withCharge($charge)
			->withLines($lines)
			->withUsers($users);
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
			'hours' => 'numeric',
		]);

		if ( !$valid->fails() ) 
		{
			$charge = Charge::where('id', Request::segment(2))->first();

			if ( Input::has('line_id') ) {
				$charge->line_id = Input::get('line_id');
			}

			if ( Input::has('user_id') ) {
				$charge->user_id = Input::get('user_id');
			}

			if ( Input::has('hours') ) {
				$charge->hours = Input::get('hours');
			}

			$charge->save();

			return Redirect::route('charge.index')->with('info', "You have updated the charge created on " . Carbon::parse($charge->created_at)->toDayDateTimeString() . ".");

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
		$charge = Charge::where('id', Request::segment(2))->first();

		$charge->hidden = 1;
		$charge->save();

		return Redirect::route('charge.index')->with('info', "You have deleted this charge.");

	}


}
