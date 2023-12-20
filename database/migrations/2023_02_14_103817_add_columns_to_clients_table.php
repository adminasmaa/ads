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
            $table->string('name'); 
            $table->string('phone'); 
            $table->string('c_id'); 
            $table->string('nationality_id'); 
            $table->string('status')->nullable(); 
            $table->text('status_reason')->nullable(); 
            $table->string('client_img_1')->nullable(); 
            $table->string('client_img_2')->nullable(); 
            $table->string('contract_img')->nullable(); 
           
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
