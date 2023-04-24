<?php
//Calling function to show players
include 'adminDB.php';
$admin = new Admin();
$row = $admin->showPlayers();
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <!-- Form will show to the content Editor to post the player -->
    <?php if (isset($_SESSION['email'])) { ?>
      <form method="POST" action="playersController.php">
        <label for="player">Player Name:</label>
        <input type="text" name="player" required>
        <label for="runs">Runs:</label>
        <input type="number" name="runs" required>
        <label for="balls_faced">Balls Faced:</label>
        <input type="number" name="balls_faced" required>
        <button type="submit">Add Player</button>
      </form>
    <?php }?>
    <section class="players-table">
    <table>
        <tr><th>Player Name</th><th>Runs Scored</th><th>Balls Faced</th><th>Strike Rate</th><th>Edit</th><th>Delete</th></tr>
        <?php foreach($row as $rows){ ?>
          <tr>
            <td><?php echo $rows["name"];?></td>
            <td><?php echo $rows["runs"];?></td>
            <td><?php echo $rows["balls_faced"];?></td>
            <td><?php echo $rows["strike_rate"];?></td>
            <!-- displaying edit and delete links to the Content editor -->
            <?php if (isset($_SESSION['email'])) {
              echo "<td><a href='./editForm.php?player_id=" . $rows["player_id"] . "'>Edit</a></td>";
              echo "<td><a href='./editForm.php?player_id=" . $rows["player_id"] . "'>Delete</a></td>";
              } else {
              echo "<td></td>";
            } ?>
          </tr>
        <?php }?>
      </table>
      <?php if (!isset($_SESSION['email'])) { ?>
        <div class="man">
          <button onclick="showManOfTheMatch()">Man of the Match</button>
          <div id="manOfTheMatch"></div>
            <script>
                function showManOfTheMatch() {
                    // Send an AJAX request to get the player with the highest strike rate
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("manOfTheMatch").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "manofthematch.php", true);
                    xmlhttp.send();
                }
            </script>
        </div>
      <?php }?>
    </section>
  </body>
</html>