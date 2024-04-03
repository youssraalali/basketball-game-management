<?php
include_once("initSession.php");

if (isset($_POST['delete'])) {
    $matchName = $_POST['matchName'];
    $indexMatch = $infoMatch->getIndexMatchByName($matchName);
    unset($infoMatch->listMatch[$indexMatch]);
    $infoMatch->listMatch = array_values($infoMatch->listMatch);
    header('Location: deleteMatch.php');
    exit;
}

if (isset($_POST['submit']) && !empty($_POST["matchName"])) {
    $matchName = $_POST['matchName'];
    $indexMatch = $infoMatch->getIndexMatchByName($matchName);
    $match = $infoMatch->listMatch[$indexMatch];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Delete a Match</title>
        <link rel="stylesheet" href="delMatch.css">
</head>

<body>
    <form action="" method="POST">
        <h1>Delete a Match</h1>
        <p>
            <?php
            echo "<label>Enter Match Name: </label>";
            echo '<select name="matchName">';
                foreach ($infoMatch->listMatch as $i => $dmatch) {
                echo '<option>' . $dmatch->nameMatch . '</option>';
                }
                echo '</select>';
                ?>
        </p>
        <p>
            <input type="submit" name="submit" value="display">
            <input type='submit' name='back' value='back' class="back">
        </p>
    </form>
    <?php if (isset($match)) : ?>
        <form action="" method="POST">
        <h2>Match Details</h2>
        <table border=1>
            <tr>
                <td>Date</td>
                <td>Time</td>
                <td>Location</td>
            </tr>
            <tr>
                <td><?php echo $match->date; ?></td>
                <td><?php echo $match->hour; ?></td>
                <td><?php echo $match->location; ?></td>
            </tr>
        </table>
            <input type="hidden" name="matchName" value="<?php echo $matchName; ?>">
            <input type="submit" name="delete" value="Delete">
        </form>
    <?php endif; ?>
    <?php
    if(isset($_POST["back"])){
    header("location:index.php"); 
    }
    ?>
</body>
</html>