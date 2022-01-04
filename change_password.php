<?php
session_start();
include 'config.php';
if (!isset($_SESSION['username'])) {
    session_destroy();
    header("Location: login.php");
}
if (isset($_POST['submit'])) {
	if(isset($_POST['old_password']) === "" || ($_POST['new_password']) === "" || ($_POST['re_password']) === "") {
		echo "<script>alert('Please Fill out all the details!')</script>";
}
else{
$old = $_POST['old_password'];
$new = $_POST['new_password'];
$new_re = $_POST['re_password'];
$email = $_SESSION['email'];
$sql = "Select password from users where email='$email'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row=mysqli_fetch_assoc($result);
if(md5($old)==$row['password'])
    {
        if($new==$new_re)
        {
            $ch_password=md5($new);
            $sql= "UPDATE `users` SET `password`='$ch_password' WHERE email='$email'";
            $result = mysqli_query($conn,$sql);
            echo "<script LANGUAGE='JavaScript'> window.alert('Password Changed Successfully. Please login again..');
            window.location.href='logout.php'; </script>";
            }
            else{
                echo "<script>alert('password does not match. Try again')</script>";
            }
        }

        else{
            echo "<script>alert ('Incorrect password')</script>";
        }
    }
}
?>
<html>
    <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/stylepass.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>change password</title>
    </head>
<body>
	
<div class="wrapper">
<div class="buttonback">
		
		<a href="viewdetail.php" ><button class="btn"><i style="font-size:42px;color:black">&#129072;</i></button></a>
			</div>	
<div class="buttonnn">
	<a href="homepage.php" ><button class="btn"><i class="fa fa-home" style="font-size:48px;color:black"></i></button></a>
		</div>
<form name= "Change Password" action = "" method="POST" >
    <h1> Change Password</h1>
    <div class="input-box">
        <label> Old Password</label>
        <input type="password" class="form-control" id="old_password" name="old_password" />   
    </div><br>
    <div class="input-box">
        <label> New Password</label>
        <input type="password" class="form-control" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" id="new_password" name="new_password" />   
    </div><br>
    <div class="input-box">
        <label> Re-enter New Password</label>
        <input type="password" class="form-control" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" id="re_password" name="re_password" />   
    </div><br><br>
    <div>        
        <input type="submit" name ="submit" class="button" id="submit" value="Save Changes"/>   
        
    </div>
</form>
</div>
</body>
</html>


