<?php

namespace Admin\Http\Controllers\Settings;

use Admin\Models\Configuration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configurations = Configuration::orderBy('key', 'asc')->get();
        return view('Admin::pages.settings.browse', compact('configurations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        $configuration = Configuration::create($request->only([
            'key',
            'value'
        ]));

        return response($configuration, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuration $configuration)
    {
        $this->validate($request, $this->updateRules());

        $configuration->update($request->only([
            'key',
            'value'
        ]));

        return response($configuration, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function rules()
    {
        return [
            'key'   =>  'required|string|unique:configurations',
            'value' =>  'required|string'
        ];
    }

    public function updateRules()
    {
        return [
            'key'   =>  'required|string|exists:configurations',
            'value' =>  'required|string'
        ];
    }


}
