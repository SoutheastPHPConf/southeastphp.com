<?php

namespace SoutheastPhp\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorLevel extends Model
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getRemaining(): int
    {
        return $this->remaining;
    }

    /**
     * @return string
     */
    public function getInformation(): string
    {
        return $this->information;
    }
}
