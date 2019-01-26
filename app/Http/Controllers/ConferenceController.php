<?php

namespace App\Http\Controllers;

use App\Conference;

/**
 * Class ConferenceController
 * @package App\Http\Controllers
 */
class ConferenceController extends Controller
{
    //
    /**
     * @return Conference[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function conferences() {
        return Conference::all();
    }
}
