<?php

namespace App\Http\Controllers\User;

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
        // $clothing = Clothing::paginate(10);
        $clothing = Clothing::with('category')->with('colour')->get();

        return view('user.clothing.index')->with('clothing', $clothing);
    }

    public function show(Clothing $clothing)
    {
        if (!Auth::id()) {
            return abort(403);
        }

        return view('user.clothing.show')->with('clothing', $clothing);
    }

}
