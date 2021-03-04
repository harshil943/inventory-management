<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('asset_name');
            $table->date('purchase_date');
            $table->date('selling_date');
            $table->float('asset_amount');
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
        Schema::create('assets_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
