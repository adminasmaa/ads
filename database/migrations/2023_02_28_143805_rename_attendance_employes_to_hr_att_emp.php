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
        Schema::table('hr_att_emp', function (Blueprint $table) {
            //
            Schema::rename('attendance_employes', 'hr_att_emp');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr_att_emp', function (Blueprint $table) {
            //
            Schema::rename('hr_att_emp', 'attendance_employes');

        });
    }
};
