<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('employee_name');
            $table->string('email_id')->unique();
            $table->string('mobile_number');
            $table->text('residence_address');
            $table->text('bank_name')->nullable();
            $table->text('bank_account_number')->nullable();
            $table->text('bank_IFSC_code')->nullable();
            $table->integer('salary');
            $table->string('designation');
            $table->boolean('admin')->default(0);
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
        Schema::create('employee_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
