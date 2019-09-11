<?php
  include 'functions.php';
  $connect=connection();
  $unit = mysqli_real_escape_string($connect,$_POST["unit"]);
  $description = mysqli_real_escape_string($connect,$_POST["description"]);
  $start_date = mysqli_real_escape_string($connect,$_POST["start_date"]);
  $end_date = mysqli_real_escape_string($connect,$_POST["end_date"]);
  $sql = "INSERT INTO `unit_info` (`ID_unit`, `unit_name`, `description`, `start_date`, `end_date`) VALUES (NULL,'$unit','$description','$start_date','$end_date');";
  if(mysqli_query($connect, $sql)){
    header("Location: view_units.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
  con_close($connect); ?>
