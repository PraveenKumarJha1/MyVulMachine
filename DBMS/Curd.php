<?php

class Curd extends db{

 // we extended db class here and included db.php here by using magic function auto loader


// this function is to sign  from index page to dashboard

		public function IndexSignIn($userName_value, $pass_value){
				$sql = "SELECT * FROM users WHERE user='$userName_value' AND password='$pass_value' ";
				$conn=$this->getConnection();
				$result = $conn->query($sql);
				$numRows= $result->num_rows;
				if ($numRows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
				  		$data[]=$row;
				  		$_SESSION["username"] = $row["user"];
					
						if(isset($_SESSION["username"])) {
							echo "<script>alert('Successfuly login');   window.location.href = 'dashboard.php';  </script>";
							} // end of if statement
				  } //end of while
				} 
				 else {
				  echo "UserName or email is wrong";
				}

	} //signIn function end here

	// ===========================================================================
			// sign-IN AdminLoginBypass in sql-injection.php
			public function AdminLoginBypass($userName_value, $pass_value){
				$sql = "SELECT * FROM users WHERE user='$userName_value' AND password='$pass_value' ";
				$conn=$this->getConnection();
				$result = $conn->query($sql);
				$numRows= $result->num_rows;
				if ($numRows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
				  		$data[]=$row;
				  					$row['first_name'];
						echo "<script>alert('Successfuly login');   </script>";
						
				  } //end of while
				} 
				 else {
				  echo "UserName or email is wrong";
				}

	} //signIn function end here
	// ===================================================================================
			// Search 
		public function SearchSqli($id, $security_value){

				//if security = low 
				if ($security_value = 'low'){
					$security= new security();
					$security->low($id);

				}

				elseif ($security_value = 'medium'){
						$security= new security();
						$security->medium($id);
				}

				elseif ($security_value = 'high'){

						$security= new security();
						$security->high($id);
				}
				elseif ($security_value = 'extreme'){
						$security= new security();
						$security->extreme($id);
				}
				else{
					echo "<script>alert('Please select security type')</script>";
				}

	
	        
			}// end of Search function




}
?>