<?php

namespace Admin\Http\Controllers\Radio;

use Admin\Models\Poll;
use App\Http\Controllers\Controller;
use Admin\Models\PollOption;
use Illuminate\Http\Request;

class PollOptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Poll $poll)
    {
        $this->validate($request, $this->rules());

        $option = new PollOption($request->only(['name']));

        $poll->options()->save($option);

        return response($option, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PollOption  $pollOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PollOption $pollOption)
    {
        $this->validate($request, $this->rules());

        $pollOption->update($request->only(['name']));

        return response($pollOption, 200);
    }

    public function vote(PollOption $pollOption, Request $request) {
        $pollOption->votes += 1;

        $pollOption->update();

        return response($pollOption->poll()->with('options')->first(), 200);
    }

    public function rules()
    {
        return [
            'name' => 'required|string'
        ];
    }
}
