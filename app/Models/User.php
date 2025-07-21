<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'role_id' => 'integer',
    ];

    protected $hidden = ['password', 'remember_token'];

    // ===== Relationships =====
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'teacher_id', 'id');
    }

    public function issues()
    {
        return $this->hasMany(Issue::class, 'reported_by', 'id');
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class, 'teacher_id', 'id');
    }

    public function managedLabs()
    {
        return $this->hasMany(Lab::class, 'manager_id', 'id');
    }
}
