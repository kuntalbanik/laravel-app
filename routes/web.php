<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AgeCheck;
use App\Http\Middleware\CountryCheck;


// Static views start


// direct use middleware on route with group middleware
// e.g. ->middleware('check1')
// http://localhost:8000/home/?age=18&country=india

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('check1');

Route::view('/', 'welcome');






// direct use middleware on route e.g. ->middleware(AgeCheck::class)

// Route::get('/', function () {
//     return view('welcome');
// })->middleware(AgeCheck::class);




// direct use middleware on route with multiple middlewares
// e.g. ->middleware([AgeCheck::class, CountryCheck::class])

// Route::get('/', function () {
//     return view('welcome');
// })->middleware([AgeCheck::class, CountryCheck::class]);




// Add middleware group to route group  'check1'
// For dummy purpose check site use this type of url
// http://localhost:8000/home/?age=18&country=india
Route::middleware('check1')->group(function () {
    Route::get('/about/{name}', function ($name) {
        return view('about', ['name' => $name]);
    });

    Route::view('home/', 'home');
});




// Route::redirect('/home', '/');

// End static views

// -----------------------------------------------------

// Dynamic views using controller
// Controller can get data from database and response to view
Route::get('user/{name}', [UserController::class, 'getUserName']);
Route::get('admin/', [UserController::class, 'adminLogin']);

// Route methods example
Route::view('register/', 'user-form');
// Route::view('adduser/', [UserController::class, 'addUser']);


Route::post('adduser/', [UserController::class, 'addUser']);
Route::view('login/', 'login')->name('login');
Route::post('login/', [UserController::class, 'login']);
// Route::put('adduser/', [UserController::class, 'put']);
// Route::delete('adduser/', [UserController::class, 'delete']);




// Route protected by authentication, using middleware  'auth'
// If not logged in, then redirect to login page
Route::middleware('auth')->group(function () {
    Route::get('profile/', function () {
        return view('profile');
    });
    
    Route::get('adduser/', function () {
        return redirect('register');
    });
    
    Route::get('students/', [StudentController::class, 'getStudents']);
    
    Route::get('user', [UserController::class, 'getUser']);
    
    // Upload file view
    Route::view('upload/', 'upload');
    Route::post('upload/', [UserController::class, 'upload']);
    
    
    Route::get('logoutprofile/', [UserController::class, 'logoutProfile']);


    // for session practice
    // Route::view('profile', 'profile');
    Route::get('logout/', [UserController::class, 'logout']);
});




// any method using
// Route::any('adduser/', [UserController::class, 'any']);


// match method using
// Route::match(['post', 'get'], '/adduser', [UserController::class, 'groupOne']);
// Route::match(['put', 'delete'], '/adduser', [UserController::class, 'groupTwo']);



