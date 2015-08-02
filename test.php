<?php

//if I remember the example correctly, the array stored the name as:

$users = array(
	"name" => array(
		"first_name" => "Bob",
		"second_name" => "Dole"
		),
	"cost" => 123,
	"email" => "bob@dole.com"
	);

$template = "Dear " . $users['name']['first_name'] . ", <p>
we are please to confirm the details of your new contract, it will
cost &pound" . $users['cost'] . " per year. <br> We would like to confirm that your email address is " . $users['email'] . "? <p>
Kind Regards,<p>
John.";


echo $template;

?>