<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackageUsage extends Model
{

    protected $table = "user_package_usage";

    protected $fillable = [
        'user_id',
        'package_id',
        'used_podcast_count',
        'used_daily_routes_count',
        'used_podcast_ids',
        'used_daily_routes_ids',
    ];

    protected $casts = [
        'used_podcast_ids' => 'array',
        'used_daily_routes_ids' => 'array',
    ];
}
