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
        Schema::table('aparts', function (Blueprint $table) {
            $table->enum('type',['day','week']);
            $table->Json('day_p')->nullable();
            $table->Json('week_p')->nullable();
            $table->string('price')->nullable()->change();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aparts', function (Blueprint $table) {
            //
        });
    }
};
