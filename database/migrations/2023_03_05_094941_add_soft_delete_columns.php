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
            $table->softDeletes();
        });
        Schema::table('apart_contents', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('apart_values', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('checkalls', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('checkall_answers', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('checkall_types', function (Blueprint $table) {
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
        Schema::table('aparts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('apart_contents', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('apart_values', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('checkalls', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('checkall_answers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('checkall_types', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
