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
            $table->unsignedBigInteger('emp_id')->nullable();
            $table->foreign('emp_id')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->text('text')->change();
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
            $table->dropColumn('emp_id');
        });
    }
};
