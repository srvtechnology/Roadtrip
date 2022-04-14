<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    
    public function UserPackageInfo()
    {
         return $this->belongsTo('App\UserPackageInfo', 'user_id');
        
    }

}
