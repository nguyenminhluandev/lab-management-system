<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $requests = LeaveRequest::with('schedule')
            ->where('teacher_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('teacher.leave_requests.index', compact('requests'));
    }

    public function create()
    {
        $teacherId = auth()->id();

        $schedules = Schedule::with(['subject', 'lab', 'semester'])
            ->where('teacher_id', $teacherId)
            ->get();

        $datesBySchedule = [];

        foreach ($schedules as $schedule) {
            $dates = [];

            $semester = $schedule->semester;
            $start = Carbon::parse($semester->start_date);
            $end = Carbon::parse($semester->end_date);

            // Lặp từng ngày trong học kỳ
            for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
                // Laravel: Chủ nhật = 0, Thứ 2 = 1, ... Thứ 7 = 6
                // CSDL: Thứ 2 = 2, Thứ 7 = 7
                if (($date->dayOfWeek + 1) === $schedule->day_of_week) {
                    $dates[] = $date->toDateString(); // YYYY-MM-DD
                }
            }

            $datesBySchedule[$schedule->id] = $dates;
        }

        return view('teacher.leave_requests.create', compact('schedules', 'datesBySchedule'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'leave_date' => 'required|date',
            'makeup_date' => 'required|date|after:leave_date',
            'reason' => 'required|string',
        ], [
            'makeup_date.after' => 'Ngày dạy bù phải sau ngày nghỉ.',
        ]);

        $schedule = Schedule::with('semester')->findOrFail($request->schedule_id);
        $teacherId = Auth::id();
        $makeupDate = $request->makeup_date;
        $makeupWeekday = date('N', strtotime($makeupDate)); // 1 = Monday ... 7 = Sunday

        // Lấy tất cả lịch dạy của giáo viên trong cùng học kỳ và có thứ trùng với ngày dạy bù
        $conflictSchedules = Schedule::with('semester')
            ->where('teacher_id', $teacherId)
            ->where('semester_id', $schedule->semester_id)
            ->where('day_of_week', $makeupWeekday)
            ->get();

        $hasConflict = false;

        foreach ($conflictSchedules as $conflictSchedule) {
            $startDate = $conflictSchedule->semester->start_date;
            $endDate = $conflictSchedule->semester->end_date;

            // Lặp từng tuần, kiểm tra nếu ngày dạy bù trùng với một buổi học nào đó
            $date = \Carbon\Carbon::parse($startDate)->startOfWeek();
            $end = \Carbon\Carbon::parse($endDate)->endOfWeek();

            while ($date->lte($end)) {
                if ($date->dayOfWeekIso == $conflictSchedule->day_of_week && $date->format('Y-m-d') == $makeupDate) {
                    $hasConflict = true;
                    break;
                }
                $date->addDay();
            }

            if ($hasConflict) break;
        }

        // Nếu trùng mà không tick checkbox => thông báo lỗi
        if ($hasConflict && !$request->has('force_makeup')) {
            return back()->withInput()->withErrors([
                'makeup_date' => 'Ngày này bạn đã có lịch dạy. Nếu vẫn muốn dạy bù, hãy tick vào ô xác nhận.'
            ]);
        }

        // Lưu yêu cầu
        LeaveRequest::create([
            'schedule_id' => $schedule->id,
            'teacher_id' => $teacherId,
            'leave_date' => $request->leave_date,
            'makeup_date' => $makeupDate,
            'reason' => $request->reason,
            'status' => 'Chờ duyệt',
        ]);

        return redirect()->route('teacher.leaverequests.index')
            ->with('success', 'Gửi yêu cầu báo nghỉ thành công.');
    }
}
