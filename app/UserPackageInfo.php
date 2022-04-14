<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackageInfo extends Model
{
    protected $table = 'user_package_info';

    protected $casts =["package_details_on_purchase_time"=>'array'];
    //  protected $fillable = ['user_id', 'package_details_on_purchase_time'];
    protected $guarded = [];
    public function User()
    {
        return $this->hasOne(User::class);
    }
}
