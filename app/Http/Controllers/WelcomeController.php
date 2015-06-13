<?php namespace App\Http\Controllers;

use App\Services\BootstrapRows;
use App\Product as Product;
use App\Services\BootstrapRowsSales;
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
        $items = 1;

        // Refactor this into a class for everypage!


        $sale = DB::table('sales')
            ->join('products', 'sales.salProductId', '=', 'products.id')
            ->select('products.proTitle', 'products.proDescription', 'products.proImagePath','products.proPrice', 'sales.salDiscount')
            ->get();

        $grid = new BootstrapRows(3, 3, $sale);
        $grid->setBootstrapClass('col-md-3 col-lg-3');
        $grid->setParentElement('section');
        $grid->setChildElement('div');
        $grid->addTitle();
        $grid->addDescription();
        $grid->addImage();
        $grid->addPrice();
        $grid->addLink('#');
        $output = $grid->createBootstrapGrid();

		return view('welcome')->with([
            'pageTitle' => $pageTitle,
            'output' => $output
        ]);
	}

    public function test()
    {

        $data = DB::table('products')->select('proTitle', 'proDescription', 'proImagePath','proPrice')->get();

        $sales = DB::table('sales')
            ->join('products', 'sales.salProductId', '=', 'products.id')
            ->select('products.proTitle', 'products.proDescription', 'products.proImagePath','products.proPrice', 'sales.salDiscount')
            ->get();

        $sale = DB::table('products')
            ->Leftjoin('sales', 'sales.salProductId', '=', 'products.id')
            ->select('products.proTitle', 'products.proDescription', 'products.proImagePath','products.proPrice', 'sales.salDiscount')
            ->get();

        $all = '';

        $grid = new BootstrapRows(4, 3, $sale);
        $grid->setBootstrapClass('col-xs-3 col-md-3 col-lg-3');
        $grid->setParentElement('section');
        $grid->setChildElement('article');
        $grid->addTitle();
        $grid->addDescription();
        $grid->addImage();
        $grid->addPrice();
        $grid->addLink('#');

        $output = $grid->createBootstrapGrid();

        $string = '';

        return view('test')->with([
            'output' => $output,
            'string' => $string,
            'sales' => $sales,
            'sale' => $sale,
            'data' => $data,
            'all' => $all
        ]);
    }
}

