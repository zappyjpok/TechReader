<?php namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use App\library\ShoppingCart;
use App\Product;
use App\User;
use Carbon\Carbon;
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
        $order = new GetShoppingCartValues();
        $products = $order->getProductInformation();
        $total = $order->getTotal();
        $quantity = $this->getQuantity();
        $address = $this->getAddress();

        return view('orders.create')->with([
            'user'      => $user,
            'products'  => $products,
            'total'     => $total,
            'address'   => $address,
            'quantity'  => $quantity
        ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $a = $this->addValuesOrders();

        Session::forget('cart');
        Session::forget('cart_address');
        return redirect()->action('OrdersController@processed');
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
        $quantity = $this->getQuantity();
        $total = $order->getTotal();

        return view('orders.show')->with([
            'user'      => $user,
            'products'  => $products,
            'quantity'  => $quantity,
            'total'     => $total
        ]);
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

    public function processed()
    {
        return view('orders.processed');
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

    /**
     * Adds Address ID post to a Session
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addAddress()
    {
        Session::forget('cart_address');
        Session::push('cart_address', ['address' => $_POST['address_id']]);

        return redirect()->action('OrdersController@create');
    }

    /**
     * Searches the database for the address
     *
     * @return mixed
     */
    private function getAddress()
    {
        $addresses = Session::get('cart_address');
        $id = array_pop($addresses)['address'];
        $address = Address::findOrFail($id);

        return $address;
    }

    private function getQuantity()
    {
        $value = $quantity = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20,
            21, 22, 23, 24, 25, 26 ,27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44,
            45, 46, 47, 48, 49, 50
        ];
        return $value;
    }

    /**
     * Adds values to the database
     * Runs function that foreach loops through the products values.
     *
     *
     */
    private function addValuesOrders()
    {
        // get variables
        $user = Auth::user();
        $order = new GetShoppingCartValues();
        $products = $order->getProductInformation();
        $total = $order->getTotal();
        $quantity = $this->getQuantity();
        $address = $this->getAddress();

        //Adding Values to the database
        $db = new Order();
        $db->user_id = $user->id;
        $db->address_id = $address['id'];
        $db->total = $total;
        $db->order_date = Carbon::now();
        $db->save();

        $this->addValuesOrdersProductsTable($products, $db->id);

    }

    private function addValuesOrdersProductsTable($products, $order_id)
    {
        $order = Order::findOrFail($order_id);
        if(!is_null($products))
        {
            foreach ($products as $product)
            {
                try{
                    $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);

                } catch (\Exception $e) {
                    // maybe log this exception, but basically it's just here so we can rollback if we get a surprise
                }

            }
        }
    }

}
