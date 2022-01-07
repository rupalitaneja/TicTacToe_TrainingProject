<?php
class user extends config{

    function get_count($email)
    {
        $email_already="SELECT COUNT(*) FROM users where email='$email'";
        $run_qry_email=mysqli_query($conn, $email_already) or die( mysqli_error($conn));
        $row_email=mysqli_fetch_assoc($run_qry_email);
        return $row_email['COUNT(*)'];
    }
    function get_password($email)
    {
        $sql = "SELECT * FROM users WHERE email='$email'";
	    $result = mysqli_query($conn, $sql);   
        $row = mysqli_fetch_assoc($result);
        $password = $row['password'];
        return $password;
    }
}


?>