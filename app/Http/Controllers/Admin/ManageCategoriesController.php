<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Event;
use Yajra\DataTables\Facades\DataTables;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Alert;
use Image;

class ManageCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if($request->ajax()) {
            $query = Category::query();
            return Datatables::of($query)
                                ->addIndexColumn()
                                ->addColumn('action', function($item){
                                    return '
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="'.route('admin.categories.edit', $item->id).'" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="'.route('admin.categories.destroy', $item->id).'" method="POST" class="btn-group">
                                            '. method_field('delete'). csrf_field().'
                                            <button class="btn btn-danger" onclick="return confirm(\'Anda Yakin?\')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    ';
                                })
                                ->editColumn('image', function($item){
                                    return '
                                    <img src="'.url('storage/category-image', $item->image).'" class="img-fluid rounded">
                                     
                                    ';
                                })
                                ->rawColumns(['image', 'action'])
                                ->make(true);
        }

        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $rules = ([
            'title' => 'required|max:50',
            'slug' => 'required|string|unique:categories,slug,'.$category->id,
            'image' => 'required|image'
        ]);

        $data = $request->validate($rules);
        $image = $request->file('image');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(640, 427)->save(base_path('public/storage/category-image/'.$image->hashName()));
        $data['image'] = $image->hashName();

        Category::create($data);
        Alert::success('Berhasil!', 'Sukses membuat kategori!');
        return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         $rules = ([
            'title' => 'required|max:50',
            'slug' => 'required|string|unique:categories,slug,'.$category->id,
            'image' => 'image'
        ]);

        $data = $request->validate($rules);

        if ($request->file('image')) {
            if($category->image) {
            Storage::delete('category-image/'.$category->image);
            }
            $image = $request->file('image');
            $image->store('category-image');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(640, 427)->save(base_path('public/storage/category-image/'.$image->hashName()));
            $data['image'] = $image->hashName();
        }

        $category->update($data);
        Alert::success('Berhasil!', 'Sukses ubah kategori!');
        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // get semua event yg memilki kategori tersebut
        $events = Event::whereHas('categories', function ($query) use ($category) {
            return $query->where('id', '=', $category->id);
        })->get();
        // melakukan pelepasan id kategori di masing2 event
        foreach ($events as $event) {
            $event->categories()->detach($category->id);
        }
        // delete file gambar kategori
        Storage::delete('category-image/'.$category->image);
        // delete dari table
        $category->delete();
         // kirim alert dan redirect
        Alert::success('Berhasil!', 'Kategori telah dihapus!');
        return redirect(route('admin.categories.index'));
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
