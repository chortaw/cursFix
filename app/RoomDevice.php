<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomDevice extends Model
{
    protected $table='devices_room';
    protected $fillable=[
        'devices_id',
        'room_id'
    ];
}
