<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;



class StudentController extends Controller
{
    //
    
    function getStudents()
    {

        // Return function output from   Model
        $data = new Student;
        // echo $data->testEx();

        // -------------------------------------------------
        // get all data from students table using    Model

        $students = Student::all();
        // $students = Student::get();
        // $students = Student::find(1);
        // $students = Student::where('batch_year', '2018')->get();
        // $students = Student::where('batch_year', '2018')->first();
        // $students = Student::where('name', 'John')->get();

        // ---------------------------------------------------

        // 
        // Insert data to table
        // 
        // $out1 = Student::insert([
        //     'name'=>'Sam',
        //     'email'=>'sam@test.com',
        //     'batch_year'=>'2018',
        // ]);

        // if($out1) {
        //     echo "Data inserted";
        // } else {
        //     echo "Data not inserted";

        // }



        // ---------------------------------------------------

        // 
        // Update data to table
        // 

        // $out1 = Student::where('name', 'Sam')->
        //         update(['email'=>'sam@hello.com']);

        // if ($out1) {
        //     echo "Data updated";
        // } else {
        //     echo "Data not updated";
        // }


        // ---------------------------------------------------

        // 
        // Delete data from table
        // 

        $out1 = Student::where('name', 'Sam')->delete();

        if ($out1) {
            echo "Data Deleted";
        } else {
            echo "Data not exists";
        }







        // API call 
        $response_data = Http::get('https://jsonplaceholder.typicode.com/posts/1');
        $response_data = $response_data->body();


        // --------------------------------------------------
        // 
        // get/create/update/delete data using   database query builder
        //

        // get all data from table  'users'
        $result = DB::table('users')->get();

        // get output where batch year is : 2018
        // $result = DB::table('users')->where('name', 'Kuntal')->get();

        // get first row of the table
        // $result = DB::table('users')->first(); 

        // ---------------------------------------------------

        // 
        // Insert data to table
        // 

        // $out = DB::table('students')->insert([
        //     'name'=>'Tinku',
        //     'email'=>'tinku@test.com',
        //     'batch_year'=>'2018',
        // ]);

        // if($out) {
        //     echo "Data inserted";
        // } else {
        //  echo "Not Inserted";
        // }

        // -------------------------------------------------
        // 
        // Update data to table
        //

        // $out = DB::table('students')->where('name', 'Sam')->
        //         update(['email'=>'sam@hello.com']);

        // if($out) {
        //     echo "Data Updated";
        // } else {
        //     echo "Not updated";
        // }


        // -------------------------------------------------
        // 
        // Delete data from table
        //

        // $out = DB::table('students')->where('name', 'Sam')->
        //         delete();

        // if($out) {
        //     echo "Data Deleted";
        // } else {
        //     echo "Not Deleted";
        // }







        return view('students', ['students' => $students, 'response_data' => json_decode($response_data), 'result' => $result]);
        // json_decode()  return response to json type
    }
}
