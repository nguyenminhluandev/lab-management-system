<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ghost extends Model
{
    protected $table = 'ghosts';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'version',
        'file_path',
        'size',
        'description'
    ];
    
    public function labGhosts()
    {
        return $this->hasMany(LabGhost::class, 'ghost_id', 'id');
    }

    public function labs()
    {
        return $this->belongsToMany(Lab::class, 'lab_ghosts', 'ghost_id', 'lab_id')
                    ->withPivot('assigned_at', 'is_active')
                    ->withTimestamps();
    }


}
