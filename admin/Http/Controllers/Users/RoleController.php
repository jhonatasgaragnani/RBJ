<?php

namespace Admin\Http\Controllers\Users;

use BRKsDeadPool\Gate\Facades\RoleManager;
use BRKsDeadPool\Gate\Models\Permission;
use BRKsDeadPool\Gate\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('Admin::pages.roles.browse', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('Admin::pages.roles.add', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required',
            'permissions'   =>  'required|array|min:1'
        ]);

        $role = RoleManager::create($request->input('name'), $request->input('description'));

        $role->permissions()->sync($request->input('permissions'));

        return redirect()->route('admin.users.roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('Admin::pages.roles.read', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('Admin::pages.roles.edit', compact(['role', 'permissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        $role = Role::findOrFail($role);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'permissions' => 'array|required|min:1'
        ]);

        $role->update($request->only(['name', 'description']));
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.users.roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.users.roles');
    }
}
