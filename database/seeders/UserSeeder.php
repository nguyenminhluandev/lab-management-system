<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'id' => 'adm',
                'name' => 'Admin Nguyễn Minh Luân',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'tea1',
                'name' => 'Trần Thị B',
                'email' => 'teacher1@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'mng1',
                'name' => 'GV Phụ Trách C',
                'email' => 'manager1@example.com',
                'password' => Hash::make('password'),
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'tea2',
                'name' => 'Nguyễn Văn D',
                'email' => 'teacher2@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'tea3',
                'name' => 'Lê Thị E',
                'email' => 'teacher3@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'tea4',
                'name' => 'Phạm Văn F',
                'email' => 'teacher4@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'tea5',
                'name' => 'Trần Thị G',
                'email' => 'teacher5@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'mng2',
                'name' => 'GVPT Lê Hồng',
                'email' => 'manager2@example.com',
                'password' => Hash::make('password'),
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'mng3',
                'name' => 'GVPT Nguyễn Văn I',
                'email' => 'manager3@example.com',
                'password' => Hash::make('password'),
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'mng4',
                'name' => 'GVPT Lê Thị K',
                'email' => 'manager4@example.com',
                'password' => Hash::make('password'),
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'mng5',
                'name' => 'GVPT Trần Văn L',
                'email' => 'manager5@example.com',
                'password' => Hash::make('password'),
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
