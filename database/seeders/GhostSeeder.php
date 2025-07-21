<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GhostSeeder extends Seeder
{
    public function run()
    {
        DB::table('ghosts')->truncate();

        $ghosts = [
            [
                'id' => 'GHOST001',
                'name' => 'Ghost Windows 10',
                'version' => 'v1.0',
                'file_path' => '/ghosts/ghost_win10_v1.gho',
                'size' => '12GB',
                'description' => 'Ghost chuẩn Windows 10 đầy đủ phần mềm cơ bản',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'GHOST002',
                'name' => 'Ghost Windows 11',
                'version' => 'v2.1',
                'file_path' => '/ghosts/ghost_win11_v2.1.gho',
                'size' => '15GB',
                'description' => 'Ghost Windows 11 tối ưu cho học lập trình',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'GHOST003',
                'name' => 'Ghost Ubuntu',
                'version' => 'v1.5',
                'file_path' => '/ghosts/ghost_ubuntu_v1.5.gho',
                'size' => '8GB',
                'description' => 'Ghost hệ điều hành Ubuntu 22.04 LTS',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('ghosts')->insert($ghosts);
    }
}

