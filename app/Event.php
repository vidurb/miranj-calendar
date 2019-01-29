<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * @package App
 */
class Event extends Model
{
    protected $fillable = ['name', 'title', 'city', 'venue', 'start_time', 'end_time', 'url', 'blurb'];
    protected $dates = ['start_time', 'end_time'];
 }
