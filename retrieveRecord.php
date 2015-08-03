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
      $user = array(
        "name" => array(
          "first_name" => $row['first_name'],
          "second_name" => $row['second_name']
        ),
        "cost" => 123,
        "email" => $row['email_address'],
        "gender" => $row['gender']
      );

      $letter=generateLetter($user['name']['first_name'],$user['email'],$user['cost']);

      echo ("<tr class='clickable-row' data-user_record='" . $letter . "'><td>" . $row['user_id'] . "</td> <td>" . $row['first_name'] . "</td> <td>" . $row['second_name'] . "</td> <td>" . $row['gender'] . "</td> </tr> ");
    };
};  

function generateLetter($first_name,$email,$cost){
  $template = "Dear " . $first_name . ", <p><p>
  We are please to confirm the details of your new contract, it will
  cost &pound" . $cost . " per year. <br> We would like to confirm that your email address is " . $email . "? <p>
  Kind Regards,<p>
  John.";
  return $template;
}

$conn->close();
?>


<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        //user_record = json.object = $(this).data("user_record");
        var letter = $(this).data("user_record");
        document.getElementById("modal-content").innerHTML = letter;
       
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
        <h4 class="modal-title">Generated Letter</h4>
      </div>
      <div class="modal-body">
        <p id = "modal-content">Nothing</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Print</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</script>