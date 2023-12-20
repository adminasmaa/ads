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
        Schema::table('hr_award_discounts', function (Blueprint $table) {
            $table->enum('status',['waiting','accepted','rejected'])->default('waiting');
        });
    }

    /**
     * Reverse the migrations.
     * 
     *
     * @return void
     */
    public function down()
    {
        Schema::table('award_discounts', function (Blueprint $table) {
            //
        });
    }
};
