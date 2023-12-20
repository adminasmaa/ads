<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hr_banks', function (Blueprint $table) {
            //
            Schema::rename('banks', 'hr_banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr_banks', function (Blueprint $table) {
            //
            Schema::rename('hr_banks', 'banks');

        });
    }
};
