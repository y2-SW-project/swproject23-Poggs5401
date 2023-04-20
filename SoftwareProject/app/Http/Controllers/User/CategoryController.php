<?php

namespace App\Http\Controllers\User;

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
        $user->authorizeRoles('user');

        $category = Category::all();

        return view('user.category.index')->with('category', $category);
    }
    
    public function show(Category $category)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        if(!Auth::id()) {
           return abort(403);
         }

        return view('user.category.show')->with('category', $category);
    }
}
