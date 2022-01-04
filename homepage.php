<?php 

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="css/hpstyle.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    
</head>
<body>
<div class="content"><br><br><br><br><br><br>
    <?php echo "<h1>Welcome </h1>"; ?><Br><br><br>
   
   <div id="buttons">
    <a class='button' href="viewdetail.php">View profile</a><Br><br> 
    
    <a class='button' href="maingame.php">Click to play</a><Br><br>
    
    <a class='button' href="activeplayer.php">Leaderboard</a><Br><br>

    
    <a class="button" href="logout.php">Logout</a>
    </div>
</body>
</html>