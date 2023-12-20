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
        Schema::table('hr_employee_statuses', function (Blueprint $table) {
            //
            Schema::rename('employee_statuses', 'hr_employee_statuses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr_employee_statuses', function (Blueprint $table) {
            //
            Schema::rename('hr_employee_statuses', 'employee_statuses');

        });
    }
};
