<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        DB::table('subjects')->truncate(); // hoặc Model::truncate(); xóa toàn bộ dữ liệu trong bảng subjects một cách nhanh chóng, đồng thời reset lại auto-increment ID
        DB::table('subjects')->insert([
            ['id' => 'GS501', 'name' => 'Tin học cơ bản'],
            ['id' => 'GS502', 'name' => 'Mạng máy tính'],
            ['id' => 'GS503', 'name' => 'Cơ sở dữ liệu'],
            ['id' => 'GS504', 'name' => 'Lập trình C++'],
            ['id' => 'GS505', 'name' => 'Lập trình Java'],
            ['id' => 'GS506', 'name' => 'Lập trình Python'],
            ['id' => 'GS507', 'name' => 'Lập trình PHP'],
            ['id' => 'GS508', 'name' => 'Lập trình JavaScript'],
            ['id' => 'GS509', 'name' => 'Lập trình HTML/CSS'],
            ['id' => 'GS510', 'name' => 'Lập trình SQL'],
            ['id' => 'GS600', 'name' => 'Giải thuật và cấu trúc dữ liệu'],
            ['id' => 'GS601', 'name' => 'Lập trình hướng đối tượng'],
            ['id' => 'GS602', 'name' => 'Trí tuệ nhân tạo'],
            ['id' => 'GS603', 'name' => 'Machine Learning'],
            ['id' => 'GS604', 'name' => 'Deep Learning'],
            ['id' => 'GS605', 'name' => 'Lập trình Web'],
            ['id' => 'GS606', 'name' => 'Phát triển phần mềm'],
            ['id' => 'GS607', 'name' => 'Khoa học máy tính'],
            ['id' => 'GS608', 'name' => 'Mạng và truyền thông'],
            ['id' => 'GS609', 'name' => 'An toàn thông tin'],
            ['id' => 'GS610', 'name' => 'Phát triển ứng dụng di động'],
            ['id' => 'GS700', 'name' => 'Phát triển phần mềm web'],
            ['id' => 'GS701', 'name' => 'Phát triển phần mềm Blockchain'],
            ['id' => 'GS702', 'name' => 'Phát triển phần mềm VR/AR'],
            ['id' => 'GS703', 'name' => 'Phát triển phần mềm Game'],
            ['id' => 'GS704', 'name' => 'Phát triển phần mềm Desktop']
        ]);
    }
}
