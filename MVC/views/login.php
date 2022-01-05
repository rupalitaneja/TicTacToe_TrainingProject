<?php 



require_once('../models/config.php');
require_once('../controllers/users.php');
require_once('../models/login_detail.php');


session_start();

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $var = new login();
    $checkEmail=$var->check_email($email,$conn);
    if($checkEmail)
    {
       
    $checkPass=$var->check_password($email,$password , $conn);

    //header("Location: homepage.php");

    }
    
}
error_reporting(0);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../css/style.css">

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
