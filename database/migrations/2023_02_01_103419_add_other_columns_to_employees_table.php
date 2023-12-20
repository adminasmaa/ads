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
            $table->unsignedBigInteger('nation_id')->nullable();
            $table->foreign('nation_id')
            ->references('id')->on('nationalities')->onDelete('cascade');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')
            ->references('id')->on('banks')->onDelete('cascade');
            $table->unsignedBigInteger('profession_id')->nullable();
            $table->foreign('profession_id')
            ->references('id')->on('professions')->onDelete('cascade');
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
            $table->dropColumn('nation_id');
            $table->dropColumn('bank_id');
            $table->dropColumn('profession_id');
        });
    }
};
