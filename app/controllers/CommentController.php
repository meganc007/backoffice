<?php

class CommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$comments = Comment::get();

		return View::make('comments.index')
			->withComments($comments);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$valid = Validator::make(Input::all(), [
			'comment' => 'required',
			'internal' => 'required',
		]);

		if ( !$valid->fails() ) 
		{

			$comment = new Comment;

			if ( Auth::check() ) {
				$comment->user_id = Auth::user()->id;
			}

			if ( Input::has('post_id') ) {
				$comment->post_id = Input::get('post_id');
			}

			if ( Input::has('comment_id') ) {
				$comment->parent_id = Input::get('comment_id');
			}

			if ( Input::has('comment') ) {
				$comment->comment = Input::get('comment');
			}
			
			if ( Input::has('internal') ) {
				$comment->internal = Input::get('internal');
			}

			$comment->save();

			return Redirect::back()->with('info', "Your comment was successfully added.");

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
		$comments = Comment::get();

		return View::make('comments.show')
			->withComments($comments);
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

	
}
