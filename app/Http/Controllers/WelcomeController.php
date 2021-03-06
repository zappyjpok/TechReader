<?php namespace App\Http\Controllers;

use App\Category;
use App\Sale;
use App\User;
use App\Product as Product;
use App\Http\Requests\AddToCart as Request;
use App\library\ShoppingCart as ShoppingCart;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $pageTitle = "Check Out Are Sales";
        $items = Sale::current()->paginate(12);
        $row = '<article class="row">';
        $rowClose = '</article>';

		return view('welcome')->with([
            'pageTitle' => $pageTitle,
            'items' => $items,
            'row' => $row,
            'rowClose' => $rowClose,
        ]);
	}

    /**
     * Shows a specific product
     *
     * @param $name
     * @return $this
     */
    public function show($name)
    {
        $name = str_replace("_", " ", $name);
        $product = Product::where('title', $name)->first();
        $quantity = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];


        return view('catalog.show')->with([
            'product' => $product,
            'quantity' => $quantity
        ]);
    }

    /**
     * Adds to the shopping cart
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $shoppingCart = new ShoppingCart();
        $shoppingCart->addItem($input['id'], $input['quantity']);

        return Redirect::back();
    }

    /**
     * Shows all products of a specific category
     *
     * @param $name
     * @return $this
     */
    public function display($name)
    {
        $category = Category::where('name', $name)->first();
        $items = Product::where('category_id', $category->id)->paginate(12);

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

    public function aboutUs()
    {
        return view('about');
    }
}

