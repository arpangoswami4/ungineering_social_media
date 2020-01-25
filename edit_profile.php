<!doctype html>
<html>
    <head>
       <link rel= "stylesheet" type="text/css" href="/social_media/css/edit_profile.css">
    </head>
    <body>
        <div class ="d1">
            <div class ="logo">
                <img class="logo-img" src="http://www.ungineering.com/static/img/ungineering_logo.svg" ></img>
                <div class="logo-text" href="#home"><span>un</span>gineering
                    <div class="tagline">a <span>bit</span> of knowledge is good.a <span>byte</span> is better</div>
                </div>
            </div>
            <div class="r2">
                <a style="color: black;" href="https://www.youtube.com/">My D<span style="text-decoration: none; color: black;">ashboard</    
                span></a>
                
                <a href="logout.php" style="text-decoration:none;" class="logout">Logout</a>
            </div>
            
        </div>
        <div class ="d2">
            <div class ="col1">
                <a href="myprofile.php"><span style="text-decoration: underline;" >Profile</span></a></br></br></br>
                <a href="https://www.youtube.com/"><span style="color:black;">Edit profile</span></a>
            </div>
            <div class ="col2">
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
                
                //$_SESSION['id']=4;
                
                $sql="SELECT * FROM users WHERE id=$_SESSION[id]";
                
                $result=mysqli_query($conn,$sql); 
                if(!$result)
                {
                    die("Error: ".$sql."<br/>". mysqli_error($conn));
                }
                
              
                $row=mysqli_fetch_array($result);
                
                ?>
                    
                    
                        <form id="editform" method="post" action="edit_profileback.php">
                            Name <br/><br/>
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" >
                            <br/><br/>
                            Email <br/><br/>
                            <input type="text" name="email" value="<?php echo $row['email']; ?>" >
                            <br/><br/>
                            Password <br/><br/>
                            <input type="password" name="password" value="<?php echo $row['password']; ?>" >
                            <br/><br/>
                            College <br/><br/>
                            <input type="text" name="college" value="<?php echo $row['college']; ?>" >
                            <br/><br/>
                            Phone Number <br/><br/>
                            <input type="text" name="phoneno" value="<?php echo $row['phone_no']; ?>" >
                            <br/><br/>
                            <input type="submit" name="submit">
                        </form>
            </div>
        </div>
        <div class ="bottom">
            <div class ="connect">connect with us at
                <div>
                    <img class="icon" src="http://www.ungineering.com/static/img/icon-row row3-youtube.svg">
                    <img class="icon" src="http://www.ungineering.com/static/img/icon-row row3-facebook.svg">
                </div>
            </div>
            <div class ="queries">
                <p class="q1">For any questions / doubts, write us at:</p>
                    <p class="q2">queries@ungineering.com</p>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/editprofile.js"></script>
       
    </body>
</html>
