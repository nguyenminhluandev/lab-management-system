<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputerSeeder extends Seeder
{
    public function run()
    {
        $labs = DB::table('labs')->pluck('id')->toArray();
        $count = 1;
        $computers = [];

        foreach ($labs as $labId) {
            $errorCount = rand(1, 2); // số máy hỏng trong phòng này
            $errorIndexes = [];

            // chọn ngẫu nhiên các vị trí máy sẽ bị hỏng trong số 15 máy
            while (count($errorIndexes) < $errorCount) {
                $randIndex = rand(1, 15);
                if (!in_array($randIndex, $errorIndexes)) {
                    $errorIndexes[] = $randIndex;
                }
            }

            for ($i = 1; $i <= 15; $i++) {
                $id = 'C' . str_pad($count, 3, '0', STR_PAD_LEFT);
                $computers[] = [
                    'id' => $id,
                    'name' => "Máy $id",
                    'lab_id' => $labId,
                    'cpu' => ['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5'][rand(0, 2)],
                    'ram' => ['4GB', '8GB', '16GB'][rand(0, 2)],
                    'storage' => ['256GB SSD', '512GB SSD', '1TB HDD'][rand(0, 2)],
                    'status' => in_array($i, $errorIndexes) ? 'Hỏng' : 'Hoạt động',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $count++;
            }
        }

        DB::table('computers')->insert($computers);
    }
}
