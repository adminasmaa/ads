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
        Schema::create('booking_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from')->nullable();
            $table->foreign('from')->references('id')->on('aparts')->onDelete('cascade');
            $table->unsignedBigInteger('to')->nullable();
            $table->foreign('to')->references('id')->on('aparts')->onDelete('cascade');
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('booking_transfers');
    }
};
