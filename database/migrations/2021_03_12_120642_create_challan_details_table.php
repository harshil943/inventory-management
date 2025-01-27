<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challan_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('total_no_packages');
            $table->json('product_id');
            $table->json('is_cap');
            $table->json('color');
            $table->json('bundle');
            $table->json('pack_size');
            $table->string('extra_note')->nullable();
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
        Schema::dropIfExists('challan_details');
    }
}
