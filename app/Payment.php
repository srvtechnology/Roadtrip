<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function User()
    {
        return $this->hasOne(User::class);
    }
    protected $casts = [
        'package_details_on_purchase_time' => 'array',
        'gatewayReponse' => 'array',
    ];
}
