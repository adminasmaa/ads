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
        Schema::create('filesmangers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('notes');
            $table->string('path');
            $table->string('expired_date');
            $table->unsignedBigInteger('file_type_id')->nullable();
            $table->foreign('file_type_id')->references('id')->on('files_types')->onDelete('cascade');
            $table->unsignedBigInteger('file_dept_id')->nullable();
            $table->foreign('file_dept_id')->references('id')->on('files_depts')->onDelete('cascade');
            $table->unsignedBigInteger('userEdit')->nullable();
            $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('filesmangers');
    }
};
