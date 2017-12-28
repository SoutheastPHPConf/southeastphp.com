<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class SocialAccount extends Model
{
    protected $table = 'user_social_login';

    protected $fillable = [
        'token',
        'refresh_token',
        'token_ttl',
        'secret',
        'facebook_id',
        'google_id',
        'github_id',
        'twitter_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
