<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('labs')->insert([
            ['id' => 'PM01', 'name' => 'Phòng máy 01', 'manager_id' => 'mng1'],
            ['id' => 'PM02', 'name' => 'Phòng máy 02', 'manager_id' => 'mng1'],
            ['id' => 'PM03', 'name' => 'Phòng máy 03', 'manager_id' => 'mng2'],
            ['id' => 'PM04', 'name' => 'Phòng máy 04', 'manager_id' => 'mng2'],
            ['id' => 'PM05', 'name' => 'Phòng máy 05', 'manager_id' => 'mng3'],
            ['id' => 'PM06', 'name' => 'Phòng máy 06', 'manager_id' => 'mng3'],
            ['id' => 'PM07', 'name' => 'Phòng máy 07', 'manager_id' => 'mng4'],
            ['id' => 'PM08', 'name' => 'Phòng máy 08', 'manager_id' => 'mng4'],
            ['id' => 'PM09', 'name' => 'Phòng máy 09', 'manager_id' => 'mng5'],
            ['id' => 'PM10', 'name' => 'Phòng máy 10', 'manager_id' => 'mng5'],
            ['id' => 'PM11', 'name' => 'Phòng máy 11', 'manager_id' => 'mng1'],
            ['id' => 'PM12', 'name' => 'Phòng máy 12', 'manager_id' => 'mng2'],
            ['id' => 'PM13', 'name' => 'Phòng máy 13', 'manager_id' => 'mng3'],
        ]);
    }
}
