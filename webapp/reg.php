<?php
require('connectivity.php');
if (isset($_POST['email']))
{
    $var = 0;
    if(isset($_POST['email']))
    {
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $password1 = ($_POST['password1']);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $msg = 'The Email you have entered is invalid, please try again.';
        echo $msg;
    }else{

        $query = "INSERT INTO register (email,password,password1) VALUES ('$email','$password', '$password1');"; 
        $result1 = mysqli_query($con,$query);

        if($result1)
        {
            echo "<div class='form'>
            <h3>You are registered successfully.</h3>";
            $url = "./login.html";
            header("Location: $url");
        }                
    else{
    echo "<h1> already inserted.</h1>";
    }
  }  
  $con->close();
    }
        }
?>