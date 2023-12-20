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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('apart_types')->onDelete('cascade');
            $table->unsignedBigInteger('apart_id');
            $table->foreign('apart_id')->references('id')->on('aparts')->onDelete('cascade');
            $table->unsignedBigInteger('content_id')->nullable();
            $table->foreign('content_id')->references('id')->on('apart_contents')->onDelete('cascade');
            $table->unsignedBigInteger('require_id');
            $table->foreign('require_id')->references('id')->on('maintenance_requires')->onDelete('cascade');
            $table->string('reason')->nullable();
            $table->string('note')->nullable();
            $table->date('expired_at')->nullable();
            $table->unsignedBigInteger('userAdd')->nullable();
            $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->unsignedBigInteger('userEdit')->nullable();
            $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('maintenances');
    }
};
