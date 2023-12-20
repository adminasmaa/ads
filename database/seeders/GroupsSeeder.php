<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ProfessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id'=>'1','name' => 'مدير'],
            ['id'=>'2','name' => 'نائب مدير '],
            ['id'=>'3','name' => 'مسئول فرع'],
            ['id'=>'4','name' => 'غير مفعل'],
            ['id'=>'5','name' => 'محاسب'],
            ['id'=>'6','name' => 'موظف استقبال'],
            ['id'=>'7','name' => 'مشرف خدمات غرف '],
          ];

         DB::table('professions')->insertOrIgnore($array);
    }
}
