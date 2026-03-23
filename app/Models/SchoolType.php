<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolType extends Model
{
    protected $fillable = ['name', 'description', 'order'];
    
    public $timestamps = true;
}
