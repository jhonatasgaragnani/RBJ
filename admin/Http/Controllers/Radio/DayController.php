<?php

namespace Admin\Http\Controllers\Radio;

use Admin\Models\Day;
use Admin\Models\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function edit(Day $day)
    {
        $day->load(['schedules' => function ($q) {
            $q->orderBy('day_schedule.starts_at', 'asc');
        }]);
        $schedules = Schedule::orderBy('name', 'asc')->get();
        return view('Admin::pages.schedules.days.edit', compact(['day', 'schedules']));
    }

    public function addSchedule(Request $request, Day $day)
    {
        $this->validate($request, $this->rules());

        if ($day->schedules()->where('schedules.id', $request['schedule'])->exists()) {
            return redirect()->route('admin.radio.days.edit', $day);
        }

        $day->schedules()->attach($request['schedule'],
            $request->only(['starts_at', 'ends_at']));

        return redirect()->route('admin.radio.days.edit', $day);
    }

    public function removeSchedule(Request $request, Day $day, Schedule $schedule)
    {
        if ($day->schedules()->where('schedules.id', $schedule->getKey())->exists()) {
            $day->schedules()->detach($schedule->getKey());
            return redirect()->route('admin.radio.days.edit', $day);
        }

        return redirect()->back();
    }

    public function editSchedule(Day $day, Schedule $schedule)
    {
        $schedule = $day->schedules()->where('schedules.id', $schedule['id'])->first();
        $schedules = Schedule::orderBy('id', 'asc')->get();
        return view('Admin::pages.schedules.days.edit-schedule', compact(['day', 'schedule', 'schedules']));
    }

    public function updateSchedule(Day $day, Schedule $schedule, Request $request)
    {
        $this->validate($request, [
           'starts_at' => 'required|date_format:H:i',
           'ends_at' => 'required|date_format:H:i',
           'schedule' =>  'required|integer|exists:schedules,id'
        ]);

        $day->schedules()->updateExistingPivot($schedule['id'], $request->only(['starts_at', 'ends_at']));

        return redirect()->route('admin.radio.days.edit', $day);
    }

    public function rules()
    {
        return [
            'schedule' => 'required|integer|exists:schedules,id',
            'starts_at' => 'required|date_format:H:i',
            'ends_at' => 'required|date_format:H:i',
        ];
    }
}