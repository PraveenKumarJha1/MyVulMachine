<?php
require_once"page/session-start.php";

    if (!isset($_SESSION['username'])) {
        header('location:index.php');
        die();
    } else {
      // echo        $username = $_SESSION["username"];
          }

function __autoload($className){
  require_once "DBMS/$className.php";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome:: Dashboard</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
 </head>
<body>


</script>

		<div class="content">
		  <h2 style="text-align:center">SQL Injection Module</h2>
		  			<div class="sign-up">
     <form id="myPost" class="modal-content" action=" " method="POST" id="myPost"  style="width: 70%">
        <div class="container" style="width: 70%; margin: 0 auto;">
            <h1>Search</h1>
            <hr>
     
            <input type="text"  name="id" placeholder="please enter id number"  required>

            <div class="clearfix">
              <button type="submit" class="search" name="search" value="search">Search</button>
            </div>
        </div>
    </form>
  </div>




<!-- =======[Result]====== -->


  <div>

      <?php  
          if( isset( $_POST[ 'search' ])){

                   $_SESSION['high_security_id'] =  $_POST[ 'id' ]; // session created here so that we can fatchit as retrieving-hidden.php
                   $_GET['search']='';
           		echo " 		<script>window.opener.location.reload(true);</script> 		";    
                 
          }

      ?>

  </div>
		
		</div>

	

</body>
</html>