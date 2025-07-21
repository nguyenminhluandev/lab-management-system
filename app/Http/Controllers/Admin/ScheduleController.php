<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Lab;
use App\Models\Subject;
use App\Models\User;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\PeriodHelper;
use Laracasts\Flash\Flash;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['lab', 'subject', 'teacher', 'semester'])->paginate(10);
        return view('admin.schedules.index', compact('schedules'));
    }

    public function weeklyView()
    {
        $schedules = Schedule::with(['subject', 'teacher', 'lab', 'semester'])
            ->get()
            ->groupBy(['day_of_week', 'start_period']); // Group để dễ hiển thị dạng bảng

        return view('admin.schedules.weekly', compact('schedules'));
    }

    public function create()
    {
        $labs = Lab::all();
        $subjects = Subject::all();
        $teachers = User::where('role_id', 2)->get(); // Chỉ giáo viên
        $semesters = Semester::all();
        return view('admin.schedules.create', compact('labs', 'subjects', 'teachers', 'semesters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lab_id' => 'required|exists:labs,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:users,id',
            'semester_id' => 'required|exists:semesters,id',
            'day_of_week' => 'required|integer|min:2|max:8',
            'start_period' => 'required|integer|min:1|max:15',
            'total_periods' => 'required|integer|min:1|max:15',
        ]);

        $end_period = $request->start_period + $request->total_periods - 1;

        $exists = Schedule::where('semester_id', $request->semester_id)
            ->where('day_of_week', $request->day_of_week)
            ->where(function ($query) use ($request, $end_period) {
                $query->where('lab_id', $request->lab_id)
                    ->orWhere('teacher_id', $request->teacher_id);
            })
            ->where(function ($query) use ($request, $end_period) {
                $query->where(function ($q) use ($request, $end_period) {
                    $q->whereBetween('start_period', [$request->start_period, $end_period])
                    ->orWhereBetween(DB::raw("start_period + total_periods - 1"), [$request->start_period, $end_period])
                    ->orWhere(function ($sub) use ($request, $end_period) {
                        $sub->where('start_period', '<=', $request->start_period)
                            ->where(DB::raw("start_period + total_periods - 1"), '>=', $end_period);
                    });
                });
            })
            ->exists();

        if ($exists) {
            Flash::error('Lịch bị trùng với phòng máy hoặc giáo viên khác.');
            return back()->withInput();
        }

        Schedule::create($request->all());
        Flash::success('Thêm thời khóa biểu thành công.');
        return redirect()->route('admin.schedules.index');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $labs = Lab::all();
        $subjects = Subject::all();
        $teachers = User::where('role_id', 2)->get();
        $semesters = Semester::all();
        return view('admin.schedules.edit', compact('schedule', 'labs', 'subjects', 'teachers', 'semesters'));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $request->validate([
            'lab_id' => 'required|exists:labs,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:users,id',
            'semester_id' => 'required|exists:semesters,id',
            'day_of_week' => 'required|integer|min:2|max:8',
            'start_period' => 'required|integer|min:1|max:15',
            'total_periods' => 'required|integer|min:1|max:15',
        ]);

        $end_period = $request->start_period + $request->total_periods - 1;

        $exists = Schedule::where('id', '!=', $schedule->id)
            ->where('semester_id', $request->semester_id)
            ->where('day_of_week', $request->day_of_week)
            ->where(function ($query) use ($request) {
                $query->where('lab_id', $request->lab_id)
                    ->orWhere('teacher_id', $request->teacher_id);
            })
            ->where(function ($query) use ($request, $end_period) {
                $query->where(function ($q) use ($request, $end_period) {
                    $q->whereBetween('start_period', [$request->start_period, $end_period])
                    ->orWhereBetween(DB::raw("start_period + total_periods - 1"), [$request->start_period, $end_period])
                    ->orWhere(function ($sub) use ($request, $end_period) {
                        $sub->where('start_period', '<=', $request->start_period)
                            ->where(DB::raw("start_period + total_periods - 1"), '>=', $end_period);
                    });
                });
            })
            ->exists();

        if ($exists) {
            Flash::error('Lịch dạy bị trùng với phòng máy hoặc giáo viên trong khung giờ này.');
            return redirect()->back()->withInput();
        }

        $schedule->update($request->all());
        Flash::success('Cập nhật thời khóa biểu thành công.');
        return redirect()->route('admin.schedules.index');
    }


    // public function show(Schedule $schedule)
    // {
    //     return view('admin.schedules.show', compact('schedule'));
    // }


    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        Flash::success('Xóa thời khóa biểu thành công.');
        return redirect()->route('admin.schedules.index');
    }

    public function viewByRoom()
    {
        $labs = Lab::all();
        $semesters = Semester::all();
        return view('admin.schedules.select-room', compact('labs', 'semesters'));
    }

    public function renderRoomSchedule(Request $request)
    {
        $request->validate([
            'lab_id' => 'required|exists:labs,id',
            'semester_id' => 'required|exists:semesters,id',
        ]);

        $lab = Lab::findOrFail($request->lab_id);
        $semester = Semester::findOrFail($request->semester_id);

        $schedules = Schedule::where('lab_id', $lab->id)
            ->where('semester_id', $semester->id)
            ->with(['subject', 'teacher'])
            ->get();

        return view('admin.schedules.week-table', compact('lab', 'semester', 'schedules'));
    }

    public function viewByTeacher()
    {
        // $teachers = User::whereHas('role', function ($q) {
        //     $q->where('name', 'teacher')->orWhere('name', 'manager');
        // })->get();
        $teachers = User::whereHas('role', function ($q) {
            $q->where('name', 'teacher');
        })->get();

        $semesters = Semester::all();
        return view('admin.schedules.select-teacher', compact('teachers', 'semesters'));
    }

    public function renderTeacherSchedule(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:users,id',
            'semester_id' => 'required|exists:semesters,id',
        ]);

        $teacher = User::findOrFail($request->teacher_id);
        $semester = Semester::findOrFail($request->semester_id);

        $schedules = Schedule::where('teacher_id', $teacher->id)
            ->where('semester_id', $semester->id)
            ->with(['subject', 'lab'])
            ->get();

        return view('admin.schedules.week-table-teacher', compact('teacher', 'semester', 'schedules'));
    }
}
