<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id'=>'1','name' => 'الكويت','code'=>'+965','name_en'=>'kuwait','abbr'=>'kw'],
            ['id'=>'2','name' => 'البحرين ','code'=>'+973','name_en'=>'Bahrain','abbr'=>'bh'],
            ['id'=>'3','name' => 'عمان','code'=>'+968','name_en'=>'Oman','abbr'=>'Om'],
            ['id'=>'4','name' => 'قطر','code'=>'+974','name_en'=>'Qatar','abbr'=>'qa'],
            ['id'=>'5','name' => 'المملكه العربيه السعوديه','code'=>'+966','name_en'=>'Saudi Arabia','abbr'=>'sa'],
            ['id'=>'6','name' => 'الامارات العربية المتحدة','code'=>'+971','name_en'=>'United Arab Emirates','abbr'=>'ae'],
            ['id'=>'7','name' => 'مصر','code'=>'+20','name_en'=>'Egypt','abbr'=>'eg'],
          ];

         DB::table('countries')->insertOrIgnore($array);
    }
}
