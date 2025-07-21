<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    public $table = 'computers';

    public $fillable = [
        'id',
        'lab_id',
        'config',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'string',
        'lab_id' => 'string',
        'config' => 'string'
    ];

    public static array $rules = [
        'lab_id' => 'required',
        'config' => 'required'
    ];

    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }
}
