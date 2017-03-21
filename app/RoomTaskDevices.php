<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTaskDevices extends Model
{
    protected $table='devices_roomtask';
    protected $fillable=[
        'roomtask_id',
        'devices_id',
    ];
}
