<?php

//index.html is the navbar
// connection.php is MySQL connector and user authentication.
include_once"index.html";
include_once"connection.php";
include_once"class/class.Record.inc";
include_once"class/class.Plan.inc";


$user_record = new User_Record();

$sql = "select u.*, p.name as Plan, p.cost 
from users u 
left join users_plans bp on u.user_id = bp.user_id 
left join plans p on bp.plan_id = p.plan_id order by u.first_name";
$result = $conn->query($sql);

//echo($result->num_rows);
$myArr = $result->fetch_all(MYSQLI_ASSOC);
var_dump($myArr);
//var_dump($myArr[0]['first_name']);
//echo($myArr[0]['first_name']);
$user_record->add_record($myArr[0]);

echo($user_record->display_name());


$plan = New Plan_Record();

$user_record->plan = $plan;
$user_record->plan->add_plans($myArr[0]);
var_dump($plan);
echo($user_record->plan->display_name());