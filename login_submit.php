<?php
    session_start();
    $hostname="127.0.0.1";
    $sql_username="root";
    $db_password="123456";
    $db_name="social_media";
    
    $response=array();
    $conn=mysqli_connect($hostname,$sql_username,$db_password,$db_name);
    if(!$conn){
        $response["success"]=false;
        $response["message"]="Connection failed: " . mysqli_connect_error();
        echo json_encode($response);
        exit();
    }
    $email=$_POST['email'];
    $password=$_POST['password'];
    if($email==NULL && $password==NULL)
    {
        $response["success"]=false;
        $response["message"]="Please fillup the Email and password field properly";
        echo json_encode($response);
        exit;
    }
    
    if($email==NULL)
    {
        $response["success"]=false;
        $response["message"]="Please fillup the Email field";
        echo json_encode($response);
        exit;
    }
    if($password==NULL)
    {
        $response["success"]=false;
        $response["message"]="Please fill up the password field";
        echo json_encode($response);
        exit;
    }
    
    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        $response["success"]=false;
        $response["message"]="Error: " . mysqli_error($conn);
        echo json_encode($response);
        exit;
    }
    $row=mysqli_fetch_array($result);
    if($row!=NULL){
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        $response["success"]=true;
        echo json_encode($response);
    }
    else{
        $response["success"]=false;
        $response["message"]="Wrong email or password entered";
        echo json_encode($response);
    }
    mysqli_close($conn);        
?>
