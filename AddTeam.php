<?php
include_once('initSession.php');

if (isset($_POST['submit'])) {
    if (!empty($_POST['id']) && !empty($_POST['nameTeam'])) {
        $teamId = $_POST['id'];
        $teamName = $_POST['nameTeam'];
        // Check if team name already exists
        $teamExists = false;
        foreach ($infoMatch->listTeam as $existingTeam) {
            if ($existingTeam->nameTeam == $teamName) {
                $teamExists = true;
                break;
            }
        }
        if (!$teamExists) {
            $team = new Team($teamId, $teamName);
            $infoMatch->listTeam[] = $team;
            header("Location: enterTeam.php");
        } else {
            echo '<form method="POST">';
            echo "<span class='error'>Team name already exists. Please choose a different name.</span>";
            echo '<input type="submit" name="return" value="Back">';
            echo '</form>';
        }
    }
    else {
        header("Location: enterTeam.php");
    }
}
if (isset($_POST["return"])) {
    header("Location: enterTeam.php");
}
if (isset($_POST["back"])) {
    header("Location: index.php");
}
?>
<style>
    body {
        background-image: url("—Pngtree—yellow white abstract background_1897467.png");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .error {
        text-align: center;
        color: black;
        margin-bottom: 20px;
        font-weight: bolder;
    }

    form {
        margin: auto;
        margin-top: 20%;
        background-color: rgb(255, 172, 17);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        max-width: 400px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: rgba(8, 8, 8, 0.634);
        border: none;
        border-radius: 5px;
        color: rgb(234, 225, 225);
        cursor: pointer;
        font-weight: bold;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: black;
        color: rgb(255, 172, 17);
    }
</style>