<?php namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests;
use App\Http\Requests\CreateAddressRequest;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class AddressesController extends Controller {

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
	public function create($name)
	{
        // Find User
        $user = User::where('name', $name)->first();
        $submitButton = 'Add Address';

        if(empty($user->profile->first_name))
        {
            return redirect()->action('ProfilesController@create', [$user->name]);
        }

        return view('addresses.create')->with([
            'user' => $user,
            'submitButton' => $submitButton
        ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateAddressRequest $request, $id)
	{
		//find the user
        $user = User::findOrFail($id);
        $input = $request->all();


        // Add values to database
        $address = new Address();
        $address->user_id = $user->id;
        $address->address = $input['address'];
        $address->city = $input['city'];
        $address->state = $input['state'];
        $address->postal_code = $input['postal_code'];
        $address->save();

        return redirect()->action('AddressesController@select', [$user->name]);
	}

    /**
     * User can select an address
     *
     * @param $name -- user name
     * @return $this
     */
    public function select($name)
    {
        // find the user
        $user = User::where('name', $name)->first();
        $submitButton = 'Continue';

        if(empty($user->profile->first_name))
        {
            return redirect()->action('ProfilesController@create', [$user->name]);
        }

        if(empty($user->addresses->first()->address))
        {
            return redirect()->action('AddressesController@create', [$user->name]);
        }

        return view('addresses.select')->with([
            'user' => $user,
            'submitButton' => $submitButton
        ]);
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
	public function edit($id)
	{
		//
        $address = Address::findOrFail($id);
        $user_id = $address->user_id;
        $user = User::findOrFail($user_id);
        $submitButton = 'Edit Address';

        return view('addresses.edit')->with([
            'user'          =>      $user,
            'address'       =>      $address,
            'submitButton'  =>      $submitButton
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateAddressRequest $request, $id)
	{
		// Find the address and update
        $address = Address::findOrFail($id);
        $address->update($request->all());

        $user = User::findOrFail($address->user_id);

        return redirect()->action('AddressesController@select', [$user->name]);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        // find the address and delete
        $address = Address::findOrFail($id);
        $user_id = $address->user_id;
        $user = User::findOrFail($user_id);

        $address->delete();

        return redirect()->action('AddressesController@select', [$user->name]);
	}

}
