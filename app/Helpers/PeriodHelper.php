<?php

namespace App\Helpers;

class PeriodHelper
{
    public static function getPeriodTimes()
    {
        return [
            1 => ['07:00', '07:50'],
            2 => ['07:50', '08:40'],
            3 => ['08:40', '09:30'],
            4 => ['09:35', '10:25'],
            5 => ['10:25', '11:15'],
            6 => ['11:15', '12:05'],
            7 => ['12:35', '13:25'],
            8 => ['13:25', '14:15'],
            9 => ['14:15', '15:05'],
            10 => ['15:10', '16:00'],
            11 => ['16:00', '16:50'],
            12 => ['16:50', '17:40'],
            13 => ['17:45', '18:35'],
            14 => ['18:35', '19:25'],
            15 => ['19:25', '20:15'],
        ];
    }

    public static function getTimeRange($startPeriod, $totalPeriods)
    {
        $periods = self::getPeriodTimes();

        $start = $periods[$startPeriod][0] ?? null;
        $endIndex = $startPeriod + $totalPeriods - 1;
        $end = $periods[$endIndex][1] ?? null;

        return [$start, $end];
    }
}
