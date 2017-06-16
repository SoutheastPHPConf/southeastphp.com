<?php

namespace SoutheastPhp\Cfp;

use Illuminate\Database\Eloquent\Model;
use SoutheastPhp\User;

class Travel extends Model
{
    protected $table = 'travel';

    protected $fillable = [
        'user_id',
        'arport_code',
        'international',
        'lodging',
        'num_of_nights',
        'company_assist'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
