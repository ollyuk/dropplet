<?php

/*
 Welcome <?php echo $_POST["first_name"]; ?><br>

second_name: <?php echo $_POST["second_name"]; ?> <br>
email_address: <?php echo $_POST["email_address"]; ?> <br>
join_date: <?php echo $_POST["join_date"]; ?> <br>
gender: <?php echo $_POST["gender"]; ?> <br> */

	include_once"index.html";
	include_once"connection.php";


	$first_name = $_POST["first_name"];
	$second_name = $_POST["second_name"];
	$email_address = $_POST["email_address"];
	$join_date = date('Y-m-d', strtotime(str_replace('-','/', $_POST["join_date"]))); //convert date to mysql friendly
	$gender = $_POST["gender"];
	
	//echo $join_date;


	// User input data should be sanitised.
	


	$sql = "INSERT INTO users (first_name, second_name, email_address, join_date, gender)
	VALUES ('$first_name', '$second_name', '$email_address', '$join_date', '$gender')";
	
	if ($conn->query($sql) === TRUE) {
	    echo ('<div class="alert alert-info">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	<strong>Record created!</strong> ' . $sql .'
		</div>');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>

</body>
</html>