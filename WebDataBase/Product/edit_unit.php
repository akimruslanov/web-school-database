<?php
include 'functions.php';
$connect = connection();
$unit_ID=mysqli_real_escape_string($connect,$_POST['unit_ID']);
$unit_name = mysqli_real_escape_string($connect,$_POST['unit_name']);
$description = mysqli_real_escape_string($connect,$_POST['description']);
$start_date = mysqli_real_escape_string($connect,$_POST['start_date']);
$end_date = mysqli_real_escape_string($connect,$_POST['end_date']);
$sql = "UPDATE `unit_info` SET `unit_name`='$unit_name', `description`='$description',`start_date`='$start_date',`end_date`='$end_date' WHERE `ID_unit`='$unit_ID'";
if(mysqli_query($connect, $sql)){
  header("Location: view_units.php");
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
con_close($connect);
?>
