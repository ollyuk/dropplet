<?php
	require_once"index.php";

	if($application->getUserLoginStatus()){
	
		$servername = "localhost";
		$username = "simonsHR";
		$password = "password";
		$dbname = "utility";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		  die('<div class="alert alert-danger">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>MySQL Connection failed: </strong>
		' . $conn->connect_error) . '</div>';
		} 
		echo('<div class="alert alert-success">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Success!</strong> MySQL connected.
		</div>');
	} 
	else
	{
		die('<div class="alert alert-danger">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>You are not logged in.</strong></div>');
	}

?>
