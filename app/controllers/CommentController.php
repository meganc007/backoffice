<?php

class CommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('comments.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$companies = Company::get();
		$users = User::get();

		return View::make('comments.create')
			->withCompanies($companies)
			->withUsers($users);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function change() 
	{
		$company_id = Input::get('company_id');

		$projects = Project::where('company_id', $company_id)->get();

		return $projects;
	}

	public function lineChange()
	{
		$project_id = Input::get('project_id');

		$lines = Line::where('project_id', $project_id)->get();

		return $lines;
	}

	public function chargeChange()
	{
		$line_id = Input::get('line_id');

		$charges = Charge::where('line_id', $line_id)->get();
	
		return $charges;
	}



}
