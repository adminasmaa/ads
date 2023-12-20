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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('store_phone')->nullable();
            $table->string('delegeate_name')->nullable();
            $table->string('delegeate_email')->nullable();
            $table->string('delegeate_phone')->nullable();
            $table->boolean('is_active')->default(0);
            $table->json('transfer')->nullable();
            $table->json('maintenance')->nullable();
            $table->json('sales')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
