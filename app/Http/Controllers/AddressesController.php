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
            //return redirect('profiles.create');
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

        return 'check database';
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
	public function edit(CreateAddressRequest $request, $id)
	{
		//
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
