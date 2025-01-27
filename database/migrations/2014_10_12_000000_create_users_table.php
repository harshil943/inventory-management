<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('countryCode')->nullable();
            $table->string('mobile');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('address');
            $table->string('comp_logo')->nullable();
            $table->string('testimonial')->nullable();
            $table->string('gst_number')->nullable();
            $table->boolean('password_change')->default('0');
            $table->string('state_code')->nullable();
            $table->string('is_company')->default('1');
            $table->softDeletes();
            $table->rememberToken();
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
            Schema::create('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
            });
    }
}
