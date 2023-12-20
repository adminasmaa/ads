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
        Schema::table('maintenances', function (Blueprint $table) {
            $table->string('status')->nullable()->after('userEdit');
            $table->string('image')->nullable()->after('status');
            $table->unsignedBigInteger('value_id')->nullable()->after('require_id');
            $table->foreign('value_id')->references('id')->on('apart_values')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maintenances', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('image');
            $table->dropColumn('value_id');

        });
    }
};
