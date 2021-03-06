<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Controllers\Controller;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller {

    /**
     * Only admins are allowed to view this page
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly');
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get Values
        $roles = Role::all();

        // Add instructions and a link
        $header = 'Roles';
        $instructions = 'You can create, update, and delete roles here';
        $createButton = 'Create a Role';

        return view('roles.index')->with([
            'roles'         => $roles,
            'header'        => $header,
            'instructions'  => $instructions,
            'createButton'  => $createButton
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//get values
        $submitButton = 'Add Role';

        return view('roles.create')->with([
            'submitButton'         => $submitButton
        ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateRoleRequest $request)
	{
		//Get Values
        $input = $request->all();
        $role =  Role::create($input);

        return redirect ('roles');
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
		//find role
        $role = Role::findOrFail($id);
        $submitButton = "Edit Role";

        return view('roles.edit')->with([
            'submitButton'         => $submitButton,
            'role'                 => $role
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateRoleRequest $request, $id)
	{
		// Find and update
        $role = Role::findOrFail($id);
        $role->update($request->all());

        return redirect ('roles');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// find and delete
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect ('roles');
	}

}
