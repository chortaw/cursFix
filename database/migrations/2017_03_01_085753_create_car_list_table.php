<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_list', function (Blueprint $table) {

            $table->increments('id');
            $table->string('image');
            $table->string('brand');
            $table->string('model');
            $table->string('type');
            $table->string('license');
            $table->integer('capacity');
            $table->string('description');
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
        Schema::dropIfExists('car_list');
    }
}
