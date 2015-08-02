<?php

include_once"index.html";
include_once"connection.php";

echo ("<h1> Retrieving records </h1>");
echo ("Click row to send letter <p>");
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
      echo ("<tr class='clickable-row' data-user_record='" . json_encode($row) . "'><td>" . $row['user_id'] . "</td> <td>" . $row['first_name'] . "</td> <td>" . $row['second_name'] . "</td> <td>" . $row['gender'] . "</td> </tr> ");
    };
};  




$conn->close();
?>

<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        //user_record = json.object = $(this).data("user_record");
        alert("Ajax call on deleteRow.php -> deleteRecord()");
        $.ajax({
          url: '/deleteRow.php',
          type: 'post',
          data: { "deleteRecord": "1"},
        }).done(function(message) {
          alert(message);
        });
        
    });
})
</script>
