<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsigneeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignee_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('number');
            $table->string('gst_number');
            $table->string('state_code');
            $table->string('address');
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
        Schema::dropIfExists('consignee_details');
    }
}
