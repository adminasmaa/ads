<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id'=>'1','name' => 'يعمل'],
            ['id'=>'2','name' => 'لا يعمل'],
            ['id'=>'3','name' => 'متدرب'],
            ['id'=>'4','name' => 'اجازة'],
            ['id'=>'5','name' => 'موقوف'],
          ];

         DB::table('hr_employee_statuses')->insertOrIgnore($array);
    }
}
