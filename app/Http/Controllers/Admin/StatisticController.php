<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Semester;
use App\Models\User;
use App\Models\Lab;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TeacherStatisticsExport;
use App\Exports\LabUsageExport;

class StatisticController extends Controller
{
    public function index()
    {
        $semesters = Semester::orderByDesc('start_date')->get();
        $teachers = User::where('role_id', 2)->get(); // role_id = 2: teacher
        $labs = Lab::all();

        return view('admin.statistics.index', compact('semesters', 'teachers', 'labs'));
    }

    public function teacher(Request $request)
    {
        $semesterId = $request->semester_id;

        // Tính số tuần của học kỳ +1 để bao gồm cả tuần đầu tiên
        $semester = \App\Models\Semester::findOrFail($semesterId);
        $weeks = \Carbon\Carbon::parse($semester->start_date)->diffInWeeks($semester->end_date) + 1;

        $query = \App\Models\Schedule::where('semester_id', $semesterId);

        if ($request->teacher_id) {
            $query->where('teacher_id', $request->teacher_id);
        }

        $data = $query
            ->select('teacher_id', DB::raw("SUM(total_periods) * $weeks as total_periods"))
            ->groupBy('teacher_id')
            ->with('teacher')
            ->get();

        return view('admin.statistics.teacher', [
            'data' => $data,
            'semesters' => \App\Models\Semester::all(),
            'selected_semester' => $semesterId,
            'teachers' => \App\Models\User::where('role_id', 2)->get(),
            'selected_teacher' => $request->teacher_id
        ]);
    }

    public function lab(Request $request)
    {
        $semesterId = $request->semester_id;

        // Tính số tuần của học kỳ +1 để bao gồm cả tuần đầu tiên
        $semester = \App\Models\Semester::findOrFail($semesterId);
        $weeks = \Carbon\Carbon::parse($semester->start_date)->diffInWeeks($semester->end_date) + 1;

        $query = \App\Models\Schedule::where('semester_id', $semesterId);

        if ($request->lab_id) {
            $query->where('lab_id', $request->lab_id);
        }

        $data = $query
            ->select('lab_id', DB::raw("COUNT(*) * $weeks as total_sessions"))
            ->groupBy('lab_id')
            ->with('lab')
            ->get();

        return view('admin.statistics.lab', [
            'data' => $data,
            'semesters' => \App\Models\Semester::all(),
            'selected_semester' => $semesterId,
            'labs' => \App\Models\Lab::all(),
            'selected_lab' => $request->lab_id
        ]);
    }

    public function exportTeacherExcel(Request $request)
    {
        $semester_id = $request->semester_id;
        $teacher_id = $request->teacher_id;

        return Excel::download(new TeacherStatisticsExport($semester_id, $teacher_id), 'thong-ke-gio-day.xlsx');
    }

    public function exportLabExcel(Request $request)
    {
        $semester_id = $request->semester_id;
        $lab_id = $request->lab_id;

        return Excel::download(new LabUsageExport($semester_id, $lab_id), 'thong-ke-phong-may.xlsx');
    }
}
