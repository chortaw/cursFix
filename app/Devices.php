<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    protected $table='devices';
    protected $fillable=[
        'name',
        'room_id',
    ];

    public function room(){

        return $this->belongsToMany(Room::class)->withTimestamps();
    }

    public function roomtasks(){

        return $this->belongsToMany(RoomTask::class)->withTimestamps();
    }

}
