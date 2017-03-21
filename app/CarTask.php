<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarTask extends Model
{
    protected $table='cars';
    protected $fillable=[
        'description',
        'purpose',
        'user_id',
        'role',
        'sub_role',
        'place',
        'contactNumber',
        'passenger',
        'vehicle',
        'driver',
        'status',
        'finish_at',
        'start_at',
        'hours'
    ];
    //RoomTask own by user One to Many
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function carlist(){
        return $this->belongsTo('App\Car', 'vehicle');
    }

    public function roles(){
        return $this->belongsTo('App\Role','role');
    }

    public function subroles(){
        return $this->belongsTo('App\SubRole','sub_role');
    }

    public function alllists(){
        return $this->belongsTo('App\Car', 'vehicle');
    }

}
