<?php 

class config
{
    function connection(){
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        $port = 3306;

        $conn = mysqli_connect($server, $user, $pass, $database, $port);

        if ($conn) {
            return $db;
        }
        else
        {
            die("<script>alert('Connection Failed.')</script>");
        }
    }
}

?>