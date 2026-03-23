<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Manager extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'region',
        'district',
        'phone',
        'email',
        'password',
        'role',
        'status',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isManager()
    {
        return $this->role === 'manager';
    }

    public function isClerk()
    {
        return $this->role === 'clerk';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
