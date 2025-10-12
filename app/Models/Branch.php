<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
     public $timestamps = false;

    protected $fillable = [
        'institute_id',
        'branch_code',
        'branch_name',
        'address',
        'contact_number',
        'email',
        'manager_name',
        'status',
        'insert_userid'
    ];
}
