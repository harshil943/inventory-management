<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product_details');
            $table->string('quantity');
            $table->float('cost_per_product');
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
        Schema::create('inventory_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
