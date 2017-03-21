<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCameraTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camera_task', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamp('start_at');
            $table->timestamp('finish_at');

            $table->foreign('user_id') // user id
            ->references('id') // ref id
            ->on('users')//on user table
            ->onDelete('cascade'); //on delete

            $table->string('place');
            $table->string('camera');
            $table->string('cameraMan');
            $table->text('description');
            $table->string('contactNumber');
            $table->boolean('status')->default(false);
            $table->integer('hours')->unsigned();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('camera_task');
    }
}
