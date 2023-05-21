<?php

session_start();

static $first=true;

if(isset($_POST["Submit"]))
{

    $str_data = file_get_contents("../Model/admindata.json");
    $data = json_decode($str_data,true);
    foreach ($data as $insecure_val) {
        if($insecure_val['username'] == $_POST["username"] 
           && $insecure_val['pass'] == $_POST["pass"]) {          
                $_SESSION['username'] = $_POST["username"];
                $_SESSION['pass'] = $_POST["pass"];
            
            
            if(empty($_POST["remember"]))
            {
                setcookie("username",$_POST["username"],60);
                setcookie("pass",$_POST["pass"],60);
                header("location: ../View/admindash.php");
                break;
            }
            else
            {
                
                setcookie("username",$_POST["username"],time()+60);
                setcookie("pass",$_POST["pass"],time()+60);
                header("location: ../View/admindash.php");
                break;
            }
        }
        else{
            if($first){
            echo "<br><br><h3>Invalid username or password</h3>";
            $first=false;
            }
        }
    }
    
}

?>