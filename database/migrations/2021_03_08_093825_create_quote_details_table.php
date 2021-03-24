<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('company_name');
            $table->string('email')->nullable();
            $table->string('contact_number');
            $table->string('select_product_size')->nullable();
            $table->integer('quantity_needed');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product_details');
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
        Schema::create('quote_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
