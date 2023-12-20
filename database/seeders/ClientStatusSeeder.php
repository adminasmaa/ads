<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id'=>'1','name' => 'عادى'],
            ['id'=>'2','name' => 'مميز '],
            ['id'=>'3','name' => 'بلاك لست'],
          ];

         DB::table('client_statuses')->insertOrIgnore($array);
    }
}
