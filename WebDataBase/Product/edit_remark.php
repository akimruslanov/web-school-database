<?php
include 'functions.php';
$connect=connection();
$student_id=mysqli_real_escape_string($connect,$_POST["student_id"]);
$subtopic_name = mysqli_real_escape_string($connect,$_POST["subtopic"]);
$sql_subtopic = "SELECT `ID_sub` FROM `sub_topic` WHERE `subtopic_name` LIKE '$subtopic_name' ";
$result=mysqli_fetch_assoc($connect->query($sql_subtopic));
$subtopic_id = $result['ID_sub'];
$note = mysqli_real_escape_string($connect,$_POST["note"]);
$skill = mysqli_real_escape_string($connect,$_POST["skill"]);
$grade_id = mysqli_real_escape_string($connect,$_POST["grade"]);
$date_added = mysqli_real_escape_string($connect,date("Y/m/d"));
$sql = "UPDATE `sub_student` SET `student_ID`='$student_id',`sub_ID`='$subtopic_id',`grade_ID`='$grade_id',`skill`='$skill',`note`='$note',`date_added`='$date_added'";
if(mysqli_query($connect, $sql)){
  header('Location:view_all_remarks.php');
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
con_close($connect);
