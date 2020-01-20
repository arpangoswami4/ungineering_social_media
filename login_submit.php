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
    $email=$_POST['name'];
    $email=$_POST['password'];
    $sql="SELECT * FROM users WHERE name='$name' AND password='$password'";
    $result=msqli_connect($conn,$sql);
    if(!$result){
            die("Error: " .$sql."<br/>" . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    if(isset($row)){
        echo "login successful";
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
    }
    else{
        echo "WRONG EMAIL OR PASSWORD";
    }        
    ?>
