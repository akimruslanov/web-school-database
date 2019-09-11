<?php
include 'functions.php';
$student_ID=$_POST["name_ID"];
$connect = connection();
$sql_getinfo = "SELECT `name`,`surname`, `second_Name`,`date_of_birth`,`pic` FROM `students_info` WHERE `ID_students`='$student_ID'";
$result = $connect->query($sql_getinfo);
$row=mysqli_fetch_assoc($result);?>
<html lang="en">
  <head>
    <title>Edit student information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <form action="edit_student_mysql.php" method="post">
      <input type="hidden" name="student_ID" value="<?php echo $student_ID;?>">
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
            <input type = "text" name = "name" value="<?php echo $row['name'];?>">
          </div>
        </div>
        <div class="row row-space">
          <div class="col-sm-2">
            <label for="surname">Surname</label>
          </div>
          <div class="col-sm-2">
            <input type = "text" name = "surname" value="<?php echo $row['surname'];?>">
          </div>
        </div>
        <div class="row row-space">
          <div class="col-sm-2">
            <label for="second_name">Second Name</label>
          </div>
          <div class="col-sm-2">
            <input type = "text" name = "second_name" value="<?php echo $row['second_Name'];?>">
          </div>
        </div>
        <div class="row row-space">
          <div class="col-sm-2">
            <label for="birth">Date of birth</label>
          </div>
          <div class="col-sm-2">
            <input type = "text" class="datepicker" name = "birth" value="<?php echo $row['date_of_birth'];?>">
          </div>
        </div>
        <div class="row row-space">
          <div class="col-sm-2">
            <label for="pic">Picture</label>
          </div>
          <div class="col-sm-2">
            <input type="file" name = "pic" value="<?php echo $row['pic'];?>">
          </div>
        </div>
        <div class="row row-space">
          <div class="col sm-3">
          <input class="enter" type="submit" name = "enter" value = "Enter" />
        </div>
      </div>
      </div>
    </form>
</body>
</html>
