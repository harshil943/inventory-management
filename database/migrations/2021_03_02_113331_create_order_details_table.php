<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('user_id');
            $table->json('product_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->json('quantity');
            $table->json('price_per_piece');
            $table->json('name_of_extra_cost')->nullable();
            $table->json('extra_cost_price')->nullable();
            $table->string('order_status');
            $table->string('payment_link');
            $table->string('payment_status');
            $table->date('order_date');
            $table->date('due_date');
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
        Schema::create('order_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
