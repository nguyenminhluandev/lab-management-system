<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('equipments')->truncate();

        $labs = ['PM01', 'PM02', 'PM03', 'PM04', 'PM05', 'PM06', 'PM07', 'PM08', 'PM09', 'PM10',
                 'PM11', 'PM12', 'PM13'];
        $items = [
            ['name' => 'Chuột Logitech M185', 'quantity' => 10, 'status' => 'Hoạt động'],
            ['name' => 'Bàn phím cơ Razer', 'quantity' => 5, 'status' => 'Hỏng'],
            ['name' => 'Loa mini', 'quantity' => 2, 'status' => 'Hoạt động'],
            ['name' => 'Màn hình Dell 24 inch', 'quantity' => 8, 'status' => 'Hoạt động'],
            ['name' => 'Thiết bị mạng Switch TP-Link', 'quantity' => 1, 'status' => 'Hỏng'],
        ];

        foreach ($labs as $lab) {
            foreach ($items as $item) {
                DB::table('equipments')->insert([
                    'lab_id'     => $lab,
                    'name'       => $item['name'],
                    'quantity'   => $item['quantity'],
                    'status'     => $item['status'],
                    'description'=> 'Được trang bị trong năm 2024',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
