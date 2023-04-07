<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
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

        $category = Category::all();

        return view('admin.category.index')->with('categories', $category);
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

        $category = Category::all();

        return view('admin.category.create')->with('categories', $category);
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

        $category_image = $request->file('category_image');
        $extension = $category_image->getClientOriginalExtension();
        // the filename needs to be unique, I use title and add the date to guarantee a unique filename, ISBN would be better here.
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;

        // store the file $book_image in /public/images, and name it $filename
        $path = $category_image->storeAs('public/images', $filename);

        $request->validate([
            'name' => 'required|max:120',
            'description' => 'required|max:500',
            'category_image' => 'file|image',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_image' => $filename,
        ]);

        return to_route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if(!Auth::id()) {
           return abort(403);
         }

        return view('admin.category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $categories)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // $categories = Category::all();
        return view('admin.category.edit')->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categories)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $request->validate([
            'name' => 'required|max:120',
            'description' => 'required|max:500',
            'category_image' => 'file|image',
        ]);

        $category_image = $request->file('category_image');
        $extension = $category_image->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;

        $path = $category_image->storeAs('public/images', $filename);

        $categories->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_image' => $filename,
        ]);

        return to_route('admin.category.show', $categories)->with('success', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categories)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $categories->delete();

        return to_route('admin.category.index', $categories)->with('success', 'Category Deleted Successfully!');
    }
}
