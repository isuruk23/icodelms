<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendents extends Model
{
     public $timestamps = false;

    protected $fillable = [
        'student_id',
        'class_id',
        'attendance_date',
        'time_in',
        'status',
        'scanned_by'
    ];
}
