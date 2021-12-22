<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;

class EventController extends Controller
{
    public function index() {

        return view('home/events',[
            'title' => 'List All Events',
            'events' => Event::all()
        ]);
    }

    // public function show(Event $event) {
    //     return view('home/event', [
    //         'title' => $event->title,
    //         'event' => $event
    //     ]);
    // }

    public function show($slug) 
    {
        $event = Event::with('categories:slug,name')->where('slug', $slug)->firstOrFail();

        return view('home/event', [
            'title' => $event->title,
            'event' => $event
        ]);
    }

    public function category($slug)
    {
        $events = Event::with('categories:slug,name')
        ->whereHas('categories', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        }) 
        ->get();

        $category = Category::where('slug', $slug)->get();

        return view('home/category', [
            'events' => $events,
            'category' => $category
        ]);
    }
}
