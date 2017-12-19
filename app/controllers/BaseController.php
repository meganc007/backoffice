<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function index()
	{
		$user = Auth::user();
		$projects = Project::where('user_id', $user->id)->get();
		$company = Company::where('id', $user->company_id)->first();
		$users = User::where('company_id', $user->company_id)->orderBy('department')->get();

		$servers = Server::where('company_id', $user->company_id)->get();

		return View::make('index')
			->withUser($user)
			->withProjects($projects)
			->withCompany($company)
			->withUsers($users)
			->withServers($servers);
	}

}
