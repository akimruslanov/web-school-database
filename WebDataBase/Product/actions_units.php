<?php
include 'functions.php';
$connect = connection();
$unit_ID = $_POST['unit_ID'];
$action = $_POST['action_type'];
if ($action=="edit") {
  $sql_getinfo = "SELECT `ID_unit`,`unit_name`,`description`,`start_date`,`end_date` FROM `unit_info` WHERE `ID_unit`='$unit_ID'";
  $result=$connect->query($sql_getinfo);
  $row_default = mysqli_fetch_assoc($result);?>
  <html lang="en">
    <head>
      <title>Edit units information</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
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
      <?php require('nav_bar.php'); ?>
      <div class="container">
  		<form action = "edit_unit.php" method="post">
        <input type="hidden" name="unit_ID" value="<?php echo $unit_ID?>"/>
  			<div class="row">
  				<div class="col-sm-9">
  					<h1>Please input the following information to proceed</h1>
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  					<label for="unit_name">Unit Name</label>
  				</div>
  				<div class="col-sm-2">
  					<input type = "text" name = "unit_name" value="<?php echo $row_default['unit_name'];?>">
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  					<label for="description">Description</label>
  				</div>
  				<div class="col-sm-2">
  					<input type = "text" name = "description" value="<?php echo $row_default['description'];?>">
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  	    		<label for="start_date">Start Date</label>
  				</div>
  				<div class="col-sm-2">
  					<input type = "text" class="datepicker" name = "start_date" value="<?php echo $row_default['start_date'];?>">
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  	    		<label for="end_date">End Date</label>
  				</div>
  				<div class="col-sm-2">
  					<input type = "text" class ="datepicker" name = "end_date" value="<?php echo $row_default['end_date'];?>">
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
<?php }elseif ($action=="delete") {
  $sql_delete="DELETE FROM `unit_info` WHERE `ID_unit`='$unit_ID'";
  if (mysqli_query($connect,$sql_delete)){
    $sql  = "SELECT `ID_sub` FROM `sub_topic` WHERE `unit_ID`='$unit_ID'";
    $result = $connect->query($sql);
    while ($row=mysqli_fetch_assoc($result)){
      $sql = "DELETE FROM `sub_student` WHERE `sub_ID`='row['ID_sub']'";
      $connect->query($sql);
    }
    $sql = "DELETE FROM `sub_topic` WHERE `unit_ID`='$unit_ID'";
    if (mysqli_query($connect,$sql)){
      header("Location: view_units.php");
    }
    else {
      echo "Error";
    }
  }
}
con_close($connect);?>
