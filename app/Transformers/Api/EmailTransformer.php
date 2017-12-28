<?php
/**
 * Created by PhpStorm.
 * User: trask
 * Date: 6/4/17
 * Time: 9:06 PM
 */

namespace SoutheastPhp\Transformers\Api;

use League\Fractal\TransformerAbstract;
use Carbon\Carbon;
use SoutheastPhp\Models\Email;

class EmailTransformer extends TransformerAbstract
{
    public function transform(Email $email)
    {
        return [
            'email' => $email->email,
            'signupDate' => $email->created_at,
        ];
    }
}
