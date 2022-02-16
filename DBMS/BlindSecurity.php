<?php

class BlindSecurity extends db {

	public function low($id){
		// echo $id;

		echo $sql = "SELECT  first_name, last_name FROM users WHERE user_id='$id'; ";
			$conn=$this->getConnection();
			$result = $conn->query($sql);
		      
		      $num= @mysqli_num_rows($result); //  The '@' character suppresses errors

		      if($num> 0){

		         // output data of each row
		         while($row = $result->fetch_assoc()) {
		             $data[]=$row;
		 
		              echo "<br><label><b>User ID  exists in the database </b></label>";    

		         } //end of while
		          $conn->close();

		        }// end of if statement
		        	else {
		// Feedback for end user
		echo'<pre>User ID is MISSING from the database.</pre>';
	}

		     }// end of low security function

		 
	public function middle($id){
			$conn=$this->getConnection(); // get connection

			$id = ((isset($conn) && is_object($conn)) ? mysqli_real_escape_string($conn,  $id ) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));



			echo $sql = "SELECT first_name, last_name FROM users WHERE user_id = $id;";
			// $conn=$this->getConnection();
			$result = $conn->query($sql);
		      
		     //get result

			$num= @mysqli_num_rows($result); //  The '@' character suppresses errors
		      if($num> 0){

		         // output data of each row
		         while($row = $result->fetch_assoc()) {
		             $data[]=$row;
		 
		              echo "<br><label><b>User ID  exists in the database </b></label>";    

		         } //end of while
		         $conn->close();

		        }// end of if statement
		      else {
		// Feedback for end user
		echo'<pre><b>User ID is MISSING from the database.</b></pre>';
	}


	}// end of middle security function


	public function high($id){
			echo $sql="SELECT first_name, last_name FROM users WHERE user_id = '$id' LIMIT 1;";
			$conn=$this->getConnection();
			$result = $conn->query($sql);

// Get results
	$num = @mysqli_num_rows( $result ); // The '@' character suppresses errors
	if( $num > 0 ) {
		// Feedback for end user
		echo '<pre><b>User ID exists in the database.</b></pre>';
	}
	else {
		// Might sleep a random amount
		if( rand( 0, 5 ) == 3 ) {
			sleep( rand( 2, 4 ) );
		}

		// User wasn't found, so the page wasn't!
		// header( $_SERVER[ 'SERVER_PROTOCOL' ] . ' 404 Not Found' );

		// Feedback for end user
		echo'<pre><b>User ID is MISSING from the database.</b></pre>';
	}


	} // end of high security function



	public function extreme($id){
		echo $id;
			$conn=$this->getPDOConnection();
			if(is_numeric( $id ))
			{
				$query = $conn->prepare( 'SELECT first_name, last_name FROM users WHERE user_id = (:id) LIMIT 1;' );
				 $query->bindParam( ':id', $id, PDO::PARAM_INT );
				 $query->execute();
				// $row = $query->fetch();
				if( $query->rowCount() == 1 ) {
					// Get values
					echo '<pre><b>User ID exists in the database.</b></pre>';
	
								} else {
						// Feedback for end user
						echo'<pre>User ID is MISSING from the database.</pre>';
					}

			}



	}// end of extreme security function

		 }//end of class
