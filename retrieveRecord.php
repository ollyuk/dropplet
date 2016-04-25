<?php

include_once"index.html";
include_once"connection.php";
include_once"class/class.Record.inc";
include_once"class/class.Plan.inc";


$user = new User_Record();
$plan = New Plan_Record();

$sql = "select u.*, p.*
from users u 
left join users_plans bp on u.user_id = bp.user_id 
left join plans p on bp.plan_id = p.plan_id order by u.first_name";
$result = $conn->query($sql);
$myArr = $result->fetch_all(MYSQLI_ASSOC);

//echo($result->num_rows);




echo("<div class='container'><div class='row'>");

echo("<h1> Action Records </h1>");
echo(" </p>");


function generateLetter($first_name,$email,$cost){
  $template = "Dear " . $first_name . ", <p><p>
  We are pleased to confirm the details of your new contract, it will
  cost &pound" . $cost . " per year. <p>We would also like to confirm that we have the correct contact details for you and that your email address is " . $email . "? <p>
  Kind Regards,<p>
  John.";
  return $template;
}

echo "<table class='table table-responsive table-striped table-hover'>
  <tr>
    <th> first_name </th> 
    <th> second_name </th> 
    <th> gender </th> 
    <th> Actions </th>
  </tr>
  ";


foreach($myArr as $item) {
    // output data of each row
       
                  
      //$user_id = $row['user_id'];
      //$record[] = $row;
      $user->add_record($item);
      $plan->add_plans($item);

      //create letter from array values.
      $json_row = json_encode($user);

       //create letter from array values.
      $letter=generateLetter($user->display_name(),$user->display_email(),$user->display_cost());
      //generate the plan details for the modal.
      
      $planDetails="You are currently on " . $plan->display_plan()[0] . ".<br> This is charged at £" . floatval($plan->display_plan()[1]) . " per year.";

      
      echo ("<tr id = 'user_id" . $user->user_id . "' class='clickable-row'>
          <td>" . $user->first_name . "</td> 
          <td>" . $user->second_name . "</td> 
          <td>" . $user->gender . "</td> 
          <td>
            <button id='' data-toggle='tooltip' title='Click to generate letter' data-user_record=' " . $letter. " ' data-content_type='Letter' type='button' class='btn-letter btn-xs btn btn-primary'>
              <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span>
            </button>
            <button data-toggle='tooltip' title='Click for plan details' data-user_record='" . $planDetails . "'data-content_type='Plan' type='button' class='btn-letter btn-xs btn btn-info'>
              <span class='glyphicon  glyphicon-list-alt' aria-hidden='true'></span>
            </button>
          </td> 

        </tr> ");
    
};  
 

$conn->close();
?>


<script>
jQuery(document).ready(function($) {
    $(".btn-letter").click(function() {
        //letter = "Hello Friends!";

        content = $(this).data("user_record");
        title = $(this).data("content_type");
        document.getElementById("modal-content").innerHTML = content;
        document.getElementById("modal-title").innerHTML = title;
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
        <h4 id="modal-title" class="modal-title">Generated Letter</h4>
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



