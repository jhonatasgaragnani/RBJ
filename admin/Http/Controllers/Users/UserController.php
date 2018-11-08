<?php

namespace Admin\Http\Controllers\Users;

use App\User;
use BRKsDeadPool\Gate\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at')->get();

        return view('Admin::pages.users.browse', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('Admin::pages.users.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attrs = $request->all();
        Validator::make($attrs, [
            'name' => 'required|min:2|max:60',
            'last_name' => 'required|min:2|max:60',
            'email' => 'email|required|min:2|max:60',
            'password' => 'nullable|confirmed',
            'role' =>  'required'
        ])->validate();

        $attrs['password'] = bcrypt($attrs['password']);

        $user = User::create($attrs);

        $user->assignRole($attrs['role']);

        return redirect()->route('admin.users.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $posts = $user->posts()->orderBy('created_at','desc')->paginate(5);
        return view('Admin::pages.users.read', compact(['user', 'posts']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->load('roles');
        $roles = Role::get();

        return view('Admin::pages.users.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $user = User::find($user);

        $attrs = $request->all();

        $this->validator($attrs)->validate();

        if (!is_null($attrs['password'])) {
            $attrs['password'] = bcrypt($attrs['password']);
        } else {
            unset($attrs['password']);
        }

        $user->roles()->sync($request->input('roles'));

        $user->update($attrs);

        return redirect()->route('admin.users.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }

    public function validator($data)
    {
        return Validator::make($data, [
            'name' => 'required|min:2|max:60',
            'last_name' => 'required|min:2|max:60',
            'email' => 'email|required|min:2|max:60',
            'password' => 'nullable|confirmed',
            'roles' =>  'required|min:1'
        ]);
    }
}
