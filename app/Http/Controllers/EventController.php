<?php

namespace App\Http\Controllers;

use App\Event;

/**
 * Class EventController
 * @package App\Http\Controllers
 */
class EventController extends Controller
{
    //
    /**
     * @return Event[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function events() {
        return Event::orderBy('start_time', 'desc')->get();
    }
}
