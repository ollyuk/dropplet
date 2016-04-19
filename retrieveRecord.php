<?php

//index.html is the navbar
// connection.php is MySQL connector and user authentication.
include_once"index.html";
include_once"connection.php";
include_once"class/class.Record.inc";

// Overview: Loop thru SQL DB utility.users table and generate $user array of sql data, put it into an html table. Generate a $letter and add it to the <tr> element. 
// Add listener to .clickable-row class and edit the modal text content data-user_record before showing it.
// Uses HTML5, PHP, MySQL, JS, JQuery, Bootstrap.
echo ("<h1> Retrieve Records </h1>");
echo ("Click row to send letter <p>");
$sql = "SELECT user_id, first_name, second_name, email_address, join_date, gender FROM users";
$result = $conn->query($sql);

// generate a letter.
function generateLetter($first_name,$email,$cost){
  $template = "Dear " . $first_name . ", <p><p>
  We are pleased to confirm the details of your new contract, it will
  cost &pound" . $cost . " per year. <p>We would also like to confirm that we have the correct contact details for you and that your email address is " . $email . "? <p>
  Kind Regards,<p>
  John.";
  return $template;
}

$user = new User_Record();

echo "<table class='table table-striped table-hover'>
  <tr>
    <th> user_id </th> <th> first_name </th> <th> second_name </th> <th> gender </th> 
  </tr>
  ";

// $test_user = new User_Record;
// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $test_user->add_record($row);
// }

// echo 'herp '.$test_user->first_name;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {                
      //$user_id = $row['user_id'];
      //$record[] = $row;
      $user->add_record($row);
      // $user = array(
      //   "user_id" => $row['user_id'],
      //   "name" => array(
      //     "first_name" => $row['first_name'],
      //     "second_name" => $row['second_name']
      //   ),
      //   "join_date" => $row['join_date'],
      //   "cost" => 123,
      //   "email_address" => $row['email_address'],
      //   "gender" => $row['gender']
      // );
      echo($user->display_name());

      //create letter from array values.
      $json_row = json_encode($user);
      $letter=generateLetter($user->display_name(),$user->display_email(),$user->display_cost());


      echo ("<tr id = 'user_id" . $user->display_name() . "' class='clickable-row' data-user_record='" . $letter. "'><td>" . $row['user_id'] . "</td> <td>" . $row['first_name'] . "</td> <td>" . $row['second_name'] . "</td> <td>" . $row['gender'] . "</td> </tr> ");
    };
};  
 
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {                
//       $user_id = $row['user_id'];
//       $record[] = $row;
   
//     $test_user = new User_Record;
//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         $test_user->add_record($row);
//     }


       //create letter from array values.
      $letter=generateLetter($user->display_name(),$user->display_email(),$user->display_cost());


//       echo ("<tr class='clickable-row' data-user_record='" . $letter . "'><td>" . $row['user_id'] . "</td> <td>" . $row['first_name'] . "</td> <td>" . $row['second_name'] . "</td> <td>" . $row['gender'] . "</td> </tr> ");
//     };
// };  



$conn->close();
?>


<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        //letter = "Hello Friends!";

        letter = $(this).data("user_record");
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
