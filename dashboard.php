<?php
require_once"page/session-start.php";
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
	<nav>
			<?php include('page/header.php'); ?>
	</nav>
	<section>
			<h1 style="text-align:center">ALL Module</h1>
			<div class="flex-container">
					<div class="card">
						<img src="assets/img/sql.jpg" alt="Avatar" style="width:100%">
						<div class="container">
							<h4 style="cursor: pointer;"><b><a href="Sql-Injection.php">SQL Injection<br>->Authentication Bypass</a></b></h4>
					</div>
			</div>

					<div class="card">
						<img src="assets/img/sql.jpg" alt="Avatar" style="width:100%">
						<div class="container">
							<h4 style="cursor: pointer;"><b><a href="retrieving-hidden-data.php">SQL Injection<br>->hidden data retrive</a></b></h4>
					</div>
			</div>


			<div class="card">
				<img src="assets/img/sql.jpg" alt="Avatar" style="width:100%">
				<div class="container">
					<h4 style="cursor: pointer;"><b><a href="blind-sql-Injection.php">SQL Injection<br>->Blind Injection</a></b></h4> 
		    </div>
			</div>

			<div class="card">
				<img src="assets/img/sql.jpg" alt="Avatar" style="width:100%">
				<div class="container">
					<h4 style="cursor: pointer;"><b><a href="../carRent/">Live Website<br>->find all vulnerabiliy</a></b></h4> 
		    </div>
			</div>

		</div>
	</section>

	

</body>
</html>