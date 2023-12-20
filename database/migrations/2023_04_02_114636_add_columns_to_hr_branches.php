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
        Schema::table('hr_branches', function (Blueprint $table) {
            $table->dropColumn('name');
        
        });
        Schema::table('hr_branches', function (Blueprint $table) {
           
            $table->json('name')->nullable();
            $table->json('link')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr_branches', function (Blueprint $table) {
            //
        });
    }
};
