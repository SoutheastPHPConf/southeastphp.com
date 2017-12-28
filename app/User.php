<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\SocialAccount;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'first_name', 'last_name', 'preferred_name',
        'city', 'company', 'twitter', 'first_conference',
        'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function findByEmail(string $email)
    {
        return User::byEmail($email)->first();
    }

    public function scopeByEmail(Builder $query, string $email)
    {
        return $query->where('email', $email);
    }

    public function socialAccount()
    {
        return $this->hasOne(SocialAccount::class, 'user_id', 'id');
    }
}
