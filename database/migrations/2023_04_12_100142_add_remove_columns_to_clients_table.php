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
            // $table->dropColumn('passport');
            // $table->dropColumn('c_id_2');
            // $table->dropColumn('c_id');
            // $table->dropColumn('license');
            $table->dropForeign('clients_branch_id_foreign');
            $table->dropColumn('branch_id');     
        });
        Schema::table('clients', function (Blueprint $table) {
            // $table->string('choose_num');
            // $table->string('num');
            // $table->string('code');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('hr_branches')->onDelete('cascade');
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
            //
        });
    }
};
