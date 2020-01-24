<html>
    <head>
        <title>My Profile</title>
        <link rel="stylesheet" href="css/myprofile.css"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    </head>
    <body>
        <div class="d1">
            <div class="r1">
                 <a href="https://www.ungineering.com/">  
                    <div class="r11"><img style="float:right;height:65px;" src="http://www.ungineering.com/static/img/ungineering_logo.svg" alt="Ungineering logo"></div>
                    <div class="r12">
                        <h1><span>un</span>gineering</h1>
                        <h6>A <span>bit</span> of knwoledge is good. A <span>byte</span> is better</h6>
                    </div>
                 </a>
            </div>
            <div class="r2">
                <b><a style="color: black;" href="https://www.youtube.com/">My D<span style="text-decoration: none; color: black;">ashboard</span></a></b>
                <a href="logout.php" style="text-decoration:none;" class="logout">Logout</a>
            </div>
        </div>
        <hr>
        <div class="d2">
            <div class="c1">
                <a href="https://www.youtube.com/"><span style="color: black;" ><b>Profile</b></span></a></br></br></br>
                <a href="https://www.youtube.com/"><span style="text-decoration: underline;"><b>Edit profile</b></span></a>
            </div>
            <div class="c2">
                
                
                <?php
                    session_start();
                    $hostname="127.0.0.1";
                    $username="root";
                    $db_password="123456";
                    $db_name="social_media";
                    
                    $conn=mysqli_connect($hostname,$username,$db_password,$db_name);
                    if(!$conn)
                    {
                        die("Connection failed : ". mysqli_connect_error());
                    }
                    
                    
                    $sql="SELECT * FROM statuses ORDER BY date";
                    
                    $result=mysqli_query($conn,$sql); 
                    if(!$result)
                    {
                        die("Error: ".$sql."<br/>". mysqli_error($conn));
                    }
                    
                    $_SESSION['id']=3;
                    
                    
                    while ( $row=mysqli_fetch_array($result)) 
                    {
                        if ($_SESSION['id']==$row['users_id'])
                        {
                         
                ?>          
                <div class="c21">
                                      
                            <p><?php echo $row['status']; ?></p>
                            <div class="time"><?php echo $row['time']."/".$row['date']; ?></div>          
                </div>       
                <?php      
                        }
                     } 
                     mysqli_close($conn);
                ?>
                   
            </div>    
        </div>
        <div class="d3">
            <div class="d31">Connect with us at<br><br><a href="https://www.youtube.com/"><img class="nimg" src="https://i.pinimg.com/originals/19/7b/36/197b365922d1ea3aa1a932ff9bbda4a6.png" alt="Youtube logo"></a><a href="https://m.facebook.com/"><img class="nimg" src="https://en.facebookbrand.com/wp-content/uploads/2019/04/f_logo_RGB-Hex-Blue_512.png" alt="Facebook logo"></a></div>
            <div  class="d32" style="text-align:right;">For any questions/doubts,write us at <h1>queries@ungineering.com</h1></div>
        </div>
    </body>
</html>
        
