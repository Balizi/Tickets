<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ServiceController;

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

Route::get('/redirects',[ServiceController::class,"index"]);


Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/admin',[ServiceController::class,"index"]);
});


Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/AddService', function () {
        return view('AddService');
    });
    Route::post('/AddService',[ServiceController::class,"store"]);
});

//Delete
Route::get('admin/admin/delete/{id}',[ServiceController::class,'destroy']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
    })->name('dashboard');
});


// 


Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/AddPosts', [ServiceController::class,"index"]);
    Route::post('/AddPosts',[PostsController::class,"store"]);
});


Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/dashboard', [PostsController::class,"index"]);
    // return view('dashboard',[ServiceController::class,"index"]);
});

Route::get('user/dashboard/delete/{id}',[PostsController::class,'destroy']);

Route::get('user/edit/{id}',[PostsController::class,'edit']);
Route::post('/user/update/{id}',[PostsController::class,'update']);