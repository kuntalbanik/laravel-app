<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class UserController extends Controller
{
    //


    // old getUser() function
    // function getUser(){
    //     // return "John Millar";
    //     return view('user');
    // }

    // new getUser() function to connect database manually
    function getUser(){

        // for manual query run without using model
        $users = DB::select('select * from users');
        return view('user',['users'=>$users]);
    }




    function getUserName($name){
        // return "Hi ". $name;
        $users = ['Ram', 'Shyam', 'Roni'];
        return view('getuser', ['name'=>$name, 'users'=>$users]);
    }
    function adminLogin(){
        if(View::exists('admin.login')){
            return view('admin.login');
        }
        else {
            echo "Page not found";
        }
    }

    // Add user function
    // Called from user-form.blade.php file
    function addUser(Request $request){

        // Get individual value
        // echo $request->city;
        
        // only print array value
        // print_r($request->skill);
        return $request;
    }

}
