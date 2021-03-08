<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('email')-nullable();
            $table->string('contact_number');
            $table->string('company_name')->nullable();
            $table->string('product_category')->nullable();
            $table->string('product_name')->nullable();
            $table->string('query')->nullable();
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
        Schema::create('contact_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
