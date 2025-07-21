<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $table = 'subjects';

    public $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'string',
        'name' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|unique:subjects'
    ];

    
}
