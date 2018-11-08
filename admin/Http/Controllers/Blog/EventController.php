<?php

namespace Admin\Http\Controllers\Blog;

use Admin\Models\Event;
use Admin\Models\Type;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with(['author'])->orderBy('created_at', 'desc')->paginate(50);
        return view('Admin::pages.events.browse', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.events.add');
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
            'image',
            'body',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'happen_at'
        ]);


        $attrs['happen_at'] = Carbon::createFromFormat('d/m/Y',$attrs['happen_at']);
        $attrs['thumb'] = str_replace(basename($attrs['image']), 'thumbs/' . basename($attrs['image']), $attrs['image']);
        $attrs['meta_title'] = $attrs['meta_title'] ?? $attrs['title'];

        $event = new Event($attrs);

        Auth::user()->events()->save($event);

        return redirect()->route('admin.blog.events');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('Admin::pages.events.edit', compact(['event']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, $this->rules());

        $attrs = $request->only([
            'title',
            'active',
            'image',
            'body',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'happen_at'
        ]);


        $attrs['happen_at'] = Carbon::createFromFormat('d/m/Y',$attrs['happen_at']);
        $attrs['thumb'] = str_replace(basename($attrs['image']), 'thumbs/' . basename($attrs['image']), $attrs['image']);
        $attrs['meta_title'] = $attrs['meta_title'] ?? $attrs['title'];

        $event->update($attrs);

        return redirect()->route('admin.blog.events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.blog.events');
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:4',
            'active' => 'required|boolean',
            'image' => [
                'required',
                'string',
                'regex:/^(\/photos\/)/'],
            'body' => 'required|string',
            'meta_description' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'happen_at' => [
                'required',
                'string',
                'regex:/\d{2}\/\d{2}\/\d{4}/'
            ]
        ];
    }
}
