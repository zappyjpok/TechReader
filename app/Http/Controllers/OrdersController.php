<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\library\ShoppingCart;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\library\GetShoppingCartValues;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $user = Auth::user();

        return view('orders.create')->with([

        ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		// getValues
        $user = Auth::user();
        $order = new GetShoppingCartValues();
        $products = $order->getProductInformation();
        $quantity = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
        $total = $order->getTotal();

        return view('orders.show')->with([
            'user'      => $user,
            'products'  => $products,
            'quantity'  => $quantity,
            'total'     => $total
        ]);
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
        return $id;
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
	 * Remove the specified resource from the session;
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//create order variable
        $order = new ShoppingCart();
        $order->removeItem($id);

        return redirect()->action('OrdersController@show');
	}

    /**
     * Update the quantity in the session
     *
     * @return Response
     */
    public function updateQuantity()
    {
        $order = new ShoppingCart();
        $order->updateQuantity($_POST['id'], $_POST['quantity']);

        return redirect()->action('OrdersController@show');
    }

    public function addAddress()
    {
        Session::push('cart_address', ['address' => $_POST['address_id']]);

        return redirect()->action('OrdersController@create');
    }

}
