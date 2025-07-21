<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LabGhost;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            LabSeeder::class,
            ComputerSeeder::class,
            SubjectSeeder::class,
            SemesterSeeder::class,
            ScheduleSeeder::class,
            EquipmentSeeder::class,
            GhostSeeder::class,
            LabGhostSeeder::class
        ]);
    }
}
