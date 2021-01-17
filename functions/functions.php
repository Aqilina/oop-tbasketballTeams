<?php

function getValueFromConstant($arr) {
    return $arr[array_rand($arr)];
}

//---------------------------------------------------------------------------------------------------

function getTeamLogo() {
    $imagesDir = './Assets/logos/';
    $images = glob($imagesDir . '*.{svg}', GLOB_BRACE);
    $randomImage = $images[array_rand($images)];
    return $randomImage;
}

//---------------------------------------------------------

//GAME MATCH
//1. get random date

$todayTimestamp = time();
$afterThreeMonthsTimestamp = mktime(0,0 , 0, date("m")+3, date("d"), date("Y"));

function createMatchDate($timestampNow, $timestampAfterThreeMonths) {
    $matchDateTimestamp = rand($timestampNow, $timestampAfterThreeMonths);
    return date('Y-m-d', $matchDateTimestamp);
}

//2. get random hour and minutes
function createMatchStartTime($timestampNow, $timestampAfterThreeMonths) {
    $matchDateTimestamp = rand($timestampNow, $timestampAfterThreeMonths);
    $matchHour = date('H', $matchDateTimestamp);

    $randomMinutes= rand(0,60);
    if ($randomMinutes >= 1 && $randomMinutes <=30) {
        $matchMinutes = '30';
    } else {
        $matchMinutes = '00';
    }
return $matchHour . ":" . $matchMinutes;
}


function whichLocation() {
    return LOCATIONS[array_rand(LOCATIONS)];
}