<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id'=>'1','name' => json_encode(['ar' => 'ادارة الفنادق'])],
            ['id'=>'2','name' => json_encode(['ar' => 'ريحانه'])],
            ['id'=>'3','name' => json_encode(['ar' => 'ماجستيك السالميه'])],
            ['id'=>'4','name' => json_encode(['ar' => 'رافال'])],
            ['id'=>'5','name' => json_encode(['ar' => 'كريستال'])],
            ['id'=>'6','name' => json_encode(['ar' => 'ماجستيك حولي'])],
            ['id'=>'7','name' => json_encode(['ar' => 'ارجان'])],
            ['id'=>'8','name' => json_encode(['ar' => 'الدانة'])],
            ['id'=>'9','name' => json_encode(['ar' => 'الدرة'])],
          ];

         DB::table('hr_branches')->insertOrIgnore($array);
    }
}
