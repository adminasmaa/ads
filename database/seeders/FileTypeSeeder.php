<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $array = [
            ['id'=>'1','name' => 'user_img','type'=>'صوره الشخصيه'],
            ['id'=>'2','name' => 'cid_img','type'=>'صوره المدنيه'],
            ['id'=>'3','name' => 'pass_img','type'=>'صوره جواز السفر'],
            ['id'=>'4','name' => 'permit_img','type'=>'صوره اذن العمل'],
            ['id'=>'5','name' => 'qual_img','type'=>'صوره الموهل'],
            ['id'=>'6','name' => 'security','type'=>'صوره ايصال امانه'],
            ['id'=>'7','name' => 'Kuwait','type'=>'صوره ليسن كويتى'],
            ['id'=>'8','name' => 'egypt','type'=>'صوره ليسن مصرى'],
          ];

         DB::table('hr_file_type')->insertOrIgnore($array);
    }
}
