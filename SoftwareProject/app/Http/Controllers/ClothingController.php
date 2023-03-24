<?php

namespace App\Http\Controllers;

use App\Models\Clothing;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClothingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clothing = Clothing::paginate(10);

        return view('clothing.index')->with('clothing', $clothing);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clothing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $clothing_image = $request->file('clothing_image');
        $extension = $clothing_image->getClientOriginalExtension();
        // the filename needs to be unique, I use title and add the date to guarantee a unique filename, ISBN would be better here.
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.'. $extension;

        // store the file $book_image in /public/images, and name it $filename
        $path = $clothing_image->storeAs('public/images', $filename);

        $request->validate([
            'title' => 'required|max:120',
            'description' => 'required|max:500',
            'price' => 'required',
            'clothing_image' => 'file|image'
        ]);

        Clothing::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'clothing_image' => $filename
        ]);

        return to_route('clothing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clothing $clothing)
    {
        if(!Auth::id()) {
            return abort(403);
          }
 
         //this function is used to get a book by the ID.
         return view('clothing.show')->with('clothing', $clothing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
