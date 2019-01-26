<?php

namespace App\Http\Controllers;


class CalendarController extends Controller
{
    /**
     * Returns the calendar view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $combined_events = $this->combineCalendarEvents();
        $calendar_range = $this->calculateCalendarRange($combined_events);
        return view('calendar', ['combined_events' => $combined_events, 'calendar_range' => $calendar_range]);
    }
    public function combineCalendarEvents() {
        $conferences = ConferenceController::conferences();
        $events = EventController::events();
        return $events->merge($conferences)->sortBy('start_time');
    }
    public function calculateCalendarRange(\Illuminate\Database\Eloquent\Collection $combined_events) {
        return \Carbon\CarbonPeriod::create($combined_events->first()->start_time, $combined_events->last()->start_time, '1 month');
    }
}
