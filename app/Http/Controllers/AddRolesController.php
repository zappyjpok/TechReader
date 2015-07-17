<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\AddRoleRequest;
use App\Http\Controllers\Controller;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class AddRolesController extends Controller {

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
		// Get Values
        $user = User::where('name', $name)->first();
        $roleList = Role::lists('name', 'id');

        return view('users.roles.create')->with([
            'user'          => $user,
            'roleList'      => $roleList
        ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AddRoleRequest $request, $id)
	{
		// Find and add a role
        $user = User::findOrFail($id);
        $input = $request->all();

        $user->assignRole($input['id']);

        return redirect()->action('UsersController@show', [$user->name]);

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
	public function destroy($id, $role)
	{
        // find user
        $user = User::findOrFail($id);
        $user->removeRole($role);

        return redirect()->action('UsersController@show', [$user->name]);
	}

}
