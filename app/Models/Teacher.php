<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'contact_number',
        'email',
        'expertise',
        'photo_path',
        'branch_id',
        'status',
        'insert_userid'
    ];
}
