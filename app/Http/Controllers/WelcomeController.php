<?php namespace App\Http\Controllers;

use App\Sale;
use App\Services\BootstrapRows;
use App\Product as Product;
use App\Services\BootstrapRowsSales;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $pageTitle = "Check Out Are Sales";

        $sales = DB::table('sales')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->select('products.title', 'products.description', 'products.image','products.price', 'sales.discount')
            ->get();

        if(!empty($sales)) {
            $grid = new BootstrapRows(3, 3, $sales, 'col-md-3 col-lg-3', 'title', 'description', 'price', 'image');
            $grid->addLink('#');

            $output = $grid->createBootstrapGrid();
            $test = $grid->getValue();
        }

        return $test;

		return view('welcome')->with([
            'pageTitle' => $pageTitle,
            'output' => $output
        ]);
	}

    public function test()
    {
        $sales = Sale::current()->get();
        //$products = Product::find(2);
        //$sale = Sale::find(3); $sale->product;
        //$sale = Sale::findProduct(2)->get(); // don't forget the get()
        //$test = Sale::current()->findProduct($products->id)->first(); // this works
        //$test2 = Sale::all();
        //$sales->first()->product->name;
        //return $sales->first()->discount;

        return $sales->first()->product;

        $products = Product::all();
        $array_products = [];

        foreach($products as $product)
        {
            $array_products = [$product->title, $product->image, $product->description, $product->price];
        }



        return $y;


        return view('test')->with([
            'sale' => $sale,
        ]);
    }
}

