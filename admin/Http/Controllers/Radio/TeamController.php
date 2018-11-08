<?php

namespace Admin\Http\Controllers\Radio;

use Admin\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::paginate(20);

        return view('Admin::pages.teams.browse', compact('teams'));
    }

    public function create()
    {
        return view('Admin::pages.teams.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        $attrs = $request->only(['name', 'image', 'role']);

        $attrs['thumb'] = str_replace(basename($attrs['image']), 'thumbs/' . basename($attrs['image']), $attrs['image']);

        Team::create($attrs);

        return redirect()->route('admin.radio.teams');
    }

    public function update(Team $team, Request $request)
    {
        $this->validate($request, $this->rules());

        $attrs = $request->only(['name', 'image', 'role']);

        $attrs['thumb'] = str_replace(basename($attrs['image']), 'thumbs/' . basename($attrs['image']), $attrs['image']);

        $team->update($attrs);

        return redirect()->route('admin.radio.teams');
    }

    public function edit(Team $team)
    {
        return view('Admin::pages.teams.edit', compact('team'));
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('admin.radio.teams');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'role' => 'required|string|min:3',
            'image' => [
                'required',
                'string',
                'regex:/^(\/photos\/)/']
        ];
    }
}