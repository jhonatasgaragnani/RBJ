<?php

namespace Admin\Http\Controllers\Radio;

use Admin\Models\Day;
use Admin\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::orderBy('name', 'asc')->paginate(100);
        $days = Day::orderBy('id', 'asc')->with('schedules')->get();
        return view('Admin::pages.schedules.browse', compact(['schedules', 'days']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.schedules.add');
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

        Schedule::create($request->only([
            'name',
            'description',
            'speaker',
            'image',
            'thumb'
        ]));

        return redirect()->route('admin.radio.schedule');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('Admin::pages.schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $this->validate($request, $this->rules());

        $schedule->update($request->only([
            'name',
            'description',
            'thumb',
            'image',
            'speaker'
        ]));

        return redirect()->route('admin.radio.schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'speaker' => 'required|string',
            'image' => [
                'required',
                'string',
                'regex:/^(\/photos\/)/'
            ],
            'thumb' => [
                'required',
                'string',
                'regex:/^(\/photos\/)/'
            ]
        ];
    }
}
