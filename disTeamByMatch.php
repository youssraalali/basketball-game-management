<?php
include_once("initSession.php");

echo '<head>';
echo '<link rel="stylesheet" href="disTeam.css" >';
echo '</head>';
echo "<form action ='disTeamByMatch.php' method='POST'>";
echo "<p>";
echo "<label>Enter Match Name: </label>";
echo '<select name="matchName">';
foreach ($infoMatch->listMatch as $i => $match) {
    echo '<option>' . $match->nameMatch . '</option>';
}
echo '</select>';
echo "</br>";
echo "<input type='submit' name='submit' value='OK'>";
echo "<input type='submit' name='back' value='back' class='back'>";
echo "</p>";
echo "</form>";

@$matchName = $_POST['matchName'];
$indexMatch = $infoMatch->getIndexMatchByName($matchName);
@$teams = $infoMatch->teams[$indexMatch];
if (isset($_POST["submit"]) && isset($_POST["matchName"])) {
    $matchName = $_POST['matchName'];
    $indexMatch = $infoMatch->getIndexMatchByName($matchName);

    if ($indexMatch !== false && isset($infoMatch->teams[$indexMatch])) {
        $assignedTeams = $infoMatch->teams[$indexMatch];
        $numSelectedTeams = count($assignedTeams);

        if ($numSelectedTeams == 2) {
            echo "<form  method='POST'>";
            echo "<input type='hidden' name='matchName' value='" . $matchName . "'>";
            echo '<h2>Teams by ' . $matchName . '</h2>';
            echo "<ul>";
            foreach ($assignedTeams as $team) {
                echo "<li>" . $team->nameTeam ;
                echo "<input type='hidden' name='teamId[]' value='" . $team->id . "'>";
                echo "</li>";
            }
            echo "</ul>";
            echo "</form>";
        }
    } 
            elseif(empty($assignedTeams)){
            echo '<span style=" color: red; font-weight: bolder; margin: 32%;">THERE IS NO ASSIGNED TEAMS FOR THIS MATCH YET!</span>';
        }
}
if(isset($_POST["back"])){
    header("location:index.php"); 
}
