<?php

namespace App\Exports;

use App\Models\Schedule;
use App\Models\Semester;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TeacherStatisticsExport implements FromView
{
    protected $semester_id;
    protected $teacher_id;

    public function __construct($semester_id, $teacher_id = null)
    {
        $this->semester_id = $semester_id;
        $this->teacher_id = $teacher_id;
    }

    public function view(): View
    {
        // Lấy học kỳ để tính số tuần
        $semester = Semester::find($this->semester_id);
        if (!$semester) {
            abort(404, 'Không tìm thấy học kỳ');
        }

        $weeks = Carbon::parse($semester->start_date)
            ->diffInWeeks(Carbon::parse($semester->end_date)) + 1;

        $query = Schedule::with('teacher')
            ->where('semester_id', $this->semester_id);

        if ($this->teacher_id) {
            $query->where('teacher_id', $this->teacher_id);
        }

        // Thống kê tổng tiết theo giáo viên
        $baseData = $query->select('teacher_id', DB::raw('SUM(total_periods) as base_periods'))
            ->groupBy('teacher_id')
            ->get();

        // Nhân số tuần để ra tổng số tiết thực tế
        $data = $baseData->map(function ($item) use ($weeks) {
            $item->total_periods = $item->base_periods * $weeks;
            return $item;
        });

        return view('admin.exports.teacher', ['data' => $data]);
    }
}
