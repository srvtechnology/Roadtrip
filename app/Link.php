<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function Route ()
    {
        return $this->hasMany('Route::class');
    }

  
}
