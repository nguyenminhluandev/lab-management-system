<?php

namespace App\Exports;

use App\Models\Schedule;
use App\Models\Semester;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LabUsageExport implements FromView
{
    protected $semester_id;
    protected $lab_id;

    public function __construct($semester_id, $lab_id = null)
    {
        $this->semester_id = $semester_id;
        $this->lab_id = $lab_id;
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

        $query = Schedule::with('lab')
            ->where('semester_id', $this->semester_id);

        if ($this->lab_id) {
            $query->where('lab_id', $this->lab_id);
        }

        // Tổng số buổi/lịch dạy của từng phòng máy (mỗi dòng là 1 buổi)
        $baseData = $query->select('lab_id', DB::raw('COUNT(*) as base_sessions'))
            ->groupBy('lab_id')
            ->get();

        // Nhân với số tuần
        $data = $baseData->map(function ($item) use ($weeks) {
            $item->total_sessions = $item->base_sessions * $weeks;
            return $item;
        });

        return view('admin.exports.lab', ['data' => $data]);
    }
}
