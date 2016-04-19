<?php

//index.html is the navbar
// connection.php is MySQL connector and user authentication.
include_once"index.html";
include_once"connection.php";
include_once"class/class.Record.inc";

$user_record = new User_Record();

$sql = "SELECT user_id, first_name, second_name, email_address, join_date, gender FROM users";
$result = $conn->query($sql);

echo($result->num_rows);
$myArr = $result->fetch_all(MYSQLI_ASSOC);
var_dump($myArr[0]);
var_dump($myArr[0]['first_name']);
echo($myArr[0]['first_name']);
$user_record->add_record($myArr);

echo($user_record->display_name());
