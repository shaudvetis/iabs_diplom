<?php
use Carbon\Carbon;
use Carbon\CarbonPeriod;
function convertPeriodToDates($periods)
{
    $dates = [];
    foreach ($periods as $period) {
  
        $carbonPeriod = new CarbonPeriod($period->dates, $period->datep);
//   	dump($carbonPeriod);
// exit();
        foreach ($carbonPeriod as $date) {
            $dates[] = $date->format('Y-m-d');
        }
    }
//       	dump($dates);
// exit();
    return $dates;

}


?>