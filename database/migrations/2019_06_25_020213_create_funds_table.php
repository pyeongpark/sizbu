<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('loginname', 30);
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->string('country', 30);
            $table->string('phonecode', 5);
            $table->string('phonenumber', 20);
            $table->string('email', 50);
            $table->boolean('contactme');
            $table->integer('amount');
            $table->string('product', 20);
            $table->string('description', 1000);
            $table->timestamps();
            $table->index('country');
            $table->index('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funds');
    }
}
