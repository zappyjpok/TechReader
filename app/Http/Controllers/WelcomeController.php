<?php namespace App\Http\Controllers;

use App\Services\BootstrapRows;

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

        $columns = [
            'tom', 'jack', 'scott', 'james', 'lee', 'luke', 'adam', 'eric', 'matt', 'jenn', 'Thuy', 'mary'
        ];

        $grid = new BootstrapRows(3, $columns);
        $grid->setBootstrapSmClass('col-xs-4');
        $output = $grid->createRows();
        $char = $grid->setParentElement('section');


        $check =$grid->getData();

        return view('test')->with([
            'output' => $output,
            'check' => $check,
            'char' => $char
        ]);
    }
}

