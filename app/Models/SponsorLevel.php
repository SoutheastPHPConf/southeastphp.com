<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorLevel extends Model
{
    const FAN_LEVEL = 1;
    const SESSION_LEVEL = 2;
    const TOURING_LEVEL = 3;
    const WITH_THE_BAND = 4;
    const STAR_LEVEL = 5;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getCost(): int
    {
        return $this->cost;
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
