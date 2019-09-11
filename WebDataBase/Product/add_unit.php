<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>add unit</title>
		<meta name="author" content="UserPc" />
    <script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">
  	<script>
	  	$(document).ready(function() {
	    $(".datepicker").datepicker({
	        format: 'yyyy-mm-dd'
	    	});
			});
  	</script>
		<link rel="stylesheet" type="text/css" href="grids.css" media="screen" />
  </head>
	<body>
		<?php require('nav_bar.php') ?>
		<div class="container">
		<form action = "add_unit_mysql.php" method="post">
			<div class="row">
				<div class="col-sm-9">
					<h1>Please input the following information to proceed</h1>
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
					<label for="unit">Main theme</label>
				</div>
				<div class="col-sm-2">
					<input type = "text" name = "unit">
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
					<label for="description">Central Idea</label>
				</div>
				<div class="col-sm-2">
					<input type = "text" name = "description">
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
	    		<label for="start_date">Start Date</label>
				</div>
				<div class="col-sm-2">
					<input type = "text" class="datepicker" name = "start_date">
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
	    		<label for="end_date">End Date</label>
				</div>
				<div class="col-sm-2">
					<input type = "text" class ="datepicker" name = "end_date">
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
					<input class="enter" type="submit" name = "enter" value = "Enter" />
				</div>
			</div>
		</form>
		</div>
	</body>
</html>
