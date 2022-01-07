<?php


class login extends config
{
function email_count($email,$password){
    $count = new user();
    $email_count = $count->get_count($email);
    if($email_count==1)
    {
        $valid_password = $this->check_password($email,$password);
    }
}

    function check_email($email){
        $flag = filter_var($email, FILTER_VALIDATE_EMAIL);
        //$detail= new user();
        //$temp=$detail->check_email($email,$conn);
        if (!$flag)
        {
            return false;
        }
        else
        {
            return true;
        }
     
    }

    function check_password($email,$password)
    {
        $info= new user();
        $pass = $info->get_password($email);
        if(md5($password) == $pass)
              header("Location: homepage.php");
        
        else
            return false;


    }
}




?>