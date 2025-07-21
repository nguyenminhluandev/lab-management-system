<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabGhost extends Model
{
    public $table = 'lab_ghosts';

    protected $fillable = [
        'lab_id', 'ghost_id', 'assigned_at', 'is_active'
    ];

    public function ghost()
    {
        return $this->belongsTo(Ghost::class, 'ghost_id');
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }


}
