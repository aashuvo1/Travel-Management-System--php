<?php

if(isset($_POST["Submit"]))
{
    if(empty($_POST["username"]))  
      {  
            
           echo "<h3>Username is empty</h3>";
      }
      else if(empty($_POST["email"]) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$_POST["email"]))  
      {  
            
           echo "<h3>Please provide your email</h3>";
      }
      else if(empty($_POST["pass"]))  
      {  
           //$error = "<label>Enter Name</label>"; 
           echo "<h3>Password is empty</h3>";
      }
      else if(empty($_POST["dob"]))  
      {  
           //$error = "<label>Enter Name</label>"; 
           echo "<h3>Date Of Birth is empty</h3>";
      }
      else if(empty($_POST["gender"]))  
      {  
           //$error = "<label>Enter Name</label>"; 
           echo "<h3>Gender is empty</h3>";
      }
      
      else if(empty($_POST["language"]))
      {
        //$error = "<label>Enter Name</label>";
        echo "<h3>Language is empty</h3>";
      }

      else if(empty($_POST["country"]))
      {
        //$error = "<label>Enter Name</label>";
        echo "<h3>Country is empty</h3>";
      }
      else if(empty($_POST["address"]))
      {
        //$error = "<label>Enter Name</label>";
        echo "<h3>Address is empty</h3>";
      }

      
      else  
      {  

          $additionalArray = array(
               'username'=> $_POST['username'],
                    'email'=> $_POST['email'],
                    'pass'=> $_POST['pass'],
                    'dob'=> $_POST['dob'],
                    'gender'=> $_POST['gender'],
                    'language'=> $_POST['language'],
                    'country'=> $_POST['country'],
                    'address'=> $_POST['address']
           );


               //mycode1
           
           //open or read json data
           $data_results = file_get_contents('../Model/admindata.json');
           $tempArray = json_decode($data_results,true);
           
           
            
           
           $tempArray[] = $additionalArray ;
           $jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
           
           if(file_put_contents('../Model/admindata.json', $jsonData))
           {
                echo "<h3>Registration Successful</h3>";
           }
           else
           {
                echo "<h3>Error!!! Registration failed</h3>";
           }
           
          
     } 

}

?>