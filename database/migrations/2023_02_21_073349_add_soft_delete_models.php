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
        Schema::table('clients', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('marks', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('classes', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('marks', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('classes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
