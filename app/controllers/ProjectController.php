<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if ( Auth::user()->company_id != 1 ) {
			$projects = Project::where('company_id', Auth::user()->company_id)->
				orderBy('created_at')->get();
		}
		else {

			$projects = Project::orderBy('created_at')->get();

		}

		return View::make('projects.index')
			->withProjects($projects);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$companies = Company::get();
		$users = User::where('company_id', 1)->get();

		return View::make('projects.create')
			->withCompanies($companies)
			->withUsers($users);
	}

	public function change() 
	{
		$company_id = Input::get('company_id');

		$servers = Server::select('id')->where('company_id', $company_id)->get();

		//removes the server ids from inside the nested array
		$result = array();
		foreach ($servers as $key => $val) {
			$result[] = $val->id;
		}

		//finds the domains that match the server ids found in the above query
		$domains = Domain::whereIn('server_id', $result)->get();

		return $domains;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$valid = Validator::make(Input::all(), [
			'company_id' => 'required',
			'domain_id' => 'required',
			'user_id' => 'required',
			'name' => 'required|max:255',
			'type' => 'required',
			'status' => 'required',
		]);

		if ( !$valid->fails() ) 
		{
			$project = new Project;

			$project->company_id = Input::get('company_id');
			$project->domain_id = Input::get('domain_id');
			$project->user_id = Input::get('user_id');
			$project->name = Input::get('name');
			$project->type = Input::get('type');
			$project->status = Input::get('status');
			$project->status_date = Carbon::now();

			$project->save();

			return Redirect::route('project.index')->with('info', "You have successfully created a project.");
			
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
		$project = Project::where('id', Request::segment(2))->first();

		$user = User::where('id', $project->user_id)->first();
		$company = Company::where('id', $project->company_id)->first();
		$domain = Domain::where('id', $project->domain_id)->first();

		return View::make('projects.show')
			->withProject($project)
			->withUser($user)
			->withCompany($company)
			->withDomain($domain);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = Project::where('id', Request::segment(2))->first();

		$companies = Company::get();
		$users = User::where('company_id', 1)->get();
		
		return View::make('projects.edit')
			->withProject($project)
			->withCompanies($companies)
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
			'company_id' => 'required',
			'name' => 'required',
		]);

		if ( !$valid->fails() ) 
		{
			$project = Project::where('id', Request::segment(2))->first();

			if ( Input::has('company_id') ) {
				$project->company_id = Input::get('company_id');
			}

			if ( Input::has('domain_id') ) {
				$project->domain_id = Input::get('domain_id');
			}

			if ( Input::has('user_id') ) {
				$project->user_id = Input::get('user_id');
			}

			if ( Input::has('name') ) {
				$project->name = Input::get('name');
			}

			if ( Input::has('type') ) {
				$project->type = Input::get('type');
			}

			if ( Input::has('status') ) {
				$project->status = Input::get('status');
				$project->status_date = Carbon::now();
			}

			$project->save();

			return Redirect::route('project.index')->with('info', "You have updated " . $project->name . ".");
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
		$project = Project::where('id', Request::segment(2))->first();

		$project->hidden = 1;
		$project->save();

		return Redirect::route('project.index')->with('info', "You deleted this project.");
	}


}
