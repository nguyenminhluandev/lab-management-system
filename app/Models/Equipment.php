<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';

    protected $fillable = [
        'lab_id',
        'name',
        'quantity',
        'status',
        'description',
    ];

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }
}
