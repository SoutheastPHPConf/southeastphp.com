<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'email_list';

    protected $fillable = [
        'email',
        'active'
    ];
}
