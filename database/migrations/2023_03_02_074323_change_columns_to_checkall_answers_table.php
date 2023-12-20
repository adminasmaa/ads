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
        Schema::table('checkall_answers', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('answer');
            $table->dropColumn('note');
            $table->dropConstrainedForeignId('checkall_id');
        });
        Schema::table('checkall_answers', function (Blueprint $table) {
            $table->json('answers');
           
         });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkall_answers', function (Blueprint $table) {
            $table->dropColumn('answer');
        });
    }
};
