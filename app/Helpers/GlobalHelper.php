<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class GlobalHelper
{

    public static function daterange($var)
    {
        $dates = explode('-', $var);
        $startdate = Carbon::createFromDate($dates[0]);
        $enddate = Carbon::createFromDate($dates[1]);
        $range = $startdate->diffInDays($enddate);
        return $range;
    }

}
