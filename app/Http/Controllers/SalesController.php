<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SaleRequest;
use App\Http\Controllers\Controller;

use App\Product;
use App\Sale;
use Illuminate\Http\Request;


class SalesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return 'hello';
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($name)
	{
		//
        $product = Product::where('proTitle', $name)->first();
        $discounts = [.05, .1, .15, .2, .25, .3, .35, .4, .45, .50, .55, .60, .65, .70, .75, .80, .85, .90, .95];

        return view('sales.create')->with([
            'product'   => $product,
            'discounts'  => $discounts
        ]);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(SaleRequest $request)
	{
        $input = $request->all();
        $sale = Sale::create($input);
        return $input;
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

}
