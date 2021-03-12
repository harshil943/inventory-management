<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapOrderChallanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_order_challan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('order_details');
            $table->unsignedInteger('challan_id')->nullable();
            $table->foreign('challan_id')->references('id')->on('challan_details');
            $table->unsignedInteger('buyer_id');
            $table->unsignedInteger('seller_id');
            $table->boolean('consignee_available');
            $table->unsignedInteger('consignee_id');
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->foreign('seller_id')->references('id')->on('bright_containers_details');
            $table->string('vehical_number')->nullable();
            $table->string('order_status');
            $table->string('payment_status');
            $table->date('shipping_date')->nullable();
            $table->string('dispatch_document_number')->nullable();
            $table->string('lr_number')->nullable();
            $table->date('order_date');
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
        Schema::dropIfExists('map_order_challan');
    }
}
