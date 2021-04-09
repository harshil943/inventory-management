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
            $table->string('e_way_bill_number')->nullable();
            $table->string('buyer_order_number');
            $table->json('product_id');
            $table->json('hsn_code');
            $table->json('quantity');
            $table->json('unit');
            $table->json('price_per_piece');
            $table->json('name_of_extra_cost')->nullable();
            $table->json('extra_hsn_code')->nullable();
            $table->json('extra_cost_price')->nullable();
            $table->boolean('igst_applicable');
            $table->string('gst_percentage')->default('18');
            $table->string('payment_link')->nullable();
            $table->string('totalQuantity');
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
