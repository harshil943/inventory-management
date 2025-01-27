<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalaryHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salary_history', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employee_details');
            $table->float('salary_paid');
            $table->string('payment_status')->nullable();
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
        Schema::create('employee_salary_history', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
