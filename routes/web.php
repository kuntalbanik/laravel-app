<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AgeCheck;
use App\Http\Middleware\CountryCheck;


// Static views start


// direct use middleware on route with group middleware
// e.g. ->middleware('check1')

Route::get('/', function () {
    return view('welcome');
})->middleware('check1');



// direct use middleware on route e.g. ->middleware(AgeCheck::class)

// Route::get('/', function () {
//     return view('welcome');
// })->middleware(AgeCheck::class);




// direct use middleware on route with multiple middlewares
// e.g. ->middleware([AgeCheck::class, CountryCheck::class])

// Route::get('/', function () {
//     return view('welcome');
// })->middleware([AgeCheck::class, CountryCheck::class]);




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


Route::get('students/', [StudentController::class, 'getStudents']);

