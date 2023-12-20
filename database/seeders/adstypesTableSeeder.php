<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adstypesTableSeeder extends Seeder
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
            ['name' => 'ماجيستك', 'link' => 'https://mynewhotels.net/majesticc/index.php'],
        ];

        DB::table('ads_types')->insertOrIgnore($array);

    }

}
