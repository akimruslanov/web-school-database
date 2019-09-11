<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>add topic</title>
		<meta name="author" content="UserPc" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="grids.css" media="screen"/>
  </head>
	<body>
		<?php require('nav_bar.php') ?>
		<div class="container">
		<form action = "add_topic_mysql.php" method="post">
			<div class="row">
				<div class="col-sm-9">
					<h1>Please input the following information to proceed</h1>
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
					<label for="topic">Topic Name</label>
				</div>
				<div class="col-sm-2">
					<input type = "text" name = "topic">
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
