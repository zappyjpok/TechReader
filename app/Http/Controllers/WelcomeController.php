<?php namespace App\Http\Controllers;

use App\Category;
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
        $items = Sale::current()->get();
        $row = '<article class="row">';
        $rowClose = '</article>';


		return view('welcome')->with([
            'pageTitle' => $pageTitle,
            'items' => $items,
            'row' => $row,
            'rowClose' => $rowClose
        ]);
	}

    public function show($name)
    {
        $name = str_replace("_", " ", $name);
        $product = Product::where('title', $name)->first();
        $quantity = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18];

        return view('catalog.show')->with([
            'product' => $product,
            'quantity' => $quantity
        ]);
    }

    public function display($name)
    {
        $category = Category::where('name', $name)->first();
        $items = Product::where('category_id', $category->id)->get();

        $pageTitle = "Our " . $category->name . ' books';
        $row = '<article class="row">';
        $rowClose = '</article>';

        return view('catalog.index')->with([
            'pageTitle' => $pageTitle,
            'items' => $items,
            'row' => $row,
            'rowClose' => $rowClose
        ]);

    }

    public function test()
    {
        return 'test';

        //$sales = Sale::current()->get();
        //$products = Product::find(2);
        //$sale = Sale::find(3); $sale->product;
        //$sale = Sale::findProduct(2)->get(); // don't forget the get()
        //$test = Sale::current()->findProduct($products->id)->first(); // this works
        //$test2 = Sale::all();
        //$sales->first()->product->name;
        //return $sales->first()->discount;

        //return $sales->first()->product;

        /*
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
        */
    }
}

