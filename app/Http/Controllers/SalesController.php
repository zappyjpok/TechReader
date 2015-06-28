<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SaleRequest;
use App\Http\Controllers\Controller;

use App\Product;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


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
        $discounts = [
            '.05' => '%5',
            '.1' => '%10',
            '.15' => '%15',
            '.2' => '%20',
            '.25' => '%25',
            '.3' => '%30',
            '.35' => '%35',
            '.40' => '%40',
            '.45' => '%45',
            '.50' => '%50',
            '.55' => '%55',
            '.60' => '%60',
            '.65' => '%65',
            '.70' => '%70',
            '.75' => '%75',
            '.80' => '%80',
            '.85' => '%85',
            '.90' => '%90',
            '.95' => '%95',
        ];

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
        //get values
        $input = $request->all();
        // Turn discount into a number
        $discount = (float)$input['salDiscount'];

        // Add values to database
        $sale = new Sale();
        $sale->salStart = $input['salStart'];
        $sale->salFinish = $input['salFinish'];
        $sale->salDiscount = $discount;
        $sale->salProductId = $input['salProductId'];
        $sale->save();

        return redirect('products');
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
	public function edit($name)
	{
		//
        $product = Product::where('proTitle', $name)->first();
        $products = Product::where('proTitle', $name)->get();
        $productId = $products->first()->id;
        $sale = DB::table('sales')
            ->where('salProductId', '=', $productId)
            ->where('salStart', '<=', Carbon::now())
            ->where('salFinish', '>=', Carbon::now())
            ->first()
            ->id;


        $discounts = [
            '.05' => '%5',
            '.1' => '%10',
            '.15' => '%15',
            '.2' => '%20',
            '.25' => '%25',
            '.3' => '%30',
            '.35' => '%35',
            '.40' => '%40',
            '.45' => '%45',
            '.50' => '%50',
            '.55' => '%55',
            '.60' => '%60',
            '.65' => '%65',
            '.70' => '%70',
            '.75' => '%75',
            '.80' => '%80',
            '.85' => '%85',
            '.90' => '%90',
            '.95' => '%95',
        ];

        return view('sales.edit')->with([
            'product'   => $product,
            'discounts'  => $discounts,
            'sale' => $sale
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(SaleRequest $request)
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
