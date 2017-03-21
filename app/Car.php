<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Car extends Model
{
    protected $table = 'car_list';
    protected $fillable=[
        'description',
        'capacity',
        'model',
        'brand',
        'type',
        'role','sub_role',
        'license',
        'image',

    ];
    public function carTask(){

        return $this->belongsTo('App\CarTask', 'vehicle');
    }

}
