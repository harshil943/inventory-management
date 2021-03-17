<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrightContainersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bright_containers_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email');
            $table->text('head_office_address');
            $table->string('gst_number');
            $table->string('pan_number');
            $table->string('state_code');
            $table->string('contact_number');
            $table->string('alternate_contact_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('acc_no')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('IFSC_code')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->string('google_business_link')->nullable();
            $table->string('google_maps_link_factory')->nullable();
            $table->string('google_maps_link_office')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('gst_percentage');
            $table->string('logo_name');
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
        Schema::create('bright_containers_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
