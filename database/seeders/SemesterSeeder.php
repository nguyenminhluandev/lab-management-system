<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    public function run()
    {
        // Xoá dữ liệu cũ nếu có
        DB::table('semesters')->truncate();

        DB::table('semesters')->insert([
            [
                'name' => 'Học kỳ 1',
                'academic_year' => '2024-2025',
                'start_date' => '2024-08-15',
                'end_date' => '2024-12-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Học kỳ 2',
                'academic_year' => '2024-2025',
                'start_date' => '2025-01-05',
                'end_date' => '2025-05-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Học kỳ hè',
                'academic_year' => '2024-2025',
                'start_date' => '2025-06-10',
                'end_date' => '2025-07-31',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
