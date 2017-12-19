<?php

class LineController extends \BaseController {

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
			$lines = Line::whereIn('project_id', $result)->get();
		}
		else {
			$lines = Line::get();
		}

		return View::make('lines.index')
			->withLines($lines);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$projects = Project::get();

		return View::make('lines.create')
			->withProjects($projects);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$valid = Validator::make(Input::all(), [
			'project_id' => 'required',
			'description' => 'required',
			'type' => 'required',
			'hours' => 'numeric',
		]);

		if ( !$valid->fails() ) 
		{
			$line = new Line;

			$line->project_id = Input::get('project_id');
			$line->description = Input::get('description');
			$line->type = Input::get('type');

			if ( Input::get('type') == 'admin' || Input::get('type') == 'content' || Input::get('type') == 'design' ) {
				$line->price = '87.50';
			}
			elseif ( Input::get('type') == 'flash' || Input::get('type') == 'programming' ) {
				$line->price = '100';
			}
			elseif (Input::get('type') == 'seo') {
				$line->price = '95';
			}
			else {
				$line->price = '0';
			}

			$line->hours = Input::get('hours');

			$line->save();

			return Redirect::route('line.index')->with('info', "You have successfully added a line item to the database.");
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
		$line = Line::where('id', Request::segment(2))->first();
		$project = Project::where('id', $line->project_id)->first();

		return View::make('lines.show')
			->withLine($line)
			->withProject($project);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$line = Line::where('id', Request::segment(2))->first();
		$projects = Project::get();

		return View::make('lines.edit')
			->withLine($line)
			->withProjects($projects);
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
			'project_id' => 'required',
			'description' => 'required',
		]);

		if ( !$valid->fails() ) 
		{
			$line = Line::where('id', Request::segment(2))->first();

			if ( Input::has('project_id') ) {
				$line->project_id = Input::get('project_id');
			}

			if ( Input::has('description') ) {
				$line->description = Input::get('description');
			}

			if ( Input::has('type') ) {
				$line->type = Input::get('type');

				if ( Input::get('type') == 'admin' || Input::get('type') == 'content' || Input::get('type') == 'design' ) {
					$line->price = '87.50';
				}
				elseif ( Input::get('type') == 'flash' || Input::get('type') == 'programming' ) {
					$line->price = '100';
				}
				elseif (Input::get('type') == 'seo') {
					$line->price = '95';
				}
			}

			if ( Input::has('hours') ) {
				$line->hours = Input::get('hours');
			}

			$line->save();

			return Redirect::route('line.index')->with('info', "You have edited " . $line->description . ".");

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
		$line = Line::where('id', Request::segment(2))->first();

		$line->hidden = 1;
		$line->save();

		return Redirect::route('line.index')->with('info', "You have deleted this line item.");

	}


}
