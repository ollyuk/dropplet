<?php
	include_once"index.html";
	require_once"connection.php";
?>	
<body>
	<div class='container'>
		<div class='row'>
			<h1>Create Records</h1>
			<div class = "form-group">
				<form role="form" action="addsql.php" method="post">

					<label for="first_name">First Name:</label> <input class="form-control" type="text" name="first_name" placeholder="Bob" autofocus required="required"><br>
					<label for="second_name">Second Name: </label> <input class="form-control" type="text" name="second_name" placeholder="Dole" required="required"><br>
					<label for="email_address">E-mail: </label> <input type="email" class="form-control" name="email_address" placeholder="bob@dole.com" required="required"><br>
					<label for="join_date">Join Date: </label> <input class="form-control" type="date" name="join_date" value="<?php echo date('Y-m-d'); ?>" required="required"><br> <!--would be nice to add JS todays date as default value-->
			
					<div class="radio">
						<label class="radio-inline"> <input  type="radio" name="gender" value="female"> Female </label>
						<label class="radio-inline"> <input  type="radio" name="gender" value="male" checked="checked"> Male </label>
					</div>
					<input class="form-control btn-success" type="submit">
				</form>
			</div>
		</div>
	</div>		
</body>
</html>