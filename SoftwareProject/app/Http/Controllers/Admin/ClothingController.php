<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clothing;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClothingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // $clothing = Clothing::paginate(10);
        $clothing = Clothing::with('category')->get();

        return view('admin.clothing.index')->with('clothing', $clothing);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $categories = Category::all();
        return view('admin.clothing.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $clothing_image = $request->file('clothing_image');
        $extension = $clothing_image->getClientOriginalExtension();
        // the filename needs to be unique, I use title and add the date to guarantee a unique filename, ISBN would be better here.
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;

        // store the file $book_image in /public/images, and name it $filename
        $path = $clothing_image->storeAs('public/images', $filename);

        $request->validate([
            'title' => 'required|max:120',
            'description' => 'required|max:500',
            'price' => 'required',
            'clothing_image' => 'file|image',
            'category_id' => 'required'
        ]);

        Clothing::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'clothing_image' => $filename,
            'category_id' => $request->category_id
        ]);

        return to_route('admin.clothing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clothing $clothing)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        if (!Auth::id()) {
            return abort(403);
        }

        //this function is used to get a book by the ID.
        return view('admin.clothing.show')->with('clothing', $clothing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clothing $clothing)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $categories = Category::all();
        return view('admin.clothing.create')->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clothing $clothing)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $request->validate([
            'title' => 'required|max:120',
            'description' => 'required|max:500',
            'price' => 'required',
            'clothing_image' => 'file|image',
            'category_id' => 'required'
        ]);

        $clothing_image = $request->file('clothing_image');
        $extension = $clothing_image->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;

        $path = $clothing_image->storeAs('public/images', $filename);

        $clothing->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'clothing_image' => $filename,
            'category_id' => $request->category_id
        ]);

        return to_route('admin.clothing.show', $clothing)->with('success', 'Clothing Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clothing $clothing)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $clothing->delete();

        return to_route('admin.clothing.index', $clothing)->with('success', 'Clothing Deleted Successfully!');
    }
}
