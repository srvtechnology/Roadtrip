<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function Route ()
    {
        return $this->hasMany('Route::class');
    }

  
}
