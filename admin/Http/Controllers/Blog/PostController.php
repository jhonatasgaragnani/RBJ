<?php

namespace Admin\Http\Controllers\Blog;

use Admin\Models\Post;
use Admin\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['author', 'type'])->orderBy('created_at', 'desc')->paginate(50);
        return view('Admin::pages.posts.browse', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::orderBy('name', 'asc')->get();
        return view('Admin::pages.posts.add', compact('types'));
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
            'title',
            'active',
            'type',
            'image',
            'body',
            'meta_title',
            'meta_description',
            'meta_keywords'
        ]);

        $attrs['type_id'] = $attrs['type'];
        $attrs['thumb'] = str_replace(basename($attrs['image']), 'thumbs/' . basename($attrs['image']), $attrs['image']);
        $attrs['meta_title'] = $attrs['meta_title'] ?? $attrs['title'];

        $post = new Post($attrs);

        Auth::user()->posts()->save($post);

        return redirect()->route('admin.blog.posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load(['author', 'type']);
        return view('Admin::pages.posts.read', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $types = Type::orderBy('name', 'asc')->get();
        $post->load('type');

        return view('Admin::pages.posts.edit', compact(['post','types']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, $this->rules());

        $attrs = $request->only([
            'title',
            'active',
            'type',
            'image',
            'body',
            'meta_title',
            'meta_description',
            'meta_keywords'
        ]);

        $attrs['type_id'] = $attrs['type'];
        $attrs['thumb'] = str_replace(basename($attrs['image']), 'thumbs/' . basename($attrs['image']), $attrs['image']);
        $attrs['meta_title'] = $attrs['meta_title'] ?? $attrs['title'];

        $post->update($attrs);

        return redirect()->route('admin.blog.posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.blog.posts');
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:4',
            'active' => 'required|boolean',
            'type' => 'required|integer|exists:types,id',
            'image' => [
                'required',
                'string',
                'regex:/^(\/photos\/)/'],
            'body' => 'required|string',
            'meta_description' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_keywords' => 'nullable|string'
        ];
    }
}
