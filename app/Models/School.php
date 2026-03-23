<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'registration_number',
        'category',
        'type',
        'region',
        'district',
        'ward',
        'address',
        'email',
        'phone',
        'headmaster_name',
        'is_active'
    ];

    //
}
