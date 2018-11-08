<?php

namespace Admin\Http\Controllers\Blog;

use Admin\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\CssSelector\CssSelectorConverter;
use Symfony\Component\DomCrawler\Crawler;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::with('author')->orderBy('created_at')->paginate(50);
        return view('Admin::pages.videos.browse', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.videos.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->only([
            'title',
            'description',
            'thumb',
            'video'
        ]);
        $validator = Validator::make($params, $this->rules());

        $validator->after(function($validator) use ($params) {
            $crawler = new Crawler($params['video']);

            $videos = $crawler->filter('video');
            $iframes = $crawler->filter('iframe');

            if (count($videos) < 1 && count($iframes) < 1) {
                $validator->errors()->add('video', 'É necessário pelo menos um video para fazer o upload');
            }
        });

        $validator->validate();

        $params['thumb'] = str_replace(basename($params['thumb']), 'thumbs/' . basename($params['thumb']), $params['thumb']);

        $video = new Video($params);

        Auth::user()->videos()->save($video);

        return redirect()->route('admin.blog.videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('Admin::pages.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $params = $request->only([
            'title',
            'description',
            'thumb',
            'video'
        ]);
        $validator = Validator::make($params, $this->rules());

        $validator->after(function($validator) use ($params) {
            $crawler = new Crawler($params['video']);

            $videos = $crawler->filter('video');
            $iframes = $crawler->filter('iframe');

            if (count($videos) < 1 && count($iframes) < 1) {
                $validator->errors()->add('video', 'É necessário pelo menos um video para fazer o upload');
            }
        });

        $validator->validate();

        $thumb = str_replace(basename($params['thumb']), 'thumbs/' . basename($params['thumb']), $params['thumb']);
        if (!str_contains($params['thumb'], 'thumbs/')) {
            $params['thumb'] = $thumb;
        }

        $video->update($params);

        return redirect()->route('admin.blog.videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('admin.blog.videos');
    }

    public function rules() {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'thumb' => [
                'required',
                'string',
                'regex:/^(\/photos\/)/'
            ]
        ];
    }
}
