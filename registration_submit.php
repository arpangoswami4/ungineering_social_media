<?php
    session_start();
    $hostname="127.0.0.1";
    $sql_username="root";
    $db_password="123456";
    $db_name="social_media";
    
    
    $conn=msqli_connect($hostname,$sql_username,$db_password,$db_name);
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    if($password!=$confirm_password)
    {
        echo "password not matched,please enter again";
        
    }
    $sql="INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
    $result=msqli_query($conn,$sql);
    if(!$result){
        die("Error: " .$sql."<br/>" . mysqli_error($conn));
    }
    $sql1="SELECT * FROM users WHERE name='$name'";
    $result1=$msqli_query($conn,$sql1);
    if(!$result){
        die("Error: " .$sql."<br/>" . mysqli_error($conn));
    }
    $row=msqli_fetch_array($result);
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$name;        
    echo "Registration sucessful";
    mysql_close($conn);
?>

