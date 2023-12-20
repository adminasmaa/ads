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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->string('discount');
            
            // $table->enum('type',['day','week']);
            // $table->string('p_week')->nullable();
            // $table->string('p_day')->nullable();
            // $table->json('prices')->nullable();
            $table->unsignedBigInteger('apart_id');
            $table->foreign('apart_id')->references('id')->on('aparts')->onDelete('cascade');
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
        Schema::dropIfExists('prices');
    }
};
