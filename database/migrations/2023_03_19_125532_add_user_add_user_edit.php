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
        Schema::table('hr_banks', function (Blueprint $table) {
            $table->unsignedBigInteger('userAdd')->nullable();
            $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->unsignedBigInteger('userEdit')->nullable();
            $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
        });
        Schema::table('hr_branches', function (Blueprint $table) {
            $table->unsignedBigInteger('userAdd')->nullable();
            $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->unsignedBigInteger('userEdit')->nullable();
            $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
        });
        Schema::table('hr_employee_statuses', function (Blueprint $table) {
            $table->unsignedBigInteger('userAdd')->nullable();
            $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->unsignedBigInteger('userEdit')->nullable();
            $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
        });
        Schema::table('hr_job_titles', function (Blueprint $table) {
            $table->unsignedBigInteger('userAdd')->nullable();
            $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->unsignedBigInteger('userEdit')->nullable();
            $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
        });
        Schema::table('hr_nationalities', function (Blueprint $table) {
            $table->unsignedBigInteger('userAdd')->nullable();
            $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->unsignedBigInteger('userEdit')->nullable();
            $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
        });
        Schema::table('hr_professions', function (Blueprint $table) {
            $table->unsignedBigInteger('userAdd')->nullable();
            $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->unsignedBigInteger('userEdit')->nullable();
            $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
        });
        Schema::table('hr_qualifications', function (Blueprint $table) {
            $table->unsignedBigInteger('userAdd')->nullable();
            $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
            $table->unsignedBigInteger('userEdit')->nullable();
            $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
        });
           Schema::table('aparts', function (Blueprint $table) {
                $table->unsignedBigInteger('userAdd')->nullable();
                $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
                $table->unsignedBigInteger('userEdit')->nullable();
                $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
            });
            Schema::table('apart_contents', function (Blueprint $table) {
                $table->unsignedBigInteger('userAdd')->nullable();
                $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
                $table->unsignedBigInteger('userEdit')->nullable();
                $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
            });
            Schema::table('apart_values', function (Blueprint $table) {
                $table->unsignedBigInteger('userAdd')->nullable();
                $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
                $table->unsignedBigInteger('userEdit')->nullable();
                $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
            });
            Schema::table('companies', function (Blueprint $table) {
                $table->unsignedBigInteger('userAdd')->nullable();
                $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
                $table->unsignedBigInteger('userEdit')->nullable();
                $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
            });
            Schema::table('products', function (Blueprint $table) {
                $table->unsignedBigInteger('userAdd')->nullable();
                $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
                $table->unsignedBigInteger('userEdit')->nullable();
                $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
            });
            Schema::table('hr_employees', function (Blueprint $table) {
                $table->unsignedBigInteger('userAdd')->nullable();
                $table->foreign('userAdd')->references('id')->on('hr_employees')->onDelete('cascade');
                $table->unsignedBigInteger('userEdit')->nullable();
                $table->foreign('userEdit')->references('id')->on('hr_employees')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr_banks', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('hr_branches', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('hr_employee_statuses', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('hr_job_titles', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('hr_nationalities', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('hr_professions', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('hr_qualifications', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('aparts', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('apart_contents', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('apart_values', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
        Schema::table('hr_employees', function (Blueprint $table) {
            $table->dropColumn('userAdd');
            $table->dropColumn('userEdit');
        });
    }
};
