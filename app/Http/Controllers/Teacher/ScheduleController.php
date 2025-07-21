<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $teacher = Auth::user();
        $semesters = Semester::orderByDesc('start_date')->get();

        $selectedSemesterId = $request->semester_id ?? $semesters->first()?->id;

        $schedules = Schedule::with(['subject', 'lab', 'semester'])
            ->where('teacher_id', $teacher->id)
            ->when($selectedSemesterId, fn($q) => $q->where('semester_id', $selectedSemesterId))
            ->orderBy('day_of_week')
            ->orderBy('start_period')
            ->get();

        return view('teacher.schedules.index', compact('schedules', 'semesters', 'selectedSemesterId'));
    }
}
