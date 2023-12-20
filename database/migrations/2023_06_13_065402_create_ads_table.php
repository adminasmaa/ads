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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('count_visit')->default(0);
            $table->unsignedBigInteger('count_call')->default(0);
            $table->unsignedBigInteger('count_whats')->default(0);
            $table->unsignedBigInteger('count_insta')->default(0);
            $table->foreign('type_id')->references('id')->on('ads_types')->onDelete('cascade');
            $table->unsignedBigInteger('userAdd')->nullable();
            $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->unsignedBigInteger('userEdit')->nullable();
            $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('created_at')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
};
