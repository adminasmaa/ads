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
            $table->enum('status', ['available', 'leave_today', 'clean', 'maintain', 'busy', 'late'])->default('available');
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
