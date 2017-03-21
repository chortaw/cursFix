<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('devices_room',function (Blueprint $table)
        {

            $table->integer('room_id')->unsigned()->index();
            $table->foreign('room_id')
                ->references('id')->on('room_list')->onDelete('cascade');
            ////
            $table->integer('devices_id')->unsigned()->index();
            $table->foreign('devices_id')->references('id')->on('devices')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('devices_room_task',function (Blueprint $table)
        {

            $table->integer('room_task_id')->unsigned()->index();
            $table->foreign('room_task_id')
                ->references('id')->on('room_tasks')->onDelete('cascade');
            ////
            $table->integer('devices_id')->unsigned()->index();
            $table->foreign('devices_id')->references('id')->on('devices')->onDelete('cascade');
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
        Schema::drop('devices');
        Schema::drop('rooms_device');
        Schema::drop('devices_roomtask');

    }
}
