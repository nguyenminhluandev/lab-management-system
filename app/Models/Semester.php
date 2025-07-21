<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public $table = 'semesters';

    public $fillable = [
        'id',
        'name',
        'start_date',
        'end_date',
        'academic_year',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'academic_year' => 'string'
    ];

    public static array $rules = [
        'name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'academic_year' => 'required'
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

}
