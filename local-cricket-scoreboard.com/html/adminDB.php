<?php
session_start();

class Admin{
  public $player;
  public $runs;
  public $balls_faced;

  function __construct($data=[]){
    foreach ($data as $key=>$value){
        $this->$key=$value;
    }
  }

  public function addPlayer() {
    require_once './conn.php';
		$player = mysqli_real_escape_string($connect, $this->player);
		$runs = mysqli_real_escape_string($connect, $this->runs);
		$balls_faced = mysqli_real_escape_string($connect, $this->balls_faced);
    //calculated strike rate.
    $strike_rate = ($runs / $balls_faced) * 100.00;
    //query to check if players table already have 11 players or not.
    $sql = "SELECT COUNT(player_id) as player_count FROM players";
    $result = mysqli_query($connect, $sql);
    $player_count = $result->fetch_assoc();
    if ($player_count['player_count'] <=11){
      //data added to database if condition satisfy.
      $query = "INSERT INTO players (name, runs, balls_faced, strike_rate) VALUES ('$player', '$runs', '$balls_faced', '$strike_rate')";
      mysqli_query($connect, $query);
    }
    else {
      return false;
    }
  }

  public function showPlayers() {
    require_once './conn.php';
    $query = "SELECT * from players";
    $result = mysqli_query($connect, $query);
		$arr=[];
		while ($row = $result->fetch_assoc()){
				$arr[] = $row;
		}
		return $arr;
	}

  public function playerData($player_id) {
    require_once './conn.php';
    $query = "SELECT * from players WHERE player_id=$player_id";
    $result = mysqli_query($connect, $query);
    return $result->fetch_assoc();
  }

  public function updatePlayer($data =[]) {
    require_once './conn.php';
    $player = mysqli_real_escape_string($connect, $_POST['player']);
		$runs = mysqli_real_escape_string($connect,$_POST['runs']);
		$balls_faced = mysqli_real_escape_string($connect, $_POST['balls_faced']);    
    $player_id = $_POST['player_id'];
    //calculated strike rate.
    $strike_rate = ($runs / $balls_faced) * 100.00;
    $sql = "UPDATE players SET name = '$player', runs = '$runs', balls_faced = '$balls_faced', strike_rate = '$strike_rate' WHERE player_id = '$player_id' ";
    return mysqli_query($connect, $sql);
  }

  public function deletePlayer($player_id) {
    require_once './conn.php';
    $sql = "DELETE FROM players WHERE player_id = '$player_id'";
    return mysqli_query($connect, $sql);
  }

}

?>