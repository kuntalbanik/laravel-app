<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    // define your DB table name
    protected $table = "students";

    // Return function output to   Controller
    function testEx(){
        echo "From Model file";
    }
}
