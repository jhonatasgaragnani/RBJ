<?php

namespace Admin\Http\Controllers\Blog;

use Admin\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::with(['author'])->orderBy('created_at', 'desc')->paginate(50);
        return view('Admin::pages.photos.browse', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.photos.add');
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

        $attrs = $request->only([
            'image',
            'alt',
            'title',
            'description'
        ]);

        $attrs['thumb'] = str_replace(basename($attrs['image']), 'thumbs/' . basename($attrs['image']), $attrs['image']);

        $photo = new Photo($attrs);

        Auth::user()->photos()->save($photo);

        return redirect()->route('admin.blog.photos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $photo->load('author');
        return view('Admin::pages.photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $this->validate($request, $this->rules());

        $attrs = $request->only([
            'image',
            'alt',
            'title',
            'description'
        ]);

        $attrs['thumb'] = str_replace(basename($attrs['image']), 'thumbs/' . basename($attrs['image']), $attrs['image']);

        $photo->update($attrs);

        return redirect()->route('admin.blog.photos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        return redirect()->route('admin.blog.photos');
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'alt' => 'required|string',
            'image' => [
                'required',
                'string',
                'regex:/^(\/photos\/)/'
            ]
        ];
    }
}
