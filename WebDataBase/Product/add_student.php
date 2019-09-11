<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>add student</title>
		<meta name="author" content="UserPc" />
		<script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">
		<link rel="stylesheet" type="text/css" href="grids.css" media="screen" />
  	<script>
	  	$(document).ready(function() {
	    $(".datepicker").datepicker({
	        format: 'yyyy-mm-dd'
	    	});
			});
  	</script>
	</head>
	<body>
	<?php require('nav_bar.php') ?>
	<form action = "add_student_mysql.php" method="post">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Please input the following information to proceed</h1>
			</div>
		</div>
		<div class="row row-space">
			<div class="col-sm-2">
				<label for="name">Student Name</label>
			</div>
			<div class="col-sm-2">
				<input type = "text" name = "name">
			</div>
				</div>
		<div class="row row-space">
			<div class="col-sm-2">
				<label for="surname">Surname</label>
			</div>
			<div class="col-sm-2">
				<input type = "text" name = "surname">
			</div>
		</div>
		<div class="row row-space">
			<div class="col-sm-2">
    		<label for="second_name">Second Name</label>
			</div>
			<div class="col-sm-2">
				<input type = "text" name = "second_name">
			</div>
		</div>
		<div class="row row-space">
			<div class="col-sm-2">
    		<label for="birth">Date of birth</label>
			</div>
			<div class="col-sm-2">
				<input type = "text" class="datepicker" name = "birth">
			</div>
		</div>
		<div class="row row-space">
			<div class="col-sm-2">
				<label for="pic">Picture</label>
			</div>
			<div class="col-sm-2">
				<input type="file" name = "pic">
			</div>
		</div>
		<div class="row row-space">
		<div class="col">
			<input class="enter" type="submit" name = "enter" value = "Enter" />
		</div>
	</div>
</div>
	</form>
	</body>
</html>
