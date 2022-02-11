<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Alert;


class EventController extends Controller
{
    public function index() {
        // return Event::where('status', 'open')->latest()->get();
        return view('home/events',[
            'title' => 'List All Events',
            'events' => Event::where('status', 'open')->orWhere('status', 'close')->latest()->get()
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
        $event = Event::with('categories:slug,title')->where('slug', $slug)->firstOrFail();
        $desc = base64_decode($event->description);

        return view('home/event', [
            'title' => $event->title,
            'event' => $event,
            'desc' => $desc
        ]);
    }

    public function category($slug)
    {
        $events = Event::with('categories:slug,title')
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
