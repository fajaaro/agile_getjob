<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function jobSeekerDetail()
    {
        return $this->hasOne(JobSeekerDetail::class);
    }

    public function postedJobs()
    {
        return $this->hasMany(Job::class, 'recruiter_id');
    }

    public function inRole($role)
    {
        return $this->role->name == strtolower($role);
    }
}
