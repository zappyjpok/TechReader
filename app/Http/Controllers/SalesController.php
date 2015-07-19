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
     * Only admins are allowed to view this page except index
     *
     */
    public function __construct()
    {
        $this->middleware('adminOnly');
    }

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
        $product = Product::where('title', $name)->first();
        $discounts [] = $this->getDiscounts();

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

        $discount = (float)$input['discount'];

        // Add values to database
        $sale = new Sale();
        $sale->start = $input['start'];
        $sale->finish = $input['finish'];
        $sale->discount = $discount;
        $sale->product_id = $input['product_id'];
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
        if (isset($_GET['id'])) {
            $id = urlencode($_GET['id']);

        } else {
            return redirect('products');
        }
        $product = Product::where('title', $name)->first();
        $sale = Sale::find($id);

        $discounts [] = $this->getDiscounts();


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
	public function update($id, SaleRequest $request)
	{
        //get values
        $input = $request->all();

        // Turn discount into a number
        $discount = (float)$input['discount'];

        // Add values to database
        $sale = Sale::findOrFail($id);
        $sale->start = $input['start'];
        $sale->finish = $input['finish'];
        $sale->discount = $discount;
        $sale->product_id = $input['product_id'];
        $sale->save();

        return redirect('products');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect ('products');
	}

    public function getDiscounts()
    {
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
        return $discounts;
    }

}
