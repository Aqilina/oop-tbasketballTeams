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

$gameMatch->setDate($matchDateFormatted);
$gameMatch->setTime($matchHour . ":" . getMinutes($matchDateTimestamp) . " - " . $matchEndHour . ":" . getMinutes($matchDateTimestamp));
$gameMatch->setLocation(whichLocation());

//paimami ir priskiriami is objekto komandu masyvai
$gameMatchArr = $gameMatch->getTeams();
$firstTeam = $gameMatchArr['firstTeam'];
$secondTeam = $gameMatchArr['secondTeam'];

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

<div class="dateStyle"><?php print $gameMatch->getDate() ?></div>
<div class="dateStyle timeStyle"><?php print $gameMatch->getTime() ?></div>

<div class="matchContainer">
    <div class="oneTeamContainer">
        <img class="logo" src="<?php print $firstTeam->getTeamLogo()?>" alt="">
        <div class="teamNameAndCoachContainer">
            <div>Team Name:<span class="spanInfo"><?php print $firstTeam->getTeamName() ?></span></div>
            <div>Coach: <span class="spanInfo"><?php print $firstTeam->getCoach()?></span></div>
        </div>

        <table class="playersTable">
            <thead>
            <tr>
                <th>Player name</th>
                <th>Height</th>
                <th>Position</th>
                <th>Number</th>
            </tr>

            </thead>
            <tbody>
            <?php foreach ($firstTeam->getPlayers() as $player) : ?>
                <tr>
                    <td><?php print $player->getName() . " " . $player->getLastname() ?></td>
                    <td><?php print $player->getHeight() ?></td>
                    <td><?php print $player->getPosition() ?></td>
                    <td><?php print $player->getTShirtNumber() ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="oneTeamContainer">
        <img class="logo" src="<?php print $secondTeam->getTeamLogo()?>" alt="">
        <div class="teamNameAndCoachContainer">
            <div>Team Name:<span class="spanInfo"><?php print $secondTeam->getTeamName() ?></span></div>
            <div>Coach: <span class="spanInfo"><?php print $secondTeam->getCoach()?></span></div>
        </div>

        <table class="playersTable">
            <thead>
            <tr>
                <th>Player name</th>
                <th>Height</th>
                <th>Position</th>
                <th>Number</th>
            </tr>

            </thead>
            <tbody>
            <?php foreach ($secondTeam->getPlayers() as $player) : ?>
                <tr>
                    <td><?php print $player->getName() . " " . $player->getLastname() ?></td>
                    <td><?php print $player->getHeight() ?></td>
                    <td><?php print $player->getPosition() ?></td>
                    <td><?php print $player->getTShirtNumber() ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
