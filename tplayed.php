<?php
include 'config.php';
session_start();
$_SESSION['email'];
$email = $_SESSION['email'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $played=$row['played'];
    $played=$played+1;
    $query1 = "UPDATE users SET played = '$played' WHERE email = '$email'";
    $result1 = mysqli_query($conn, $query1);
    //echo $result1;
    echo "<script>history.back()</script>"; 
}
?>