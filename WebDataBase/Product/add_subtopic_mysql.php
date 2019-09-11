<?php
include 'functions.php';
$connect = connection();
$subtopic = mysqli_real_escape_string($connect,$_POST['subtopic']);
$topic = (int)mysqli_real_escape_string($connect, $_POST['topic']);
$unit = (int)intval($_POST['unit']);
echo $unit;
$start_date = mysqli_real_escape_string($connect, $_POST['start_date']);
$end_date = mysqli_real_escape_string($connect, $_POST['end_date']);
$sql = "INSERT INTO `sub_topic` (`ID_sub`,`subtopic_name`,`topic_ID`,`start_date`,`end_date`,`unit_ID`) VALUES (NULL, '$subtopic',$topic,'$start_date','$end_date',$unit);";
if(mysqli_query($connect, $sql)){
  header("Location: view_subtopics.php");
} else{
  echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
}

con_close($connect);
?>
