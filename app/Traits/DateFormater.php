<?php

namespace App\Traits;

use Carbon\Carbon;

/**
*  DateFormater Trait
*/
trait DateFormater
{
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('dS M, Y H:i a');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('dS M, Y H:i a');
    }
}
