<?php

use App\Http\Controllers\Admin\ClothingController as AdminClothingController;
use App\Http\Controllers\User\ClothingController as UserClothingController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\User\CategoryController as UserCategoryController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Clothing

Route::resource('/clothing', ClothingController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/home/category', [App\Http\Controllers\HomeController::class, 'categoryIndex'])->name('home.category.index');



Route::resource('/admin/clothing', AdminClothingController::class)->middleware(['auth'])->names('admin.clothing');
Route::resource('/user/clothing', UserClothingController::class)->middleware(['auth'])->names('user.clothing')->only(['index', 'show']);

Route::resource('/admin/category', AdminCategoryController::class)->middleware(['auth'])->names('admin.category');
Route::resource('/user/category', UserCategoryController::class)->middleware(['auth'])->names('user.category')->only(['index', 'show']);
