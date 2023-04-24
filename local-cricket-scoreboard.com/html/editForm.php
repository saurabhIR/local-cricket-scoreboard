<?php
//Calling function to show players
include 'adminDB.php';
$admin= new Admin();
$player_id=$_GET['player_id'];
$row=$admin->playerData($player_id);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <!-- form to update player details -->
    <form method="POST" action="editPlayer.php">
      <input type="hidden" name="player_id" value="<?php echo $row["player_id"]; ?>">
      <label for="player">Player Name:</label>
      <input type="text" name="player" value="<?php echo $row["name"]; ?>" required>
      <label for="runs">Runs:</label>
      <input type="number" name="runs" value="<?php echo $row["runs"]; ?>"required>
      <label for="balls_faced">Balls Faced:</label>
      <input type="number" name="balls_faced" value="<?php echo $row["balls_faced"]; ?>"required>
      <button type="submit">Update Player</button>
    </form>
  </body>
</html>