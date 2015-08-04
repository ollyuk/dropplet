<?php

include_once"index.html";
include_once"connection.php";

//maybe change to bootstrap info to match rest of site.
echo ("<h1> Retrieving records </h1>");
echo ("Click row to delete <p>");
echo ("<div id = 'notification area'></div>");
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
      echo ("<tr class='clickable-row' data-user_record='" . json_encode($row) . "' data-user_id='" . $row['user_id'] . "'><td data-user_id='" . $row['user_id'] . "'>" . $row['user_id'] . "</td> <td>" . $row['first_name'] . "</td> <td>" . $row['second_name'] . "</td> <td>" . $row['gender'] . "</td> </tr> ");
    };
};  




$conn->close();
?>

<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {

        // Pick up the json object stored in data-user_record and retrieve the user_id
        // POST to deleteRow.php?deleteRecord=user_id
        // Notify user

        
        $.ajax({
          url: '/deleteRow.php',
          type: 'post',
          data: { "deleteRecord": $(this).data("user_record")['user_id']},
        }).done(function(message) {
          alert(message);
        });
        
    });
})


</script>
