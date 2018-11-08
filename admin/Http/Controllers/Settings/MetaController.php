<?php

namespace Admin\Http\Controllers\Settings;

use Admin\Models\Meta;
use Admin\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::with('metas')->get();
        return view('Admin::pages.metas.browse', compact('pages'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        $page = Page::create($request->only([
            'name',
            'description'
        ]));

        $page->load('metas');

        return response($page, 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $page->load('metas');

        return view('Admin::pages.metas.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meta $meta)
    {
        $this->validate($request, $this->metaRules($meta->page));

        $meta->update($request->only([
            'name',
            'content'
        ]));

        return response($meta, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return response([], 200);
    }

    public function storeMeta(Request $request, Page $page)
    {
        $this->validate($request, $this->createMetaRules($page));

        $meta = new Meta($request->only([
            'name',
            'content'
        ]));

        $page->metas()->save($meta);

        return response($meta, 200);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:pages',
            'description' => 'required|string',
        ];
    }

    public function createMetaRules($page)
    {
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('metas')
                    ->where('page_id', $page['id'])
            ],
            'content' => 'required|string'
        ];
    }

    public function metaRules($page)
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'content' => 'required|string'
        ];
    }
}
