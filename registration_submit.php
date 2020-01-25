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
        exit;
    }
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $fill="Please fill up ";
    if($name==NULL  || $email==NULL || $password==NULL || $confirm_password==NULL)
    {
        $response['success']=false;
        if($name==NULL)
            $fill="$fill" . 'name,';
        if($email==NULL)
            $fill="$fill" . 'email,';
        if($password==NULL)
            $fill="$fill" . 'password,';
        if($confirm_password==NULL)
            $fill="$fill" . 'confirm password';
        $fill="$fill" .' field properly';
        $response['message']="$fill";
        echo json_encode($response);
        exit;        
    }
    if($password!=$confirm_password)
    {
        $response['success']=false;
        $response['message']="Password not matched";
        echo json_encode($response);
        exit;
        
    }
    $sql="INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        $response["success"]=false;
        $response["message"]="Error: " . mysqli_error($conn);
        echo json_encode($response);
        exit;

    }
    $sql1="SELECT * FROM users WHERE name='$name'";
    $result1=mysqli_query($conn,$sql1);
    if(!$result1){
        $response["success"]=false;
        $response["message"]="Error: " . mysqli_error($conn);
        echo json_encode($response);
        exit;
    }
    $row=mysqli_fetch_array($result1);
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$name;        
    $response['success']=true;
    echo json_encode($response);    
    mysql_close($conn);
?>

