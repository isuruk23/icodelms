<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_id',
        'amount',
        'month',
        'payment_date',
        'method',
        'status',
        'insert_userid',
    ];
}
