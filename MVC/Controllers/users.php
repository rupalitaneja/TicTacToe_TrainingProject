<?php


class login
{
    function check_email($email, $conn ){

        
        $flag = filter_var($email, FILTER_VALIDATE_EMAIL);
        $detail= new user_details();
        $temp=$detail->check_email($email,$conn);
        if (!$flag)
        {
            return false;
        }
        
        
        else if($temp)
        {
            return true;
        }
        else
        {
            return false;
        }
     
        //else return true;
    }

    function check_password($email,$password , $conn)
    {
        $info= new user_details();
        $pass = $info->get($email,$conn);
        //if($pass == null)
          //  return false;
        if(md5($password) == $pass)
              header("Location: homepage.php");
        
        else
            return false;


    }
}




?>
