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
            $table->text('countryCode');
            $table->string('mobile');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('address');
            $table->string('company_name');
            $table->string('comp_logo')->nullable();
            $table->string('testimonial')->default('null');
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
