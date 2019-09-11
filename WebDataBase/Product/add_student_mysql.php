<?php
  include 'functions.php';
  $connect=connection();
  $name = $_POST["name"];
  $name = mysqli_real_escape_string($connect,$name);
  $surname=$_POST["surname"];
  $surname = mysqli_real_escape_string($connect,$surname);
  $second_name=$_POST["second_name"];
  $second_name= mysqli_real_escape_string($connect,$second_name);
  $birth = $_POST["birth"];
  $birth = mysqli_real_escape_string($connect,$birth);
  $pic = addslashes(file_get_contents($_FILES['pic']['tmp_name']));
  $pic = mysqli_real_escape_string($connect,$pic);
  $sql = "INSERT INTO `students_info` (`ID_students`, `Name`, `surname`, `second_Name`, `date_of_birth`, `pic`) VALUES (NULL, '$name', '$surname', '$second_name', '$birth', '$pic');";
  if(mysqli_query($connect, $sql)){
    header("Location: try.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
  con_close($connect);
  ?>
