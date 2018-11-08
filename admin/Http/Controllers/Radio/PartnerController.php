<?php

namespace Admin\Http\Controllers\Radio;

use Admin\Models\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::paginate(20);

        return view('Admin::pages.partners.browse', compact('partners'));
    }

    public function create()
    {
        return view('Admin::pages.partners.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        $attrs = $request->only(['name', 'thumb', 'site']);

        $attrs['thumb'] = str_replace(basename($attrs['thumb']), 'thumbs/' . basename($attrs['thumb']), $attrs['thumb']);

        Partner::create($attrs);

        return redirect()->route('admin.radio.partners');
    }

    public function update(Partner $partner, Request $request)
    {
        $this->validate($request, $this->rules());

        $attrs = $request->only(['name', 'thumb', 'site']);

        $attrs['thumb'] = str_replace(basename($attrs['thumb']), 'thumbs/' . basename($attrs['thumb']), $attrs['thumb']);

        $attrs['thumb'] = str_replace('thumbs/thumbs/', 'thumbs/', $attrs['thumb']);

        $partner->update($attrs);

        return redirect()->route('admin.radio.partners');
    }

    public function edit(Partner $partner)
    {
        return view('Admin::pages.partners.edit', compact('partner'));
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('admin.radio.partners');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'site' => 'nullable|string|min:5',
            'thumb' => [
                'required',
                'string',
                'regex:/^(\/photos\/)/']
        ];
    }
}