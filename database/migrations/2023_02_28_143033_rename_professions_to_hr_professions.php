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
        Schema::table('hr_professions', function (Blueprint $table) {
            //
            Schema::rename('professions', 'hr_professions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr_professions', function (Blueprint $table) {
            //
            Schema::rename('hr_professions', 'professions');

        });
    }
};
