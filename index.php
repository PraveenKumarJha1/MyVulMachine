<?php
session_start();

function __autoload($className){
  require_once "DBMS/$className.php";
}


// taking input from form and sending it to curd page inside dbms folder to connect db and perform sign in task

if( isset( $_POST[ 'login' ] ) ) { // here we are making 

	$userName = test_input($_POST['userName']);
    $pass = test_input($_POST['passwd']);
	$hash_pass=md5($pass);

    $Curd= new curd();
    $SignIn = $Curd->IndexSignIn($userName, $hash_pass); 




}
// by using this function we are treaming white space , striping slashes & converting ...
//.. apecial symbol to character of input data that we recieved from form 


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modern Vulnerable Web Application</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

</head>
<body style="background: rgba(0, 192, 0, 0.3) ">

	<h1 style="text-align:center; margin-top: 20px ;">Modern Vulnerable Web Application</h1>

		<div class="sign-up">
     <form class="modal-content" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
        <div class="container" style="width: 70%; margin: 0 auto;">
            <h1>Login</h1>
            <hr>
            <label for="userID"><b>User ID</b></label>
            <input type="text" placeholder="Enter userName" name="userName" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Your Password" name="passwd" required>

            <div class="clearfix">
              <button type="submit" class="login" name="login" value="login">Sign Up</button>
            </div>
        </div>
    </form>
  </div>

</body>
</html>