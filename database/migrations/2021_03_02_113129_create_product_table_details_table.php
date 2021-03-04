<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTableDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_table_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product_details');
            $table->string('table_header');
            $table->string('brimful_capacity');
            $table->float('height');
            $table->float('length');
            $table->float('thickness');
            $table->float('label_height');
            $table->integer('neck_id');
            $table->float('standard_weight');
            $table->string('MOQ');
            $table->string('cap_name');
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
        Schema::create('product_table_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
