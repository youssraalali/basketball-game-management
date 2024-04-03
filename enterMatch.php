<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Matchs.css">
    </head>
    <body>
        <form method="post" action="AddMatch.php">
            <h1>Enter a Match</h1>
            <p>
                <label for="nameMatch">Name: </label>
                <input type="text" name="nameMatch">
            </p>
            <p>
                <label for="date">Date: </label>
                <input type="date" name="date">
            </p>
            <p>
                <label for="hour">Hour: </label>
                <input type="time" name="hour">
            </p>
            <p>
                <label for="location">Location: </label>
                <input type="text" name="location">
            </p>
                <input type="submit" name="submit" value="Add">
                <input type="submit" name="back" value="back" class="back">
        </form>
    </body>
</html>