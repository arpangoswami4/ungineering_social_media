<!DOCTYPE html>
<html>
    <head>
        <title>homepage-loggedin</title>
        <link rel="stylesheet" href="css/homepage.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">      
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    </head> 
    <body>  
        <div class="navbar">
            <div class="logo-section">
                <div class="logo">
                    <a  href="http://www.ungineering.com/">            
                        <div class="logo-img">
                            <img  src="http://www.ungineering.com/static/img/ungineering_logo.svg" ></img>
                        </div>
                        <div class="logo-text" href="#home"><span>un</span>gineering
                            <div class="tagline">A <span>bit</span> of knowledge is good.A <span>byte</span> is better</div>
                        </div>
                    </a>
                </div>          
            </div>                  
            <div class="login">
                <?php
                    session_start();
                    if (isset($_SESSION['id'])) {
                        ?>
                        <div class="button">          
                            <div class="coloured-link"><a href="http://127.0.0.1/social_media/logout.php">Logout</a></div>             
                        </div>
                        <div  class="dashboard">
                            <a class="coloured-link" href="http://127.0.0.1/social_media/myprofile.php">My Dashboard</a>
                            <i class="fa fa-caret-down"></i>    
                        </div>    
                        <?php 
                    }      
                    else{
                        ?>
                        <div class="button">
                            <a class="coloured-link" href="http://127.0.0.1/social_media/registration.html">New User</a>
                        </div>
                        <div class="btn1 button">
                            <a class="coloured-link" href="http://127.0.0.1/social_media/login.html">Login</a>
                        </div>           
                        <?php
                    }
                ?>                         
            </div>  
        </div>
    
        <div class="textarea-container">   
            <?php
                session_start();
                if (isset($_SESSION['id']))
                {
                    ?>
                    <div class="textarea">
                        <h1>Write something here</h1>
                        <form method="post" action="homepage_status.php">
                            <textarea class="text" value="" name="status"> </textarea>
                            <div class="post"><button class="postbutton" type ="submit" formmethod="post">Post</button></div>
                        </form>  
                    </div>   
                    <?php
                        $hostname = "127.0.0.1";
                        $username = "root";
                        $db_password = "123456";
                        $database = "social_media";
                        $response=array();
                        $conn = mysqli_connect($hostname, $username, $db_password, $database);      
                        if (!$conn) {
                            $response['success'] = false;
                            $response['message'] = "Connection failed: " . mysqli_connect_error();
                            echo json_encode($response);
                            exit();
                        }        
                        $sql="SELECT * FROM statuses INNER JOIN users ON users.id=statuses.users_id ORDER BY users_id DESC";
                        $result = mysqli_query($conn, $sql);
                        if (!$result) {
                            $response['success'] = false;
                            $response['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
                            echo json_encode($response);
                            exit();
                        }              
                        while ($row=mysqli_fetch_array($result) ) 
                        {
                    ?>
                        <div class="comment">
                            <p class="p-name">
                                <?php echo $row['name'];?>    
                            </p>
                            <p class="p-comment">
                               <?php echo $row['status'];?>
                            </p>               
                            <p class="time">
                               <?php echo  "Time: " . $row['time'] . "|";?>
                               <?php echo $row['date'];?>                    
                            </p>                     
                        </div>                        
                    <?php
                    }
                  }
                
                else{      
                    $hostname = "127.0.0.1";
                    $username = "root";
                    $db_password = "123456";
                    $database = "social_media";
                    $conn = mysqli_connect($hostname, $username, $db_password, $database);      
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }        
                    $sql="SELECT * FROM statuses INNER JOIN users ON users.id=statuses.users_id ORDER BY users_id DESC";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        die("Error: " . $sql . "<br>" . mysqli_error($conn));
                    }              
                    while ($row=mysqli_fetch_array($result) ) {
                        ?>
                        <div class="comment">
                            <p class="p-name">
                                <?php echo $row['name']; ?>    
                            </p>
                            <p class="p-comment">
                               <?php echo $row['status']; ?>
                            </p>               
                            <p class="time">
                                <?php echo  "Time: " . $row['time'] . "|"; ?>
                                <?php echo $row['date']; ?>                    
                            </p>                     
                        </div>
                        <?php                
                    }          
                }          
            ?>     
        </div>         
                      
        <div class="footer">      
            <div class="contact-section">
                <div class="contact">
                    <div>Connect with us at</div>
                    <div>
                        <img class="icon" src="http://www.ungineering.com/static/img/icon-footer-youtube.svg">
                        <img class="icon" src="http://www.ungineering.com/static/img/icon-footer-facebook.svg">
                    </div>
                 </div>   
            </div>     
            <div class="queries-section">
                <div class="queries">
                    <p class="q1">For any questions / doubts, write us at:</p>
                    <p class="q2">queries@ungineering.com</p>
                </div>
            </div>        
        </div>
        
        
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/homepage.js"></script>
        
        
    </body>
</html>



