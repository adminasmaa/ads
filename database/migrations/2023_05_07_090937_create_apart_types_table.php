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
        Schema::create('apart_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type_name');
            $table->unsignedBigInteger('bed_id')->nullable();
            $table->foreign('bed_id')->references('id')->on('bed_types')->onDelete('cascade');
            $table->unsignedBigInteger('view_id')->nullable();
            $table->foreign('view_id')->references('id')->on('view_types')->onDelete('cascade');
            // $table->unsignedBigInteger('content_id')->nullable();
            // $table->foreign('content_id')->references('id')->on('apart_contents')->onDelete('cascade');
            $table->unsignedBigInteger('userAdd')->nullable();
            $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
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
        Schema::dropIfExists('apart_types');
    }
};
