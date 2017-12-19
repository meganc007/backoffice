<?php

class CompanyController extends BaseController {

	public function index()
	{
		$companies = Company::orderBy('name')->get();
		return View::make('company.index')
			->withCompanies($companies);
	}

	public function create()
	{

		$users = User::where('company_id', 1)->where('department', 'sales')->get();
		$categories = Category::get();

		return View::make('company.create')
			->withUsers($users)
			->withCategories($categories);
	}

	public function store()
	{
		$valid = Validator::make(Input::all(), [
			'name' => 'required|max:255',
			'user_id' => 'required',
		]);


		if ( !$valid->fails() ) {
			$company = new Company;
			$company->name = Input::get('name');
			$company->user_id = Input::get('user_id');
			$company->address = Input::get('address');
			$company->city = Input::get('city');
			$company->state = Input::get('state');
			$company->zip = Input::get('zip');
			$company->phone = Input::get('phone');
			$company->category_id = Input::get('category_id');
			$company->save();

			return Redirect::route('company.index')->with('info', 'You have successfully added a company to the database.');
		}
		else {
			return Redirect::back()->withErrors($valid);
		}
	}

	public function show()
	{
		$company = Company::where('id', Request::segment(2) )->first();

		$user = User::where('id', $company->user_id)->first();

		$category = Category::where('id', $company->category_id)->first();

		return View::make('company.show')
			->withCompany($company)
			->withUser($user)
			->withCategory($category);
	}

	public function edit()
	{
		$company = Company::where('id', Request::segment(2) )->first();

		$users = User::where('company_id', 1)->where('department', 'sales')->get();
		$categories = Category::get();

		return View::make('company.edit')
			->withCompany($company)
			->withUsers($users)
			->withCategories($categories);
	}

	public function update()
	{
		$valid = Validator::make(Input::all(), [
			'name' => 'required|max:255',
			'user_id' => 'required',
		]);

		if ( !$valid->fails() ) {
			$company = Company::where('id', Request::segment(2) )->first();

			if ( Input::has('name') ) {
				$company->name = Input::get('name');
			}

			if ( Input::has('user_id') ) {
				$company->user_id = Input::get('user_id');
			}

			if ( Input::has('address') ) {
				$company->address = Input::get('address');
			}
			
			if ( Input::has('city') ) {
				$company->city = Input::get('city');
			}

			if ( Input::has('state') ) {
				$company->state = Input::get('state');
			}

			if ( Input::has('zip') ) {
				$company->zip = Input::get('zip');
			}
			
			if ( Input::has('phone') ) {
				$company->phone = Input::get('phone');
			}
			
			if ( Input::has('category_id') ) {
				$company->category_id = Input::get('category_id');
			}

			$company->save();

			return Redirect::route('company.index')->with('info', "You have successfully edited " . $company->name . " .");
		}
		else {
			return Redirect::back()->withErrors($valid);
		}
	}

	public function destroy()
	{

		$company = Company::where('id', Request::segment(2) )->first();

		$company->hidden = 1;
		$company->save();

		return Redirect::route('company.index')->with('info', "You have deleted this company.");
	}

}//end CompanyController