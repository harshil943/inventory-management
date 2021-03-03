<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMaterialPurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_material_purchase_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('material_name');
            $table->integer('quantity');
            $table->float('cost_per_quantity');
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
        Schema::create('raw_material_purchase_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
