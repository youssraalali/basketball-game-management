<?php
include_once("initSession.php");

echo '<head>';
echo '<link rel="stylesheet" href="allMatch.css" >';
echo '</head>';
echo '<form action="index.php">';
echo '<h1>Matches</h1>';
echo '<table border=1>';
if($infoMatch->listMatch != null){
echo '<tr>
        <th>Name</th>
        <th>Date</th>
        <th>Hour</th>
        <th>Location</th>
        <th>Team 1</th>
        <th>Team 2</th>
    </tr>';
foreach ($infoMatch->listMatch as $match) {
    $indexMatch = $infoMatch->getIndexMatchByName($match->nameMatch);
    $teams = $infoMatch->teams[$indexMatch];
    if (count($teams) == 2) {
        echo '<tr>';
        echo '<td>' . $match->nameMatch . '</td>';
        echo '<td>' . $match->date . '</td>';
        echo '<td>' . $match->hour . '</td>';
        echo '<td>' . $match->location . '</td>';
        echo '<td>' . $teams[0]->nameTeam . '</td>';
        echo '<td>' . $teams[1]->nameTeam . '</td>';
        echo '</tr>';
    }
}
}
else {
    echo '<span style=" color: red; font-weight: bold; margin-left: 35%;">
            THERE IS NO MATCHES YET!
    </span>';
}
echo '<br><input type="submit" value="Back">';
echo '</table>';
echo '</form>';
