<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Controllers\Controller;

use App\Product;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller {

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
        //Find User
        $user = User::where('name', $name)->first();
        $submitButton = 'Add Profile';


        return view('profiles.create')->with([
            'user'          => $user,
            'submitButton'  => $submitButton
        ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateProfileRequest $request, $id)
	{
        //find the user
        $user = User::findOrFail($id);
        $input = $request->all();

        //Add values
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();
        $profile->update($input);

        return redirect()->action('AddressesController@select', [$user->name]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($name)
	{
		//

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($name)
	{
        //Find User
        $user = User::where('name', $name)->first();
        $profile = Profile::where('user_id', $user->id)->first();
        $submitButton = 'Edit Profile';

        return view('profiles.edit')->with([
            'user'          => $user,
            'submitButton'  => $submitButton,
            'profile'       => $profile
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateProfileRequest $request, $id)
	{
		//find profile
        $profile = Profile::findOrFail($id);
        $profile->update($request->all());

        //get user name for URL
        $user_id = $profile->user_id;
        $user = User::findOrFail($user_id);


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
		// find the profile
        $profile = Profile::findOrFail($id);

        //find user for URL
        $user_id = $profile->user_id;
        $user = User::findOrFail($user_id);

        //delete profile
        $profile->delete();



        return redirect()->action('ProfilesController@create', [$user->name]);
	}

}
