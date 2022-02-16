<?php

class security extends db {

	public function low($id){
		// echo $id;

		echo $sql = "SELECT  first_name, last_name FROM users WHERE user_id='$id'; ";
			$conn=$this->getConnection();
			$result = $conn->query($sql);
		      if (!$result) { echo $conn->close(); }

		         // output data of each row
		         while($row = $result->fetch_assoc()) {
		             $data[]=$row;
		               echo "<h3>Result: <h3>";
		              echo "<label><b>User ID : </b></label>" .$id ." <br>";
		              echo "<label><b>First Name : </b></label>" .$row["first_name"] ."<br>";
		              echo "<label><b>Last Name : </b></label>" .$row["last_name"];
		            
		              // print_r($row);
		         } //end of while

	}// end of low security function
	public function middle($id){
			echo $sql = "SELECT first_name, last_name FROM users WHERE user_id = $id;";
			$conn=$this->getConnection();
			$result = $conn->query($sql);
		       // $numRows= $result->num_rows;
				if ($result->num_rows > 0) {
					echo"ddd";
		         // output data of each row
		         while($row = $result->fetch_assoc()) {
		             $data[]=$row;
		               echo "<h3>Result: <h3>";
		              echo "<label><b>User ID : </b></label>" .$id ." <br>";
		              echo "<label><b>First Name : </b></label>" .$row["first_name"] ."<br>";
		              echo "<label><b>Last Name : </b></label>" .$row["last_name"];
		            

		         } //end of while
		     }// end of if statement


	}// end of middle security function
	public function high($id){
			echo $sql="SELECT first_name, last_name FROM users WHERE user_id = '$id' LIMIT 1;";
			$conn=$this->getConnection();
			$result = $conn->query($sql);
			if (!$result) {

							 die("<br> <h3 style='color:red;'>Error: Something went wrong.  </h3>" .mysqli_connect_error());
							// die("Connection failed: " );
						}
		      

		         // output data of each row
		         while($row = $result->fetch_assoc()) {
		             $data[]=$row;
		               echo "<h3>Result: <h3>";
		              echo "<label><b>User ID : </b></label>" .$id ." <br>";
		              echo "<label><b>First Name : </b></label>" .$row["first_name"] ."<br>";
		              echo "<label><b>Last Name : </b></label>" .$row["last_name"];
		            

		         } //end of while



	} // end of high security function
	public function extreme($id){
		echo $id;
			$conn=$this->getPDOConnection();
			if(is_numeric( $id ))
			{
				$query = $conn->prepare( 'SELECT first_name, last_name FROM users WHERE user_id = (:id) LIMIT 1;' );
				 $query->bindParam( ':id', $id, PDO::PARAM_INT );
				 $query->execute();
				$row = $query->fetch();
				if( $query->rowCount() == 1 ) {
					// Get values
					  echo "<h3>Result: <h3>";
		              echo "<label><b>User ID : </b></label>" .$id ." <br>";
		              echo "<label><b>First Name : </b></label>" .$row["first_name"] ."<br>";
		              echo "<label><b>Last Name : </b></label>" .$row["last_name"];
			}
				}




	}// end of extreme security function


}// end of class

?>