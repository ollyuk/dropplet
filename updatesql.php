<?php


	// Include bootstrap and navbar.
	include_once"index.html";
	//Include mysql connector, also user authentication.
	include_once"connection.php";

	$id =$_POST["user_id"];
	$first_name = $_POST["first_name"];
	$second_name = $_POST["second_name"];
	$email_address = $_POST["email_address"];
	$join_date = date('Y-m-d', strtotime(str_replace('-','/', $_POST["join_date"]))); //convert date to mysql friendly
	$gender = $_POST["gender"];
	
	//echo $join_date;


	// User input data should be sanitised.

	$sql = "UPDATE users SET first_name='$first_name', second_name = '$second_name' , email_address = '$email_address', join_date = '$join_date', gender = '$gender' WHERE user_id='$id'";
	
	if ($conn->query($sql) === TRUE) {
	    echo ('<div class="alert alert-info">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	<strong>Record created!</strong> ' . $sql .'
		</div>');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
  	header('Location: http://localhost/dpm/updateRecord.php');

?>

</body>
</html>