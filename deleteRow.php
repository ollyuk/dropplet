<?php

$servername = "localhost";
		$username = "root";
		$password = "L3@ves";
		$dbname = "utility";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		  die('Error
		' . $conn->connect_error);
		} 
		{
			/*echo('<strong>Success!</strong> MySQL connected.
			');*/
		}

// Pass across reference to mysqli connection $conn.
// Check for POST value, grab it and add to SQL and delete the row, return status.	
function deleteRecord(&$conn){
    
	$messge = "<div class='alert alert-danger'>
	      <strong>Error!</strong> No user_id passed.
	      </div>";
	if (isset($_POST['deleteRecord'])){
		$id = $_POST['deleteRecord'];
	  	$sql = "DELETE FROM users WHERE user_id=$id";

	  if ($conn->query($sql) === TRUE) {
	      $message =  "<div class='alert alert-success'>
	      <strong>Success!</strong> Record deleted.
	      </div>";

	  } else {
	      $message = "<div class='alert alert-danger'>
	      <strong>Error!</strong>: 
	      " . $conn->error . ".</div>";
	  }
	
	return $message;

	}
}

//run deleteRecord()
//echo out the error message so that it's passed to the user.
$message = deleteRecord($conn);
echo($message);
?>
