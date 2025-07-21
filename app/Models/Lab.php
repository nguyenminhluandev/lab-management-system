<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    public $table = 'labs';

    public $fillable = [
        'id',
        'name',
        'manager_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'manager_id' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|unique:labs',
        'manager_id' => 'required'
    ];

     public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function computers()
    {
        return $this->hasMany(Computer::class, 'lab_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function labGhosts()
    {
        return $this->hasMany(LabGhost::class, 'lab_id');
    }

    public function ghosts()
    {
        return $this->belongsToMany(Ghost::class, 'lab_ghosts', 'lab_id', 'ghost_id')
                    ->withPivot('assigned_at', 'is_active')
                    ->withTimestamps();
    }

}
