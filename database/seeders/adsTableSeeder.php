<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array = [
            ['name' => 'ماجيستك', 'type_id' => 1],
        ];

        DB::table('ads')->insertOrIgnore($array);

    }

}
