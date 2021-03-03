<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineErrorReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_error_report', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('asset_id');
            $table->foreign('asset_id')->references('id')->on('assets_details');
            $table->string('error_details');
            $table->date('error_issue_date');
            $table->date('error_solve_date')->nullable();
            $table->boolean('error_status');
            $table->float('cost');
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
        Schema::create('machine_error_report', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
