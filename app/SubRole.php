<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubRole extends Model
{
    protected $table = 'sub_roles';
    protected $fillable=[
        'name',

    ];
}
