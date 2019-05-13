<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $events = [
        [
            'name' => 'Muffin Monday',
            'caption' => 'Get a free muffin with every purchase over $4.00',
            'start_time' => '07:00',
            'end_time' => '14:00'
        ],
        [
            'name' => 'Turkey Tuesday',
            'caption' => 'Half off all turkey sandwiches',
            'start_time' => '07:00',
            'end_time' => '14:00'
        ],
        [
            'name' => 'Waffle Wednesday',
            'caption' => 'Get 5 waffles for just $5',
            'start_time' => '07:00',
            'end_time' => '14:00'
        ],
        [
            'name' => 'Turnover Thursday',
            'caption' => 'Get a free apple turnover with any purchase over $4.00',
            'start_time' => '07:00',
            'end_time' => '14:00'
        ],
        [
            'name' => 'Fritter Friday',
            'caption' => 'Enjoy 15% off all pork menu items',
            'start_time' => '07:00',
            'end_time' => '14:00'
        ],
        [
            'name' => 'Sirloin Saturday',
            'caption' => 'Get a free side with any Sirloin for just $6.92',
            'start_time' => '07:00',
            'end_time' => '14:00'
        ],
        [
            'name' => 'Seafood Sunday',
            'caption' => 'Get 5% off all seafood when you spend $9.00 or more',
            'start_time' => '07:00',
            'end_time' => '14:00'
        ]
    ];
    public function run()
    {
        //
        foreach ($this->events as $item) {
            $event = new Event();
            $event->name = $item['name'];
            $event->caption = $item['caption'];
            $event->start_time = $item['start_time'];
            $event->end_time = $item['end_time'];
            $event->save();
        }
    }
}
