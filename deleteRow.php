<?php

function deleteRecord($id){
    // sql to delete a record
	if (isset($_POST['id'])){
	  	$sql = "DELETE FROM users WHERE user_id=$id";

	  if ($conn->query($sql) === TRUE) {
	      $message =  "Record deleted successfully";
	  } else {
	      $message = "Error deleting record: " . $conn->error;
	  }
	
	return $message;

	}
}

?>
