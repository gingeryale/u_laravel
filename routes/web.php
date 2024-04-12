<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('homepage');
// });

// Route::get('/about', function(){
//     return view('about');
// });


Route::get('/', [UserController::class, "showLogin"] );
Route::get('/about', [AboutController::class, "aboutSomeone"] );
Route::post('/register', [UserController::class, "registerUser"]);
Route::post('/login', [UserController::class, "login"]);
Route::post('/logout', [UserController::class, "logout"]);

//POST routes

Route::get('/create-post',[PostController::class, 'showForm']);
Route::post('/create-post',[PostController::class, 'createNewPost']);