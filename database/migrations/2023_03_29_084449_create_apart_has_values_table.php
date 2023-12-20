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
        Schema::create('apart_has_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apart_id');
            $table->foreign('apart_id')->references('id')->on('aparts')->onDelete('cascade');
            $table->unsignedBigInteger('value_id');
            $table->foreign('value_id')->references('id')->on('apart_values')->onDelete('cascade');
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
        Schema::dropIfExists('apart_has_values');
    }
};
