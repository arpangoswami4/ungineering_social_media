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
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    if($password!=$confirm_password)
    {
        echo"Password not matched <br/>";
        ?><a href="registration.html">Click here to try again</a><?php
        exit;
        
    }
    $sql="INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        die("Error: " .$sql."<br/>" . mysqli_error($conn));
    }
    $sql1="SELECT * FROM users WHERE name='$name'";
    $result1=mysqli_query($conn,$sql1);
    if(!$result){
        die("Error: " .$sql."<br/>" . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result1);
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$name;        
    header("Location:homepage-loggedin.html");
    mysql_close($conn);
?>

