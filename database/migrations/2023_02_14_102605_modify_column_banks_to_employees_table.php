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
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('account_name');
            $table->dropColumn('account_number');
            $table->dropColumn('account_details');
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->json('account_name')->nullable();
            $table->json('account_number')->nullable();
            $table->json('account_details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
};
