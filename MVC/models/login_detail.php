<?php
class user_details{

    function get($email, $conn)
    {
        $sql = "SELECT * FROM users WHERE email='$email'";
	    $result = mysqli_query($conn, $sql);
	    if ($result->num_rows > 0) {
		    $row = mysqli_fetch_assoc($result);
            $password = $row['password'];
            return $password;
        }
        else 
        {
            return false;
        }
    }

    function check_email($email, $conn)
    {
        $sql = "SELECT count(*) FROM users WHERE email='$email'";
	    $result = mysqli_query($conn, $sql);
	    if ($result == 1)
            return true;
        else    return false;
    }
}


?>
