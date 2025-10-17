<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrenchUserPackageInfo extends Model
{
    protected $table = 'french_user_package_info';

    protected $casts =["package_details_on_purchase_time"=>'array'];
    //  protected $fillable = ['user_id', 'package_details_on_purchase_time'];
    protected $guarded = [];
    public function User()
    {
        return $this->hasOne(User::class);
    }
}
