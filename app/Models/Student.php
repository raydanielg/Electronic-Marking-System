<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\School;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'prem_number',
        'cert_entry_number',
        'first_name',
        'middle_name',
        'last_name',
        'full_name',
        'sex',
        'date_of_birth',
        'school_id',
        'admission_number',
        'admission_date',
        'current_level',
        'current_class',
        'status',
        'parent_name',
        'parent_phone',
        'is_active',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'admission_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
