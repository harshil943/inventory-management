<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('product_category');
            $table->string('product_name');
            $table->string('product_image_name');
            $table->boolean('product_filter_type');
            $table->string('product_info_1');
            $table->string('product_info_2');
            $table->string('extra_info_1')->nullable();
            $table->string('extra_info_2')->nullable();
            $table->string('extra_info_3')->nullable();
            $table->string('extra_info_4')->nullable();
            $table->string('available_sizes')->nullable();
            $table->string('available_color_bottle')->nullable();
            $table->string('available_color_cap')->nullable();
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
        Schema::create('product_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
