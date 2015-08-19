<?php

include_once"index.html";
include_once"connection.php";
// echo("<div class='well'> No updating records yet... </div>");

// Overview: Loop thru SQL DB utility.users table and generate $user array of sql data, put it into an html table. Generate a $letter and add it to the <tr> element. 
// Add listener to .clickable-row class and edit the modal text content data-user_record before showing it.
// Uses HTML5, PHP, MySQL, JS, JQuery, Bootstrap.
echo ("<h1> Update Records </h1>");
echo ("Click row to update record <p>");
$sql = "SELECT user_id, first_name, second_name, email_address, join_date, gender FROM users";
$result = $conn->query($sql);

echo "<table class='table table-striped table-hover'>
  <tr>
    <th> user_id </th> <th> first_name </th> <th> second_name </th> <th> gender </th> 
  </tr>
  ";


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {                
      //$user_id = $row['user_id'];
      //$record[] = $row;
      $user = array(
        "user_id" => $row['user_id'],
        "name" => array(
          "first_name" => $row['first_name'],
          "second_name" => $row['second_name']
        ),
        "join_date" => $row['join_date'],
        "cost" => 123,
        "email_address" => $row['email_address'],
        "gender" => $row['gender']
      );

      //create letter from array values.
      $json_row = json_encode($user);
      //$letter=generateLetter($user['name']['first_name'],$user['email'],$user['cost']);


      echo ("<tr class='clickable-row' data-user_record='" . $json_row . "'><td>" . $row['user_id'] . "</td> <td>" . $row['first_name'] . "</td> <td>" . $row['second_name'] . "</td> <td>" . $row['gender'] . "</td> </tr> ");
    };
};  


// generate a letter.


$conn->close();
?>


<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        json_row = $(this).data("user_record");
        $(document.getElementById("modal-user_id")).val(json_row['user_id']);
        $(document.getElementById("modal-first_name")).val(json_row['name']['first_name']);
        $(document.getElementById("modal-second_name")).val(json_row['name']['second_name']);
        $(document.getElementById("modal-email_address")).val(json_row['email_address']);
        $(document.getElementById("modal-join_date")).val(json_row['join_date']);

        // Default to male unless check says female.
        $(document.getElementById("modal-gender_male")).prop('checked', true);

        if (json_row['gender']=="female") {
          $(document.getElementById("modal-gender_female")).prop('checked', true);
        };

        




        $('#myModal').modal('show');
    });
});
</script>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Record</h4>
      </div>
      <div class="modal-body">
        <p id = "modal-content">	
			<div class = "form-group">
				<form role="form" action="updatesql.php" method="post">
          <input id = "modal-user_id" class="form-control" type="hidden" name="user_id" value=""></br>
					<label for="first_name">First Name:</label> <input id = "modal-first_name" class="form-control" type="text" name="first_name"  autofocus required="required" value="me"><br>
					<label for="second_name">Second Name: </label> <input id = "modal-second_name"class="form-control" type="text" name="second_name" placeholder="Dole" required="required"><br>
					<label for="email_address">E-mail: </label> <input id = "modal-email_address"type="email" class="form-control" name="email_address" placeholder="bob@dole.com" required="required"><br>
					<label for="join_date">Join Date: </label> <input id = "modal-join_date" class="form-control" type="date" name="join_date" required="required"><br> <!--would be nice to add JS todays date as default value-->
			</div>	
			<div class="radio">
					
						<label class="radio-inline"> <input  id = "modal-gender_female" type="radio" name="gender" value="female"> Female </label>
						<label class="radio-inline"> <input  id = "modal-gender_male" type="radio" name="gender" value="male" checked="checked"> Male </label>
			</div>
				
				
			
      </div>
      <div class="modal-footer">
        <input class="form-control" type="submit">
        </p>
      </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</script>
