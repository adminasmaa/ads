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
        Schema::table('rating', function (Blueprint $table) {
           $table->unsignedBigInteger('type_id')->after('rating_avg');
            $table->foreign('type_id')->references('id')->on('rating_types')->onDelete('cascade');
            $table->unsignedBigInteger('profession_id')->after('type_id');
           $table->foreign('profession_id')->references('id')->on('hr_professions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rating', function (Blueprint $table) {
            $table->dropColumn('type_id');
            $table->dropColumn('profession_id');
        });
    }
};
