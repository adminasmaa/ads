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
        Schema::create('attendance_employes', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('attendance_image');
            $table->string('check_in_time');
            $table->string('check_out_time');
            $table->unsignedBigInteger('employees_id');
            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_employes');
    }
};
