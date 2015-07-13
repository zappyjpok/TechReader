<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Controllers\Controller;
use Request;

class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //get all categories
        $categories = Category::all();

        return view('categories.index')->with([
            'categories' => $categories
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateCategoryRequest $request)
	{
		//
        $input = $request->all();
        Category::create($input);
        return redirect ('categories');
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
		//find category
        $category = Category::findOrFail($id);

        return view('categories.edit')->with([
            'category'      => $category
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateCategoryRequest $request, $id)
	{
		//find and update category
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->action('CategoriesController@index');
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
        $categories = Category::findOrFail($id);
        $categories->delete();

        return redirect ('categories');
	}

}
