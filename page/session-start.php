<!-- 

1)session starting here using session_start() function of php

2)checking if there is any value in session['username'] or not
     ==> if empty then redirect to ===> index.php  page as you are not login  
     ==> if there is value in session['username'] the stay at that page
 -->

<?php
 session_start();
    if (!isset($_SESSION['username'])) {
        header('location:index.php');
        die();
    } else {
// echo        $username = $_SESSION["username"];
}

?>