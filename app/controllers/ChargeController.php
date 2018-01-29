<?php

class ChargeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if ( Auth::user()->company_id != 1 ) {

			$project_id = Project::where('company_id', Auth::user()->company_id)
				->select('id')->get();

			//removes the project ids from inside the nested array
			$result = array();
			foreach ($project_id as $key => $val) {
				$result[] = $val->id;
			}
			//finds the lines that match the project ids found in the above query
			$line_id = Line::whereIn('project_id', $result)->select('id')->get();


			//removes the line ids from inside the nested array
			$result = array();
			foreach ($line_id as $key => $val) {
				$result[] = $val->id;
			}
			//finds the charges that match the line ids found in the above query
			$charges = Charge::whereIn('line_id', $result)->get();

		}
		else {
			$charges = Charge::get();
		}
		

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
		$projects = Project::get();
		$users = User::where('company_id', 1)->get();

		return View::make('charges.create')
			->withProjects($projects)
			->withUsers($users);
	}

	public function change() 
	{
		$project_id = Input::get('project_id');

		$lines = Line::where('project_id', $project_id)->get();

		return $lines;
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
		$projects = Project::get();
		$charge = Charge::where('id', Request::segment(2))->first();
		$users = User::where('company_id', 1)->get();

		return View::make('charges.edit')
			->withProjects($projects)
			->withCharge($charge)
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
