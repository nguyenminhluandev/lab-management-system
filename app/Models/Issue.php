<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public $table = 'issues';

    public $fillable = [
        'id',
        'description',
        'reported_by',
        'reported_date',
        'status',
        'fixed_date',
        'fixed_by',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'reported_by' => 'string',
        'reported_date' => 'datetime',
        'status' => 'string',
        'fixed_date' => 'datetime',
        'fixed_by' => 'string'
    ];

    public static array $rules = [
        'description' => 'required',
        'reported_by' => 'required',
        'reported_date' => 'required',
        'status' => 'required'
    ];

    public function computers()
    {
        return $this->belongsToMany(Computer::class, 'issue_computers', 'issue_id', 'computer_id');
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function fixer()
    {
        return $this->belongsTo(User::class, 'fixed_by');
    }

}
