<?php
  include 'functions.php';
  $connect=connection();
  $student_ID = mysqli_real_escape_string($connect,$_POST["student_ID"]);
  $name = $_POST["name"];
  $name = mysqli_real_escape_string($connect,$name);
  $surname=$_POST["surname"];
  $surname = mysqli_real_escape_string($connect,$surname);
  $second_name=$_POST["second_name"];
  $second_name= mysqli_real_escape_string($connect,$second_name);
  $birth = $_POST["birth"];
  $birth = mysqli_real_escape_string($connect,$birth);
  $pic = $_POST["pic"];
  $pic = mysqli_real_escape_string($connect,$pic);
  $sql = "UPDATE `students_info` SET `name`='$name',`surname`='$surname',`second_Name`='$second_name',`date_of_birth`='$birth',`pic`='$pic' WHERE `ID_students`='$student_ID'";
  if(mysqli_query($connect, $sql)){
    header("Location: try.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
  con_close($connect);

?>
