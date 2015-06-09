<?php namespace App\Http\Controllers;

use App\Services\BootstrapRows;
use App\Product as Product;
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
        if($items = 1) {
            $cartMessage = $items . "Item";
        } else {
            $cartMessage = $items . "Item";
        }

		return view('welcome')->with([
            'pageTitle' => $pageTitle,
            'cartMessage' => $cartMessage
        ]);
	}

    public function test()
    {

        $data = DB::table('products')->select('proTitle', 'proDescription', 'proImagePath','proPrice')->get();

        $grid = new BootstrapRows(4, 3, $data);
        $grid->setBootstrapClass('col-xs-3 col-md-3 col-lg-3');
        $grid->setParentElement('section');
        $grid->setChildElement('article');
        $grid->addTitle();
        $grid->addDescription();
        $grid->addImage();
        $grid->addPrice();

        $a = $grid->createColumn();

        $output = $grid->createBootstrapGrid();

        $string = '';

        return view('test')->with([
            'output' => $output,
            'string' => $string,
            'titles' => $titles,
            'images' => $images,
            'descriptions' => $descriptions,
            'a' => $a
        ]);
    }
}

