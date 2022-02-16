<?php
require_once"page/session-start.php";

  // GENERATE RANDOM TOKEN FOR CSRF
    if(empty($_SESSION["token"])){
    // $_SESSION["token"]=password_hash(random_bytes(32), PASSWORD_DEFAULT) ; // it is only verify using password_verify(password, hash)
      $_SESSION["token"]= random_bytes(32) ; // it is only verify using password_verify(password, hash)
  }
      $csrf = hash_hmac('sha256', 'This is string for csrf token a', $_SESSION["token"]);





    if (! isset($_SESSION['username'])) {
        header('location:index.php');
        die();
    } else {
             $username = $_SESSION["username"];
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 </head>
<body>
	<nav>
<?php include("page/header.php") ?>
	</nav>
	<section>
<?php include("page/sidebar.php") ?>

<!-- change the methord of form according to security  -->

<script type="text/javascript">
function changeMethod() {
    $("#myPost").attr("method", " ");
}



  function removeURLparameter(){
  var uri = window.location.toString();
  if (uri.indexOf("?") > 0) {
      var clean_uri = uri.substring(0, uri.indexOf("?"));
      window.history.replaceState({}, document.title, clean_uri);
  }
}


window.test = function(e) {
  if (e.value === 'low') {
    console.log(e.value);
       $("#myPost").attr("method", "GET");
  } else if (e.value === 'medium') {
    removeURLparameter();  //remove parameter from url after ?
    console.log(e.value);
     $("#myPost").attr("method", "POST");
  } else if (e.value === 'high') {
    removeURLparameter();  //remove parameter from url after ?
    window.open('session-input.php','','width=340px,height=400px');
    console.log(e.value);
  }
  else if(e.value === 'extreme'){
     removeURLparameter();  //remove parameter from url after ?
     console.log(e.value);
     $("#myPost").attr("method", "GET");      

  }else{
  }
}
</script>

		<div class="content">
		  <h2 style="text-align:center">SQL Injection Module</h2>
		  			<div class="sign-up">
     <form id="myPost" class="modal-content" action=" " method="GET" id="myPost"  style="width: 70%">
        <div class="container" style="width: 70%; margin: 0 auto;">
            <h1>Search</h1>
            <hr>
            <label for="Security">Choose Security level:</label>
                  <select id="security"   name="security" onchange="test(this)">
                    <option value="low" selected>low</option>
                    <option value="medium">medium</option>
                    <option value="high">high</option>
                    <option value="extreme">extreme(CSRF+ PDO Prepare)</option>
                  </select>
            <input type="text"  name="id" placeholder="please enter id number"  required>
            <input type="hidden" name="csrf" value="<?php echo $csrf ?>">
            <div class="clearfix">
              <button type="submit" class="search" name="search" value="search">Search</button>
            </div>
        </div>
    </form>
  </div>




<!-- =======[Result]====== -->


  <div>

      <?php
  
                        // To check low security  
        if( isset( $_GET[ 'search' ]) AND $_GET['security']=='low'){
         echo "<span style='color:red'>Low Security: </span>"; 
          $id = $_GET['id'];
          $security= $_GET['security'];

           $Curd= new curd();
          $Search = $Curd->SearchSqli($id, $security); 

}                           // To check Medium security 
elseif( isset( $_POST[ 'search' ]) ){
          echo "<span style='color:red'>Medium Security: </span>";
          $id = $_POST['id'];
          $security= $_POST['security'];

          $Curd= new curd();
          $Search = $Curd->SearchSqli($id, $security); 
}
                            // To check extreme security 
elseif(isset($_GET['search']) AND $_GET['security']=='extreme' ){
             echo "<span style='color:red'>Extreme Security: </span>";
                  $id = $_GET['id'];

                   if(hash_equals($csrf, $_GET['csrf'])){ 
                    // echo "exist";
                    $security= new security();
                     $security->extreme($id);

                  }

}
                          // To check high security
elseif( isset($_SESSION['high_security_id'])){
           echo "<span style='color:red'>High Security: </span>";
           $id = $_SESSION[ 'high_security_id' ];

            $security= new security();
            $security->high($id);
          
}

else{
  echo"choose";
}

      ?>

  </div>
		
		</div>

	</section>

	

</body>
</html>


