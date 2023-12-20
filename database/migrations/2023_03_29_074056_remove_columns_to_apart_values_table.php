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
        Schema::table('apart_values', function (Blueprint $table) {
            $table->dropForeign('contents_apartment_id_foreign');
            $table->dropColumn('apartment_id');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apart_values', function (Blueprint $table) {
            //
        });
    }
};
