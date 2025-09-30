<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Static views
Route::get('/', function () {
    return view('welcome');
})->middleware('check1');





// Add middleware group to route group
// For dummy purpose check site use this type of url
// http://localhost:8000/home/?age=18&country=india
Route::middleware('check1')->group(function () {
    Route::get('/about/{name}', function ($name) {
        return view('about', ['name' => $name]);
    });

    Route::view('/home', 'home');
    Route::view('user-form', 'user-form');
});




// Route::redirect('/home', '/');

// End static views

// -----------------------------------------------------

// Dynamic views using controller
// Controller can get data from database and response to view
Route::get('user', [UserController::class, 'getUser']);
Route::get('user/{name}', [UserController::class, 'getUserName']);
Route::get('admin/', [UserController::class, 'adminLogin']);
Route::post('adduser/', [UserController::class, 'addUser']);
