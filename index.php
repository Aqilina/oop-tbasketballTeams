<?php

include './Classes/GameMatch.php';
include './Classes/Player.php';
include './Classes/Team.php';
include './const/constants.php';
include './functions/functions.php';

$playersFirstTeam = [
    new Player(getValueFromConstant(NAMES), getValueFromConstant(SURNAMES), rand(177,230), getValueFromConstant(POSITION_TYPES), rand(0,100)),
    new Player(getValueFromConstant(NAMES), getValueFromConstant(SURNAMES), rand(177,230), getValueFromConstant(POSITION_TYPES), rand(0,100)),
    new Player(getValueFromConstant(NAMES), getValueFromConstant(SURNAMES), rand(177,230), getValueFromConstant(POSITION_TYPES), rand(0,100)),
    new Player(getValueFromConstant(NAMES), getValueFromConstant(SURNAMES), rand(177,230), getValueFromConstant(POSITION_TYPES), rand(0,100)),
    new Player(getValueFromConstant(NAMES), getValueFromConstant(SURNAMES), rand(177,230), getValueFromConstant(POSITION_TYPES), rand(0,100))
];


$playersSecondTeam = [
    new Player(getValueFromConstant(NAMES), getValueFromConstant(SURNAMES), rand(177,230), getValueFromConstant(POSITION_TYPES), rand(0,100)),
    new Player(getValueFromConstant(NAMES), getValueFromConstant(SURNAMES), rand(177,230), getValueFromConstant(POSITION_TYPES), rand(0,100)),
    new Player(getValueFromConstant(NAMES), getValueFromConstant(SURNAMES), rand(177,230), getValueFromConstant(POSITION_TYPES), rand(0,100)),
    new Player(getValueFromConstant(NAMES), getValueFromConstant(SURNAMES), rand(177,230), getValueFromConstant(POSITION_TYPES), rand(0,100)),
    new Player(getValueFromConstant(NAMES), getValueFromConstant(SURNAMES), rand(177,230), getValueFromConstant(POSITION_TYPES), rand(0,100))
];

$coachFirst = getValueFromConstant(NAMES) . ' ' . getValueFromConstant(SURNAMES);
$coachSecond = getValueFromConstant(NAMES) . ' ' . getValueFromConstant(SURNAMES);

$teamNameFirst = getValueFromConstant(TEAM_ADJECTIVES) . ' ' . getValueFromConstant(TEAM_NOUNS);
$teamNameSecond = getValueFromConstant(TEAM_ADJECTIVES) . ' ' . getValueFromConstant(TEAM_NOUNS);

$teamsArr = [
    'firstTeam' => new Team($coachFirst, $teamNameFirst, getTeamLogo(), $playersFirstTeam),
    'secondTeam' => new Team($coachSecond, $teamNameSecond, getTeamLogo(), $playersSecondTeam)
];
//var_dump($teamsArr['firstTeam']);
//var_dump($teamsArr['secondTeam']);

//----------------------------------------------------------------------------
////GAME MATCH
//1. get random date
$todayTimestamp = time();
$afterThreeMonthsTimestamp = mktime(0,0 , 0, date("m")+3, date("d"), date("Y"));

$matchDateTimestamp = rand($todayTimestamp, $afterThreeMonthsTimestamp);
$matchDateFormatted = date('Y-m-d', $matchDateTimestamp);

//2. get random hour and minutes
$matchHour = date('H', $matchDateTimestamp);

//3. match finishes
$matchEndHour = $matchHour +2;

//---------------------------------------------------------------
//KURIAMA KLASE

$gameMatch = new GameMatch($teamsArr);

//$gameMatchDate = $gameMatch->setDate($matchDateFormatted);
//$gameMatch->setTime($matchHour . ":" . getMinutes($matchDateTimestamp) . " - " . $matchEndHour . ":" . getMinutes($matchDateTimestamp));
//$gameMatch->setLocation(whichLocation());
//
//var_dump($gameMatch);


$gameMatch->setDate(createMatchDate($todayTimestamp, $afterThreeMonthsTimestamp));
$gameMatch->setTime(createMatchStartTime($todayTimestamp, $afterThreeMonthsTimestamp) . " - " . createMatchStartTime($todayTimestamp+2, $afterThreeMonthsTimestamp));
$gameMatch->setLocation(whichLocation());

var_dump($gameMatch);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./Assets/style.css">
    <title>Document</title>
</head>
<body>
<!--<div class="dateStyle">--><?php //print ?><!--</div>-->
<div class="matchContainer">
    <img class="logo" src="<?php print getTeamLogo()?>" alt="">
</div>

<div>

</div>
</body>
</html>
