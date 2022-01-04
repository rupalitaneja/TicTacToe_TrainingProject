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
    $_SESSION['email'] =  $row['email'];
    $_SESSION['status'] = $row['status'];
}
if($_SESSION['status'] == '1')
	{
		$query = "UPDATE users SET status = '0' WHERE email = '$email'";
    	$updating = mysqli_query($conn, $query);	
	}
session_destroy();
header("Location: project.html");

?>