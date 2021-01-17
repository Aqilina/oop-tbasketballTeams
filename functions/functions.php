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

function getMinutes($timestampMatch) {
    $matchMinutes = date('i', $timestampMatch);
    if ($matchMinutes >= 1 && $matchMinutes <=30) {
        return '30';
    } else {
        return '00';
    }
}


function whichLocation() {
    return LOCATIONS[array_rand(LOCATIONS)];
}