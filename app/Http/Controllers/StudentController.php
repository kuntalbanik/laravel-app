<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    function getStudents(){

        // Return function output from   Model
        $data = new \App\Models\Student;
        echo $data->testEx();


        // get all data from students table
        $students = \App\Models\Student::all();
        return view('students', ['students'=>$students]);
    }
}
