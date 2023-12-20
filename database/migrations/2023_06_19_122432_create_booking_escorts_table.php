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
        Schema::create('booking_escorts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('num')->nullable();
            $table->unsignedBigInteger('nationlity_id')->nullable();
            $table->foreign('nationlity_id')->references('id')->on('hr_nationalities')->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('userAdd')->nullable();
            $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->unsignedBigInteger('booking_id')->nullable();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
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
        Schema::dropIfExists('booking_escorts');
    }
};
