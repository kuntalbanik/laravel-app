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

        // $out1 = Student::where('name', 'Sam')->delete();

        // if ($out1) {
        //     echo "Data Deleted";
        // } else {
        //     echo "Data not exists - From Controller";
        // }







        // API call 
        // $response_data = Http::get('https://jsonplaceholder.typicode.com/posts/1');
        // $response_data = $response_data->body();





        // --------------------------------------------------
        // 
        // get/create/update/delete data using   database query builder
        //

        // get all data from table  'users'
        $users_data = DB::table('users')->get();

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






        //  $response_data for API call output
        // return view('students', ['students' => $students, 'response_data' => json_decode($response_data), 'result' => $result]);



        return view('students', ['students' => $students, 'users' => $users_data]);
        // json_decode()  return response to json type
    }


    // Delete student function to delete data from DB

    function deleteStudent($id)
    {
        $isDeleted = Student::destroy($id);
        if ($isDeleted) {
            // echo "`$id` Deleted";
            return redirect('students');
        }
    }



    // Add student function to save data in DB

    function addStudent(Request $request)
    {

        $outputResult = Student::insert([
            'name' => $request->name,
            'email' => $request->email,
            'batch_year' => $request->batch,
        ]);

        if ($outputResult) {
            // echo $outputResult;
            // echo "Data inserted";
            return redirect('students');
        } else {
            echo "Data not inserted";
            // echo "Student add called";
        }
    }
}