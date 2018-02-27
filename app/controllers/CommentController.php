<?php

class CommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$company_ids = Comment::distinct()->lists('company_id');
		
		return View::make('comments.index')
			->withIds($company_ids);
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
		$valid = Validator::make( Input::all(), [
			'company_id' => 'required',
			'user_id' => 'required',
			'comment' => 'required',
			'internal' => 'required',
		]);

		if ( !$valid->fails() ) 
		{
			$comment = new Comment;

			if ( Input::has('company_id') ) {
				$comment->company_id = Input::get('company_id');
			}

			if ( Input::has('user_id') ) {
				$comment->user_id = Input::get('user_id');
			}

			if ( Input::has('project_id') ) {
				$comment->project_id = Input::get('project_id');
			}

			if ( Input::has('line_id') ) {
				$comment->line_id = Input::get('line_id');
			}

			if ( Input::has('charges_id') ) {
				$comment->charges_id = Input::get('charges_id');
			}

			if ( Input::has('comment') ) {
				$comment->comment = Input::get('comment');
			}

			if ( Input::has('internal') ) {
				$comment->internal = Input::get('internal');
			}

			$comment->save();

			return Redirect::route('comment.index')->with('info', "You have successfully created a comment.");
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
