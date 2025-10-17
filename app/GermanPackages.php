<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GermanPackages extends Model
{
    protected $table="german_roadtrip_packages";

    public function Route ()
    {
        return $this->hasMany('Route::class');
    }
}