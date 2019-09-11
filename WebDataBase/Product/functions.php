<?php
function connection(){
  $ser = "localhost";
  $user = "root";
  $pass = "";
  $db = "grading_sys";
  $connect = new mysqli($ser,$user,$pass,$db);
  if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
  return $connect;}}
function con_close($connection){
    $connection->close();}
function null_check($connect,$x){
  if ($x==NULL){
    $x = Null;
  }
  else{
    $x = mysqli_real_escape_string($connect,$x);
  }
  return $x;
}
  ?>
