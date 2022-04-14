<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    //
     protected $table = 'daily_route';
     protected $primaryKey = 'route_id';

     public function Package ()
     {
         return $this->hasMany('Package::class');
     }
}
