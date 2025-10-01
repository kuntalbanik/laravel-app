<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    // to avoid the below error use the following line
    // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'students.updated_at' in 'field list'
    public $timestamps = false;


    // define your DB table name
    protected $table = "students";

    // Return function output to   Controller
    function testEx()
    {
        echo "From Model file";
    }
}
