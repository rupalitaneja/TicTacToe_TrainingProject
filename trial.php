<?php

include 'config.php';
session_start();
// SQL query to select data from database
$_SESSION['email'];
$_SESSION['username'];
$email = $_SESSION['email'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] =  $row['email'];
    $_SESSION['number'] =  $row['number'];
	$_SESSION['id'] = $row['id'];
	$_SESSION['win'] = $row['win'];
	//$_SESSION['played'] = $row['played'];
   
}
?>

<html>
<head>
    <title>details</title>
    
    <link rel="stylesheet" type="text/css" href="css/vdstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
function goBack() {
  window.history.back()
}
</script>
</head>
<body>
    <br>
	<div>
	<h1>Personal Information</h1><br>
    <div class="content">
	<div class="buttonnn">	
	<a href="homepage.php" ><button class="btn"><i class="fa fa-home" style="font-size:48px;color:black"></i></button></a>
		</div>		
	<br>
		
        <br><br>
		<h4>Id</h4>
		<h2><?php echo $_SESSION['id'];?></h2><br> 
		<hr>
		<h4>User name</h4>
		<h2><?php echo $_SESSION['username'];?></h2><br>
		<hr>
		<h4>Email address</h4>
		<h2><?php echo $_SESSION['email'];?></h2><br>
		<hr>
		<h4>Contact</h4>
		<h2><?php echo $_SESSION['number'];?></h2><br>
		<hr>
		<h4>Total Wins</h4>
		<h2><?php echo $_SESSION['win'];?></h2>
		

	
<br><br>

<a class='button' href="change_password.php">Change Password</a><Br><br> 
</div>
</body>
</html>