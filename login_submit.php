<?php
    session_start();
    $hostname="127.0.0.1";
    $sql_username="root";
    $db_password="123456";
    $db_name="social_media";
    
    
    $conn=mysqli_connect($hostname,$sql_username,$db_password,$db_name);
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
    $email=$_POST['email'];
    $password=$_POST['password'];
    if($email==NULL || $password==NULL)
    {
        echo"Please fill up all the fields properly <br/>";
        ?><a href="registration.html">Click here to try again</a><?php
        exit;
    }
    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if(!$result){
            die("Error: " . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    if($row!=NULL){
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        header("Location:homepage-loggedin.php");
    }
    else{
        echo "Wrong Email OR Password <br/>";
        ?><a href="login.html">Click here to try again</a><?php
    }        
?>
