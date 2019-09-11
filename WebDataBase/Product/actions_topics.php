<?php
include 'functions.php';
$connect=connection();
$action=$_POST['action_type'];
$topic_ID = mysqli_real_escape_string($connect,$_POST['topic_ID']);
if ($action=="edit"){
  $sql = "SELECT * FROM `topic_info`";
  $result=$connect->query($sql);
  $row_default = mysqli_fetch_assoc($result);?>
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
  		<form action = "edit_topic.php" method="post">
        <input type="hidden" value="<?php echo $row_default['ID_topic']?>" name="topic_ID"/>
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
  					<input type = "text" name = "topic" value="<?php echo $row_default['topic_name']?>">
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

<?php }else{
  $sql_delete = "DELETE FROM `topic_info` WHERE `ID_topic`='$topic_ID'";
  if (mysqli_query($connect,$sql_delete)){
    $sql  = "SELECT `ID_sub` FROM `sub_topic` WHERE `topic_ID`='$topic_ID'";
    $result = $connect->query($sql);
    while ($row=mysqli_fetch_assoc($result)){
      $sql = "DELETE FROM `sub_student` WHERE `sub_ID`='row['ID_sub']'";
      $connect->query($sql);
    }
    $sql = "DELETE FROM `sub_topic` WHERE `topic_ID`='$topic_ID'";
    if (mysqli_query($connect,$sql)){
      header("Location: view_topics.php");
    }
    else {
      echo "Error";
    }
  }
}?>
