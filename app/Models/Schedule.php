<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $table = 'schedules';

    public $fillable = [
        'lab_id',
        'subject_id',
        'teacher_id',
        'semester_id',
        'day_of_week',
        'start_period',
        'total_periods'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function getEndPeriodAttribute()
    {
        return $this->start_period + $this->total_periods - 1;
    }

}
