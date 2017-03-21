<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTask extends Model
{

    protected $table='room_tasks';
    protected $fillable=[
        'user_id',
        'room_id',
        'role',
        'sub_role',
        'description',
        'topic',
        'capacity',
        'start_at',
        'hours',
        'finish_at',
    ];

    //RoomTask own by user One to Many
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function roomlist(){
        return $this->belongsTo('App\Room','room_id');
    }

    public function devices (){

        //Any Room  may have many devices
        //Any devices may be applied to many room

        return $this->belongsToMany(Devices::class)->withTimestamps();
    }

    ////GET LIST OF DEVICES ASSOCIATED WITH ROOM
    public function devicesList(){

        return $this->devices->pluck('id')->all();

    }

    public function roles(){
        return $this->belongsTo('App\Role','role');
    }

    public function subroles(){
        return $this->belongsTo('App\SubRole','sub_role');
    }

}
