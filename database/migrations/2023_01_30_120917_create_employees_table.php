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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cid')->unique();
            $table->date('birthDate');
            $table->string('pass_number')->unique();
            $table->string('user_img');
            $table->string('cid_img');
            $table->string('pass_img');
            $table->date('pass_date');
            $table->string('jobTitle')->nullable();
            $table->enum('type', ['male','female']);
            $table->string('date_expiry');
            $table->string('permit_img');
            $table->date('start_date');
            $table->date('date_of_hiring');
            $table->float('salary');
            $table->float('sal_per_work');
            $table->string('status_note');
            $table->string('qual_img');
            $table->string('work_time');
            $table->enum('Living', ['employees','external_employees']);
            $table->string('home_address');
            $table->json('license')->nullable();
            $table->boolean('bank_account');
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_details')->nullable();
            $table->string('addr_emp');
            $table->string('cid_address')->unique();
            $table->string('phone_one')->unique();
            $table->string('phone_two')->unique();
            $table->json('closest_person')->nullable();
            $table->unsignedBigInteger('job_title_id');
            $table->foreign('job_title_id')
            ->references('id')->on('job_titles')->onDelete('cascade');

            $table->unsignedBigInteger('qual_id')->nullable();
            $table->foreign('qual_id')
            ->references('id')->on('qualifications')->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
};
