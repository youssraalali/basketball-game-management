<?php
include_once("initSession.php");

if(isset($_POST["back"])) {
    header("Location: index.php");
}

if (isset($_POST['search'])) {
    $selectedDate = $_POST['date'];
    $matches = array_filter($infoMatch->listMatch, function($match) use ($selectedDate) {
        return $match->date == $selectedDate;
    });
    if (count($matches) == 0) {
        echo '<p>No matches found for the selected date.</p>';
    }
    else {
        echo '<form method="POST">';
        echo '<h2>Matches for ' . $selectedDate . '</h2>';
        echo '<table border="1">';
        echo '<tr>
                <th>Name</th>
                <th>Hour</th>
                <th>Location</th>
                <th>Team 1</th>
                <th>Team 2</th>
            </tr>';
        foreach ($matches as $match) {
            $indexMatch = $infoMatch->getIndexMatchByName($match->nameMatch);
            $teams = $infoMatch->teams[$indexMatch];
            echo '<tr>';
            echo '<td>' . $match->nameMatch . '</td>';
            echo '<td>' . $match->hour . '</td>';
            echo '<td>' . $match->location . '</td>';
            echo '<td>' . $teams[0]->nameTeam . '</td>';
            echo '<td>' . $teams[1]->nameTeam . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</form>';
    }
}
?>


<!DOCTYPE html> 
<html> 
<head> 
    <link rel="stylesheet" href="matchDate.css" > 
</head>
<body> 
    <form method="POST"> 
    <h1>Search for Matches by Date</h1> 
    <p> 
    <label for="date">Select date:</label> 
    <select id="date" name="date" required> 
    <?php 
    foreach ($infoMatch->listMatch as $match){
        $date = $match->date;
        echo '<option value="' . $date . '">' . $date . '</option>'; 
        }
        ?>
    </select> 
    </p> 
    <input type="submit" name="search" value="Search"> 
    <input type="submit" name="back" value="back" class="back"> 
    </form> 
</body> 
</html>




