<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_status', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('order_details');
            $table->string('payment_link');
            $table->float('payable_amount');
            $table->string('payment_status');
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
        Schema::create('payment_status', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
