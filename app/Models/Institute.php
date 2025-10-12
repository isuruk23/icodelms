<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
      public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'address', 'contact_number', 'email',
        'website', 'logo_path', 'status', 'insert_datetime', 'insert_by'
    ];
}
