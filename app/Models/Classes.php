<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'course_id', 'teacher_id', 'class_code', 'class_name',
        'start_date', 'end_date', 'schedule', 'location',
        'branch_id', 'status', 'insert_userid'
    ];
}
