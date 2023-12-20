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
        Schema::table('ads_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('link')->nullable();
            $table->text('note')->nullable();
            $table->string('type_value');
            $table->string('img')->nullable();
            $table->string('start_date');
            $table->string('end_date');
            $table->string('day_value')->nullable();
            $table->string('count_days')->nullable();
            $table->string('count_total')->nullable();
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
        Schema::dropIfExists('ads_types');
    }
};
