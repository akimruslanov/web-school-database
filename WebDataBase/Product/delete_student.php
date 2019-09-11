<?php
include 'functions.php';
$ID = $_POST["name_ID"];
$connect=connection();
$sql = "DELETE FROM `students_info` WHERE `students_info`.`ID_students` = '$ID'";
if (mysqli_query($connect,$sql)){
  $sql = "DELETE FROM `sub_student` WHERE `student_ID`='$ID'";
  if (mysqli_query($connect,$sql)){
  header("Location: try.php");
}}else {
  echo "ERROR";
}

?>
