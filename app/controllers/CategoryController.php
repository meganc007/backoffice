<?php

class CategoryController extends \BaseController {

	
	public function index()
	{
		$categories = Category::orderBy('name')->get();

		return View::make('categories.index')
			->withCategories($categories);
	}

	
	public function create()
	{
		return View::make('categories.create');
	}


	public function store()
	{
		$valid = Validator::make(Input::all(), [
			'name' => 'required|max:255|unique:categories',
		]);

		if ( !$valid->fails() ) 
		{
			$category = new Category;
			$category->name = Input::get('name');
			$category->save();

			return Redirect::route('category.index')->with('info', "You have successfully added a category to the database.");
		}
		else 
		{
			return Redirect::back()->withErrors($valid);
		}
	}


	public function show($id)
	{
		$category = Category::where('id', Request::segment(2))->first();

		return View::make('categories.show')
			->withCategory($category);
	}


	public function edit($id)
	{
		$category = Category::where('id', Request::segment(2))->first();

		return View::make('categories.edit')
			->withCategory($category);
	}


	public function update($id)
	{
		$valid = Validator::make(Input::all(), [
			'name' => 'required',
		]);

		if ( !$valid->fails() ) 
		{
			$category = Category::where('id', Request::segment(2))->first();

			if ( Input::has('name') ) {
				$category->name = Input::get('name');
			}

			$category->save();

			return Redirect::route('category.index')->with('info', "You have successfully updated " . $category->name . ".");
		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}
	}


	public function destroy($id)
	{
		$category = Category::where('id', Request::segment(2))->first();

		$category->hidden = 1;
		$category->save();

		return Redirect::route('category.index')->with('info', "You have deleted this category.");

	}


}
