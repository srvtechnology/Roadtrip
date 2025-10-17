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

    protected $guarded = [];
    
    public function Payment()
    {
        return $this->belongTo(Payment::class);
    }

}
