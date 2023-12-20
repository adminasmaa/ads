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
        Schema::table('hr_emp_notes', function (Blueprint $table) {
            $table->unsignedBigInteger('userDelete')->nullable();
            $table->foreign('userDelete')->references('id')->on('hr_employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr_emp_notes', function (Blueprint $table) {
            $table->dropColumn('userDelete');
        });
    }
};
