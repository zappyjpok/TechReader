<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// List of users for the site
        $users = User::all();
        $instructions = 'On this page you can use view users and change their roles';
        $header = 'Users Page';


        //$user = User::find(1);

        //return $user->roles->first()->name;

        return view('users.index')->with([
            'instructions'  => $instructions,
            'users'         => $users,
            'header'        => $header

        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        return view('auth.register')->with([

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
	public function show($name)
	{
		//Show roles
        $user = User::where('name', $name)->first();
        $header = $user->name;
        $instructions = 'View the users information here!';
        $roleList = Role::lists('name', 'id');

        return view('users.show')->with([
            'instructions'  => $instructions,
            'header'        => $header,
            'user'          => $user,
            'roleList'      => $roleList
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

}
