<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        DB::table('schedules')->truncate();
        $labs = ['PM01', 'PM02', 'PM03', 'PM04', 'PM05', 'PM06', 'PM07', 'PM08', 'PM09', 'PM10', 'PM11', 'PM12', 'PM13'];
        $subjects = ['GS501', 'GS502', 'GS503', 'GS504', 'GS505', 'GS506', 'GS507', 'GS508', 'GS509', 'GS510',
            'GS600', 'GS601', 'GS602', 'GS603', 'GS604', 'GS605', 'GS606', 'GS607', 'GS608',
            'GS609', 'GS610', 'GS700', 'GS701', 'GS702', 'GS703', 'GS704'];
        $teachers = ['tea1', 'tea2', 'tea3', 'tea4', 'tea5'];
        $semesters = [1];

        $usedSlots = [];

        $count = 0;
        while ($count < 30) {
            $lab = $labs[array_rand($labs)];
            $subject = $subjects[array_rand($subjects)];
            $teacher = $teachers[array_rand($teachers)];
            $semester = $semesters[array_rand($semesters)];

            $day = rand(2, 7);
            $start_period = rand(1, 10); // max start = 10 để đảm bảo không vượt tiết 12
            $total_periods = rand(3, min(5, 12 - $start_period + 1));
            $end_period = $start_period + $total_periods - 1;

            // Kiểm tra trùng lịch phòng hoặc giáo viên
            $conflict = false;
            foreach ($usedSlots as $slot) {
                if (
                    $slot['semester'] == $semester &&
                    $slot['day'] == $day &&
                    (
                        ($slot['lab'] == $lab || $slot['teacher'] == $teacher) &&
                        !($end_period < $slot['start'] || $start_period > $slot['end']) // giao nhau
                    )
                ) {
                    $conflict = true;
                    break;
                }
            }

            if ($conflict) continue;

            // Nếu không trùng, lưu lại
            $usedSlots[] = [
                'lab' => $lab,
                'teacher' => $teacher,
                'semester' => $semester,
                'day' => $day,
                'start' => $start_period,
                'end' => $end_period
            ];

            DB::table('schedules')->insert([
                'lab_id' => $lab,
                'subject_id' => $subject,
                'teacher_id' => $teacher,
                'semester_id' => $semester,
                'day_of_week' => $day,
                'start_period' => $start_period,
                'total_periods' => $total_periods,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $count++;
        }
    }
}
