<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: homepage.php");
}

if (isset($_POST['submit'])) {
	if(isset($_POST['email']) === "" || ($_POST['password']) === "") {
		echo "<script>alert('Please Fill out all the details!')</script>";
	}
	else{
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] =  $row['email'];
		$emaill=$_SESSION['email'];
		$_SESSION['status'] =  $row['status'];
		if($_SESSION['status'] == '0')
		{
			$query = "UPDATE users SET status = '1' WHERE email = '$emaill'";
			$updating = mysqli_query($conn, $query);	
		}
		if($_SESSION['email'])
		{
			$query2 = "UPDATE users SET duration = current_timestamp() WHERE email = '$emaill'";
			$updating = mysqli_query($conn, $query2);	
		}
		header("Location: homepage.php");
	} else {
		echo "<script>alert('Email or Password is Wrong.')</script>";
	}
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Login Here</title>
</head>
<body>
	<div class="wrapper">
		
	
		<form action="" method="POST" class="login-email">
			<div class="heading"><h1> TICK-TAC-TOE </h1><br></div>
			<p class="input-box" style="font-size: 1.5rem; font-weight: 800; font-family:georgia,garamond,serif">Login</p>
            
			<div class="input-box">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
		
			<div class="input-box">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			
			<div >
			    <button name="submit" class="button1">Login</button>
			</div>
			<br><br>
			<b><h3>Don't have an account? <a href="register.php">Register now</a></h3></b>
		</form>
	</div>
</body>
</html>