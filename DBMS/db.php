<?php



class db{
	private $servername = "localhost";
	private $username="root";
	private $password="";
	private $dbname="mva";
	private $conn;

	// function __construct()
 //    {

 //    	$this->conn = $this->getConnection();
 //    }


		protected function getConnection()
		{
				// Create connection
				$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

				// Check connection
				if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
				}
				else{
						$conn->set_charset("utf8");
	        			return $conn;
	        			echo"success <br>";
				}

			}


			protected function getPDOConnection()
		{
			try{
				$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
				  // set the PDO error mode to exception
				  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						// $conn->set_charset("utf8");
	        			return $conn;
	        			// echo"success <br>";
			}// close try 
			catch(PDOException $e) {
 						 echo "Error: " . $e->getMessage();
				}
			
			}


} // close of class
?>