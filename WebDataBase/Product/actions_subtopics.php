<?php
include 'functions.php';
$connect = connection();
$subtopic_ID = $_POST['subtopic_ID'];
$action = $_POST['action_type'];
if ($action=="edit") {
  $sql_getinfo = "SELECT `ID_sub`,`subtopic_name`,`topic_ID`,`start_date`,`end_date`,`unit_ID` FROM `sub_topic` WHERE `ID_sub`='$subtopic_ID'";
  $result=$connect->query($sql_getinfo);
  $row_default = mysqli_fetch_assoc($result);?>
  <html lang="en">
    <head>
      <title>Edit subtopic information</title>
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
      <form action = "edit_subtopic.php" method="post">
        <input type="hidden" name="subtopic_ID" value="<?php echo $row_default['ID_sub'];?>"/>
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
            <input type = "text" name = "subtopic" value="<?php echo $row_default['subtopic_name'];?>">
          </div>
        </div>
        <div class="row row-space">
          <div class="col-sm-2">
            <label for="topic">Topic</label>
          </div>
          <div class="col-sm-2">
            <select name="topic">
            <?php
            $sql_topic_select = "SELECT `ID_topic`, `topic_name` FROM `topic_info`;";
            $result_topic = $connect->query($sql_topic_select);
            while ($row = mysqli_fetch_assoc($result_topic)){
              if ($row['ID_topic']==$row_default['topic_ID']){?>
                <option value="<?php echo $row['ID_topic'];?>" selected="selected"><?php echo $row['topic_name']; ?></option>
              <?php }else {?>
              <option value ="<?php echo $row['ID_topic'];?>"><?php echo $row['topic_name']; ?></option>
            <?php }}?>
            </select>
          </div>
        </div>
        <div class="row row-space">
          <div class="col-sm-2">
            <label for="unit">Unit</label>
          </div>
          <div class="col-sm-2">
            <select name="unit" value="<?php echo $row_default['unit_ID'];?>">
            <?php
              $sql_unit_select = "SELECT `ID_unit`, `unit_name` FROM `unit_info`;";
              $result_unit = $connect->query($sql_unit_select);
              while ($row = mysqli_fetch_assoc($result_unit)){
                if ($row['ID_unit']==$row_default['unit_ID']){?>
                  <option value="<?php echo $row['ID_unit'];?>" selected="selected"><?php echo $row['unit_name'];?></option>
                <?php }else{?>
                <option value="<?php echo $row['ID_unit'];?>"><?php echo $row['unit_name']; ?></option>
              <?php }}?>
            </select>
          </div>
        </div>
        <div class="row row-space">
          <div class="col-sm-2">
            <label for="start_date">Start Date</label>
          </div>
          <div class="col-sm-2">
            <input type = "text" name = "start_date" class = "datepicker" value="<?php echo $row_default['start_date'];?>">
          </div>
        </div>
        <div class="row row-space">
          <div class="col-sm-2">
            <label for="end_date">End Date</label>
          </div>
          <div class="col-sm-2">
            <input type="text" class = "datepicker" name = "end_date" value="<?php echo $row_default['end_date'];?>">
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
<?php }elseif ($action="delete"){
  $sql_delete = "DELETE FROM `sub_topic` WHERE `ID_sub`='$subtopic_ID'";
  if (mysqli_query($connect,$sql_delete)){
    $sql_delete = "DELETE FROM `sub_student` WHERE `sub_ID`='$subtopic_ID'";
    if (mysqli_query($connect,$sql_delete)){
      header("Location: view_subtopics.php");}
  }else {
    echo "ERROR";
  }
} ?>
