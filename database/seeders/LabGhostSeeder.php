<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabGhostSeeder extends Seeder
{
    public function run()
    {
        DB::table('lab_ghosts')->truncate();

        $assignments = [
            [
                'lab_id' => 'PM01',
                'ghost_id' => 'GHOST001',
                'assigned_at' => now()->subDays(10),
                'is_active' => true,
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'lab_id' => 'PM02',
                'ghost_id' => 'GHOST002',
                'assigned_at' => now()->subDays(7),
                'is_active' => false,
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(7),
            ],
            [
                'lab_id' => 'PM02',
                'ghost_id' => 'GHOST003',
                'assigned_at' => now()->subDays(3),
                'is_active' => true,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
        ];

        DB::table('lab_ghosts')->insert($assignments);
    }
}
