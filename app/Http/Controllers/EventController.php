<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

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
    public function events() {
        return Event::all();
    }
}
