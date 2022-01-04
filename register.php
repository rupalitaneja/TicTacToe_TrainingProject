<?php 

include 'config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}
if (isset($_POST['submit'])){
	if(isset($_POST['FullName']) === "" || ($_POST['username']) === " "|| ($_POST['email']) === ""|| ($_POST['number']) === ""|| ($_POST['password']) === ""|| ($_POST['cpassword'])=== "") {
		echo "<script>alert('Please Fill out all the details!')</script>";
	}
	
	else {
		$FullName = $_POST['FullName'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$number = $_POST['number'];
		$password = $_POST['password'];
	
		if(validate_pass($password)){

		$en_password = md5($_POST['password']);
		$cpassword = md5($_POST['cpassword']);
		if ($en_password == $cpassword) {
			$sql = "SELECT * FROM users WHERE email='$email'";
			$result = mysqli_query($conn, $sql);
			if (!$result->num_rows > 0) {
				$sql = "INSERT INTO users (FullName, username, number, email, password )
						VALUES ('$FullName','$username','$number', '$email', '$en_password')";
					$result = mysqli_query($conn, $sql);
				if ($result) {
					echo "<script>alert('Registration Completed.. Login to Continue!')</script> ";;
					$FullName = "";
					$username = "";
					$email = "";
					$number ="";
					$_POST['password'] = "";
					$_POST['cpassword'] = "";
				} else {
					echo "<script>alert('Something went wrong.')</script>";
				}
			} else {
				echo "<script>alert('Email Already Exists.')</script> ";
			}
			
		} else {
			echo "<script>alert('Password Not Matched.')</script>";
		}
	}
}
}
function validate_pass($password){
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);

	if(!$uppercase) echo "<script>alert(' Password must contain an upper case')</script>"; 
	else if(!$lowercase) echo "<script>alert(' Password must contain a lower case')</script>";
	else if(!$number)echo "<script>alert(' Password must contain a number')</script>"; 
	else if(!$specialChars)echo "<script>alert(' Password must contain a special character')</script>";
	else if(strlen($password) < 8)echo "<script>alert(' Password must be of length 8 or more')</script>";
	else return true;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

	<title>Register Here</title>
	
</head>
<body>
	<div class="wrapper">
		<form action="" method="POST" class="login-email">
		
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Signup</p>
			
			<div class="input-box">
				<input type="text" placeholder="FullName" name="FullName" value="<?php echo $FullName; ?>"  >
			</div>
			<div class="input-box">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" >
			</div>
			<div class="input-box">
				<input type="text" placeholder="Phone Number" name="number" pattern="[789][0-9]{9}" value="<?php echo $number; ?>" >
			</div>
			<div class="input-group">
            
			<div class="input-box">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" >
			</div>
			<div class="input-box">
				<input type="password" title="hteth" placeholder="Password" name="password"  value="<?php echo $_POST['password']; ?>" >
				<span class="tooltip" data-tooltip="Be at least 8 characters and should include a capital letter and symbols">?</span>

			</div>
            <div class="input-box">
				<input type="password" placeholder="Confirm Password" name="cpassword"  value="<?php echo $_POST['cpassword']; ?>" >
			</div>
			<div>
				<button name="submit" class="button1">Register</button>
			</div>
			<h3>Already a user? <a href="login.php">Login Here</a></h3>
		</form>
	</div>
</body>
</html>