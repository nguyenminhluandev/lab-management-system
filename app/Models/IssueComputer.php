<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueComputer extends Model
{
    public $table = 'issue_computers';

    public $fillable = [
        'issue_id',
        'computer_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'issue_id' => 'integer',
        'computer_id' => 'string'
    ];

    public static array $rules = [
        
    ];

    
}
