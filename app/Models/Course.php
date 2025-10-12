<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    public $timestamps = false;
    protected $fillable = [
        'course_code', 'course_name', 'description', 'duration_weeks',
        'fee', 'status', 'insert_datetime', 'insert_userid'
    ];
}
