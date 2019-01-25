<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Conference
 * @package App
 */
class Conference extends Model
{
    protected $fillable = ['name', 'title', 'city', 'venue', 'start_time', 'end_time', 'url', 'blurb', 'google_maps_pin', 'color_primary', 'color_primary_dark', 'color_accent', 'funnel', 'banner'];
    protected $dates = ['start_time', 'end_time'];
    protected $dateFormat = "Y-m-d";
}
