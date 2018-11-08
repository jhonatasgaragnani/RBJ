<?php

namespace Admin\Http\Controllers\Radio;

use App\Http\Controllers\Controller;
use Admin\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::with('options')->get();
        return view('Admin::pages.polls.browse', compact('polls'));
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

        $poll = Poll::create($request->only(['name', 'question']));

        $poll->load('options');

        return response($poll, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function show(Poll $poll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {
        $poll->load('options');
        return view('Admin::pages.polls.edit', compact('poll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
        $this->validate($request, $this->rules());

        $poll->update($request->only(['name', 'question']));

        return redirect()->route('admin.radio.polls');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Admin\Models\Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        $poll->delete();

        return response([], 200);
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'question' => 'required|string'
        ];
    }
}
