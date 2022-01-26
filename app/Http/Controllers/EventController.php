<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Alert;


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
        $desc = base64_decode($event->description);

        return view('home/event', [
            'title' => $event->title,
            'event' => $event,
            'desc' => $desc
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

    public function list_event()
    {
        return view('partner.list-event');
    }

    public function create_event() {
        $categories = Category::orderBy('name', 'asc')->get();
        // return $categories;
        return view('partner.create-event', [
            'categories' => $categories
        ]);
    }

    public function store_event(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:events,slug',
            'description' => 'required',
            'banner' => 'required|image',
            'quota' => 'required|numeric',
            'time' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|array',
        ]);

        $decode = base64_encode($request->description);

        // $validatedData = [
        //     'description' => $decode,
        //     'user_id' => auth()->user()->id,
        //     'banner' => $request->file('banner')->store('banner-event'),

        // ];
        $validatedData['description'] = $decode;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['banner'] = $request->file('banner')->store('banner-event');
        $validatedData['location'] = $request->location;
        $validatedData['link'] = $request->link;

        $event = Event::create($validatedData);
        $event->categories()->attach($validatedData['category_id']);
        Alert::success('Berhasil!', 'Sukses membuat event');
        return redirect('/partner/home');

    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

}
