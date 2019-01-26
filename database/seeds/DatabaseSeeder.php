<?php

use Illuminate\Database\Seeder;
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
     * Calls the seeders for each model.
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
 * Seeds database with events from HasGeek's GitHub repo
 */
class EventSeeder extends Seeder {
    /**
     * Gets content from URL, parses using Symfony's YAML component, and seeds the database with each entry.
     * The string modification on line 38 is in order to correct a syntax error in the yaml file that causes an error
     *  A single entry is missing the last zero in one of its timestamps
     */
    public function run()
    {
        $eventsYaml = file_get_contents('https://raw.githubusercontent.com/hasgeek/events/master/_data/events.yml');
        $eventsYaml = str_replace("end_time: 2017-10-27 21:0","end_time: 2017-10-27 21:00", $eventsYaml);
        $eventsYaml = Yaml::parse($eventsYaml);
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
 * Seeds database with conferences from HasGeek's GitHub repo
 */
class ConferenceSeeder extends Seeder {
    /**
     * Gets content from URL, parses using Symfony's YAML component, and seeds the database with each entry
     */
    public function run()
    {
        $conferencesYaml = file_get_contents('https://raw.githubusercontent.com/hasgeek/events/master/_data/conferences.yml');
        $conferencesYaml = Yaml::parse($conferencesYaml);
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
