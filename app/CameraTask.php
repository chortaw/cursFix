<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CameraTask extends Model
{
    protected $table = 'camera_task';

    protected $fillable=[
        'contactNumber',
        'user_id',
        'camera',
        'cameraMan',
        'status',
        'hours',
        'description',
        'place',
        'start_at',
        'finish_at',
    ];

    //CameraTask own by user One to Many
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function roles(){
        return $this->belongsTo('App\Role','role');
    }

    public function subroles(){
        return $this->belongsTo('App\SubRole','sub_role');
    }

}
