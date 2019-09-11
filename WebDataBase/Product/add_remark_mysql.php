<?php
include 'functions.php';
$connect=connection();
$student_id=mysqli_real_escape_string($connect,$_POST["student_id"]);
$unit_id = mysqli_real_escape_string($connect,$_POST["unit"]);
$topic_id = mysqli_real_escape_string($connect,$_POST["topic"]);
$subtopic_name = mysqli_real_escape_string($connect,$_POST["subtopic"]);
$sql_subtopic = "SELECT `ID_sub` FROM `sub_topic` WHERE `subtopic_name` LIKE '$subtopic_name' ";
$result=mysqli_fetch_assoc($connect->query($sql_subtopic));
$subtopic_id = $result['ID_sub'];
$note = mysqli_real_escape_string($connect,$_POST["note"]);
$skill = mysqli_real_escape_string($connect,$_POST["skill"]);
$grade_id = mysqli_real_escape_string($connect,$_POST["grade"]);
$date_added = mysqli_real_escape_string($connect,date("Y/m/d"));
$sql = "INSERT INTO `sub_student` (`ID_sw`, `student_ID`, `sub_ID`, `grade_ID`, `skill`, `note`, `date_added`) VALUES (NULL, '$student_id', '$subtopic_id', '$grade_id', '$skill', '$skill', '$date_added');";
if(mysqli_query($connect, $sql)){
  header("Location: view_all_remarks.php");
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
con_close($connect);


 ?>
