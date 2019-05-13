<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Photo;
use App\MenuCategory;
use App\Event;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $photo = Photo::first();
        $menu_categories = MenuCategory::limit(6)->get();
        if (date('H') > 13) {
            $date = 'tomorrow';
            $id = date('N') + 1;
        } else {
            $date = 'today';
            $id = date('N');
        }
        $event = Event::where('id', $id)->first();
        $date = new \DateTime($date . ' ' . $event->start_time); // Date tomorrow midnight
        $special = [
            'date' => $date->format('H:i A l - d F Y'),
            'hour' => $date->format('H'),
            'minute' => $date->format('i'),
            'second' => $date->format('s'),
            'month' => $date->format('m'),
            'day' => $date->format('d'),
            'year' => $date->format('Y')
        ];
        return view('home.index', compact('menu_categories', 'special', 'event', 'photo'));
    }

    public function about()
    {
        $employees = Employee::all();

        return view('home.about', compact('employees'));
    }
}
