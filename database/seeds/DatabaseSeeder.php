<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;
use App\Event;
use App\Conference;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(EventSeeder::class);
        $this->call(ConferenceSeeder::class);
    }
}

/**
 * Class EventSeeder
 * Seeds event table with events from statis dataset (events.yml)
 */
class EventSeeder extends Seeder {

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function run()
    {
        $eventsYaml = Yaml::parse(Storage::disk('public')->get('events.yml'));
        foreach($eventsYaml as $event) {
            Event::create([
                'name' => $event['name'],
                'title' => $event['title'],
                'city' => $event['city'],
                'venue' => $event['venue'],
                'start_time' => $event['start_time'],
                'end_time' => $event['end_time'],
                'url' => $event['url'],
                'blurb' => $event['blurb'],
                ]);
        }
    }
}

/**
 * Class ConferenceSeeder
 * Seeds conference table with static dataset in conferences.yml
 */
class ConferenceSeeder extends Seeder {

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function run()
    {
        $conferencesYaml = Yaml::parse(Storage::disk('public')->get('conferences.yml'));
        foreach($conferencesYaml as $conference) {
            Conference::create([
                'name' => $conference['name'],
                'title' => $conference['title'],
                'city' => $conference['city'],
                'venue' => $conference['venue'],
                'google_maps_pin' => array_key_exists('google_maps_pin', $conference) ? $conference['google_maps_pin'] : null,
                'start_time' => $conference['start_time'],
                'end_time' => $conference['end_time'],
                'url' => $conference['url'],
                'blurb' => $conference['blurb'],
                'color_primary' => array_key_exists('color', $conference) ? $conference['color']['primary'] : null,
                'color_primary_dark' => array_key_exists('color', $conference) ?$conference['color']['primary_dark'] : null,
                'color_accent' => array_key_exists('color', $conference) ?$conference['color']['accent'] : null,
                'funnel' => array_key_exists('funnel', $conference) ? $conference['funnel'] : null,
                'banner' => array_key_exists('banner', $conference) ? $conference['banner'] : null,
            ]);
        }
    }
}
