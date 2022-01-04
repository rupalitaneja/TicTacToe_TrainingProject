<?php

include 'config.php';
session_start();

$win = $_SESSION['win'];
//$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/game1.css">

</head>
<body>

    <div class="buttonnn">
      <a href="homepage.php" ><button class="btn"><i class="fa fa-home" style="font-size:48px;color:black"></i></button></a>
      <div class="scoreboard" style="text-align:center;">
      <div class="score" style="margin: auto;">
          <p>SCORE</p>
          <h1><?php echo $win;?></h1>
        </div>

</div>
    <div>
    <h3 class="playerTitle">Let's Play</h3>
    <a class="rematch">Play Again</a><br>
  </div> 
    <div class="box">
    <div class="container">
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
    </div>
  </div>
</div>
</div>
    <script src="game.js"></script>

</body>
</html>