<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id'=>'1','name' => 'الصالة'],
            ['id'=>'2','name' => 'الماستر'],
            ['id'=>'3','name' => 'المطبخ'],
            ['id'=>'4','name' => 'الغرفه الاولى'],
            ['id'=>'5','name' => 'الغرفه الثانيه'],
            ['id'=>'6','name' => 'الحمام'],
            ['id'=>'7','name' => 'حمام ماستر'],
           
          ];

         DB::table('apart_contents')->insertOrIgnore($array);
    }
}
