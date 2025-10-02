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
});




// Route::redirect('/home', '/');

// End static views

// -----------------------------------------------------

// Dynamic views using controller
// Controller can get data from database and response to view
Route::get('user', [UserController::class, 'getUser']);
Route::get('user/{name}', [UserController::class, 'getUserName']);
Route::get('admin/', [UserController::class, 'adminLogin']);

// Route methods example
Route::view('user-form', 'user-form');
Route::post('adduser/', [UserController::class, 'addUser']);
Route::get('logout/', [UserController::class, 'logout']);
// Route::put('adduser/', [UserController::class, 'put']);
// Route::delete('adduser/', [UserController::class, 'delete']);
// Route::get('students/', [StudentController::class, 'getStudents']);



// any method using
// Route::any('adduser/', [UserController::class, 'any']);


// match method using
// Route::match(['post', 'get'], '/adduser', [UserController::class, 'groupOne']);
// Route::match(['put', 'delete'], '/adduser', [UserController::class, 'groupTwo']);


// for session practice
Route::view('profile', 'profile');



// Upload file view
Route::view('upload', 'upload');
Route::post('upload', [UserController::class, 'upload']);
