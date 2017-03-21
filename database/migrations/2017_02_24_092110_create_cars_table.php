<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->text('description');
            $table->text('purpose');
            $table->string('place');
            $table->string('contactNumber');
            $table->integer('passenger')->unsigned();
            $table->timestamp('start_at');
            $table->timestamps('finish_at');
            $table->string('vehicle');
            $table->boolean('status')->default(false);
            $table->string('driver');
            $table->integer('houurs')->unsigned();



            $table->foreign('user_id') // user id
            ->references('id') // ref id
            ->on('users')//on user table
            ->onDelete('cascade'); //on delete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
}
}
