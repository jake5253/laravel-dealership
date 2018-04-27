<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('owner_name');
            $table->string('shop_name');
            $table->text('description');
            $table->string('hours');
            $table->string('phone');
            $table->string('address');
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->text('gmap')->nullable();
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
        Schema::dropIfExists('about');
    }
}

