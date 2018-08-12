<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Barryvdh\DomPDF\PDF;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('logo')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->default('Address');
            $table->string('address_city')->default('City');
            $table->string('address_state')->default('State');
            $table->string('address_country')->default('Country');
            $table->string('address_zipcode')->default('ZIP CODE');
            $table->string('website_url')->default('website.com');
            $table->string('tel_number')->default('000000000');
            $table->string('company_email')->default('email@email.com');
            $table->integer('tax')->default(20);
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
        Schema::dropIfExists('users');
    }
}
