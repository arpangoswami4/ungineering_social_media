<?php
        session_start();
        $hostname="127.0.0.1";
        $username="root";
        $db_password="123456";
        $db_name="social_media";
        
        $response = array();
        $conn=mysqli_connect($hostname,$username,$db_password,$db_name);
        if(!$conn)
        {
            $response['success'] = false;
            $response['message'] = "Connection failed: " . mysqli_connect_error();
            echo json_encode($response);
            exit();
        }
        
       
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $college=$_POST['college'];
        $phoneno=$_POST['phoneno'];
        
        $sql="UPDATE users SET name='$name',email='$email',password='$password',college='$college',phone_no='$phoneno' WHERE id=$_SESSION[id] ";
        
        $result=mysqli_query($conn,$sql); 
        if(!$result)
        {
            $response['success'] = false;
            $response['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo json_encode($response);
            exit();
        }
        
        $response['success'] = true;
        $response['message'] = "Profile edit successful";
        echo json_encode($response);
        mysqli_close($conn);
       
       
     
        
    
?>
