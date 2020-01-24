<?php  
    session_start();
    $hostname = "127.0.0.1";
    $username = "root";
    $db_password = "123456";
    $database = "social_media";
    $conn = mysqli_connect($hostname, $username, $db_password, $database);      
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $users_id=$_SESSION['id'];
    $status=$_POST['status']; 
    $time=date("h:i:sa");
    $date=date("Y.m.d");                                                   
    $sql = "INSERT  INTO statuses (users_id,status,time,date)  VALUES ('$users_id','$status','$time','$date') ";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }   
    header("Location:homepage-loggedin.php");   
    mysqli_close($conn); 
?>

