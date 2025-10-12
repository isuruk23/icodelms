<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    public $timestamps = false;

    protected $fillable = [
        'student_code', 'full_name', 'nic_passport', 'dob', 'gender',
        'contact_number', 'email', 'address', 'guardian_name',
        'guardian_contact', 'photo_path', 'barcode_image_path',
        'branch_id', 'status', 'insert_datetime', 'insert_userid'
    ];
}
