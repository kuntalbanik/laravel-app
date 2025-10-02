<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;



use function Pest\Laravel\put;

class UserController extends Controller
{
    //


    // old getUser() function
    // function getUser(){
    //     // return "John Millar";
    //     return view('user');
    // }

    // new getUser() function to connect database manually
    function getUser()
    {

        // for manual query run without using model
        $users = DB::select('select * from users');
        return view('user', ['users' => $users]);
    }




    function getUserName($name)
    {
        // return "Hi ". $name;
        $users = ['Ram', 'Shyam', 'Roni'];
        return view('getuser', ['name' => $name, 'users' => $users]);
    }
    function adminLogin()
    {
        if (View::exists('admin.login')) {
            return view('admin.login');
        } else {
            echo "Page not found";
        }
    }

    // Add user function
    // Called from user-form.blade.php file
    function addUser(Request $request)
    {

        // Get individual value
        // echo $request->city;

        // only print array value
        // print_r($request->skill);


        // store data in session
        $request->session()->put('name', $request->input('name'));

        // check session data
        // echo session('username');


        // store date to flash message
        $request->session()->flash('message', "User has been added successfully");



        // 1. Validation (ensure you validate all fields first)
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required', // 'confirmed' checks for a password_confirmation field
        // ]);

        // 2. Create the User record
        $user = new User();
        
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->save();

        if($user){
            return "User added";
        } else {
            return "Operation failed";
        }

        
        // return "Add function called";
        // return $request->input();

        // return redirect('profile');
    }



    // login controller method
    function login(Request $request)
    {
        $error = 'The provided credentials do not match our records.';
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // return $credentials;

        if (Auth::attempt($credentials)) {
            $request->session()->put('email', $request->input('email'));
            $request->session()->regenerate();
            
            // return redirect()->intended('profile'); // Logged in successfully
            return redirect('profile');
        } else {
            
            // return view('login', ['email'=>$error]);
            return $error;
        }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');

        // return "Login called";
    }



    // logout controller method
    function logoutProfile(Request $request)
    {
        // 1. Log the user out
        Auth::logout();

        // 2. Invalidate the session (destroy all session data)
        $request->session()->invalidate();

        // 3. Regenerate the CSRF token (for security)
        $request->session()->regenerateToken();

        // 4. Redirect the user
        // Redirect the user to the homepage or login page
        return redirect('/login'); 
        // OR: return redirect('/login');
    }





    // logout function call from profile view page - only using session data testing
    function logout()
    {
        session()->pull('username');
        return redirect('profile');
    }


    



    // -----------------------------------------------

    // put method
    function put()
    {
        echo "Put method called from Controller";
    }


    // delete method
    function delete()
    {
        echo "Delete method called from Controller";
    }


    // any method
    function any()
    {
        echo "Any menthod called";
    }


    // match method using
    function groupOne()
    {
        echo "Match method called group one";
    }
    function groupTwo()
    {
        echo "Match method called group two";
    }



    // File upload function
    function upload(Request $request)
    {
        // 
        // Before access uploaded file in project
        // Enter the command first from command prompt
        // 
        // php artisan storage:link
        // 
        // and update config/filesystems.php
        // 

        // 'local' => [
        //     'driver' => 'local',
        //     'root' => storage_path('app'),
        //     // 'serve' => true,
        //     // 'throw' => false,
        //     // 'report' => false,
        // ],

        // Automatic file name
        // 
        $path = $request->file('file')->store('public');
        $fileNameArray = explode("/", $path);
        $fileName = $fileNameArray[1];




        // Custom file name
        // 
        // $file = $request->file('file');
        // $originalName = $file->getClientOriginalName();

        // $file->storeAs('public', $originalName);

        // $fileNameArray = explode("/", $originalName);

        // $fileName = $fileNameArray[0];




        // return $fileNameArray;
        return view('profile', ['filepath' => $fileName]);
    }
}



// Signup registration controller method

// public function register(Request $request)
// {
//     // 1. Validation (ensure you validate all fields first)
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255|unique:users',
//         'password' => 'required|string|min:8|confirmed', // 'confirmed' checks for a password_confirmation field
//     ]);

//     // 2. Create the User record
//     $user = User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => Hash::make($request->password), // <<< The crucial step: HASHING
//     ]);
// }
// -----------------------------------------------

// login controller method

// public function login(Request $request)
// {
//     $credentials = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     if (Auth::attempt($credentials)) {
//         $request->session()->regenerate();

//         return redirect()->intended('dashboard'); // Logged in successfully
//     }

//     return back()->withErrors([
//         'email' => 'The provided credentials do not match our records.',
//     ])->onlyInput('email');
// }
