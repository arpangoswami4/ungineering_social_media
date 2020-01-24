<?php
    session_start();
    session_destroy();
    echo "logout successfull";
    header("location:homepage.html");
?>
