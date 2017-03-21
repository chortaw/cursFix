<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table='room_list';
    protected $fillable=[
        'roomname',
        'image',
        'capacity',
        'description',

    ];

    public function devices(){

        //Any Room  may have many devices
        //Any devices may be applied to many room

        return $this->belongsToMany(Devices::class)->withTimestamps();
    }




    ////GET LIST OF DEVICES ASSOCIATED WITH ROOM
    public function devicesList(){

        return $this->devices->pluck('id')->all();

    }



}
