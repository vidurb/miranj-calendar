<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Returns the calendar view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $conferences = ConferenceController::conferences();
//        return view('calendar', ['events' => $events, 'conferences' => $conferences]);
        return view('calendar');
    }
}
