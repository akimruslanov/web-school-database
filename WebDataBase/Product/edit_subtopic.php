<?php
include 'functions.php';
$connect = connection();
$subtopic_ID = mysqli_real_escape_string($connect,$_POST['subtopic_ID']);
$subtopic_name = mysqli_real_escape_string($connect,$_POST['subtopic']);
$topic = (int)mysqli_real_escape_string($connect, $_POST['topic']);
$unit = (int)intval($_POST['unit']);
$start_date = mysqli_real_escape_string($connect, $_POST['start_date']);
$end_date = mysqli_real_escape_string($connect, $_POST['end_date']);
$sql = "UPDATE `sub_topic` SET `subtopic_name`='$subtopic_name',`topic_ID`='$topic',`start_date`='$start_date',`end_date`='$end_date',`unit_ID`='$unit' WHERE `ID_sub`='$subtopic_ID'";
if(mysqli_query($connect, $sql)){
  header("Location: view_subtopics.php");
} else{
  header("Location: error.php");
}
con_close($connect);



?>
