<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>add subtopic</title>
		<meta name="author" content="UserPc" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">
		<link rel="stylesheet" type="text/css" href="grids.css" media="screen"/>
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
		<div class="container">
		<form action = "add_subtopic_mysql.php" method="post">
			<div class="row">
				<div class="col-sm-9">
					<h1>Please input the following information to proceed</h1>
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
					<label for="subtopic">Subtopic Name</label>
				</div>
				<div class="col-sm-2">
					<input type = "text" name = "subtopic">
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
					<label for="topic">Topic</label>
				</div>
				<div class="col-sm-2">
			  	<select name="topic">
					<?php
					include 'functions.php';
					$connect = connection();
					$sql = "SELECT `ID_topic`, `topic_name` FROM `topic_info`;";
					$result = $connect->query($sql);
					while ($row = mysqli_fetch_assoc($result)){
						?>
						<option value ="<?php echo $row['ID_topic'];?>"><?php echo $row['topic_name']; ?></option>
					<?php }?>
					</select>
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
	    		<label for="unit">Unit</label>
				</div>
				<div class="col-sm-2">
					<select name="unit">
					<?php
						$sql1 = "SELECT `ID_unit`, `unit_name` FROM `unit_info`;";
						$result1 = $connect->query($sql1);
						while ($row = mysqli_fetch_assoc($result1)){
							?>
							<option value="<?php echo $row['ID_unit'];?>"><?php echo $row['unit_name']; ?></option>
						<?php }
						con_close($connect)?>
					</select>
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
	    		<label for="start_date">Start Date</label>
				</div>
				<div class="col-sm-2">
					<input type = "text" name = "start_date" class = "datepicker">
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
					<label for="end_date">End Date</label>
				</div>
				<div class="col-sm-2">
					<input type="text" class = "datepicker"name = "end_date">
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
