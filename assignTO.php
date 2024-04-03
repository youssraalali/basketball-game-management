<?php
include_once("initSession.php");

if (isset($_POST['assign'])) {
    $matchName = $_POST['matchName'];
    $selectedTeams = $_POST['teams'];
    $numSelectedTeams = count($selectedTeams);
    $teams = array();

    $indexMatch = $infoMatch->getIndexMatchByName($matchName);

    // Check if the selected match already has two assigned teams
    if (isset($infoMatch->teams[$indexMatch]) && count($infoMatch->teams[$indexMatch]) >= 2) {
        echo '<p class="error"> This match already has two assigned teams.</p>';
    } else {
        //success, add to teams[]
        if ($numSelectedTeams == 2) {
            foreach ($selectedTeams as $teamId) {
                foreach ($infoMatch->listTeam as $team) {
                    if ($team->id == $teamId) {
                        $teams[] = $team;
                    }
                }
            }
            $infoMatch->teams[$indexMatch] = $teams;
        } else {
            echo '<p class="error">Please select exactly two teams.</p>';
        }
    }
}
echo '<head>';
echo '<link rel="stylesheet" href="AssignTo.css" >';
echo '</head>';
echo '<form action="assignTo.php" method="POST">';
echo '<h1>Assign teams to a match</h1>';
echo '<p>';
echo '<label>Select match:  </label>';
echo '<select name="matchName">';
foreach ($infoMatch->listMatch as $key => $match) {
    echo '<option value="' . $match->nameMatch . '">' . $match->nameMatch . '</option>';
}
echo '</select>';
echo '</p>';
echo '<input type="submit" name="done" value="ok">';
echo '<input type="submit" name="back" value="Back" class="back">';
echo '</form>';

if (isset($_POST["done"]) && isset($_POST["matchName"])) {
    echo '<form action="assignTo.php" method="POST">';
    echo '<h2>List of teams:</h2>';
    echo '<input type="hidden" name="matchName" value="' . @$_POST['matchName'] . '">';
    echo '<table>';
    foreach (@$infoMatch->listTeam as $team) {
        echo '<tr>';
        echo '<td>' . $team->nameTeam . '</td>';
        echo '<td><input type="checkbox" name="teams[]" value="' . $team->id . '"></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '<input type="submit" name="assign" value="ok">';
    echo '<input type="submit" name="back" value="back">';
    echo '</form>';
    if(empty($infoMatch->listTeam)){
        header("location: assignTo.php");
    }
}
// else{
//     header("Location: assignTo.php");
// }

if (isset($_POST["back"])) {
    header("location:index.php");
    exit;
}
