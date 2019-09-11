<?php
    include 'functions.php';
    $username = $_POST["user"];
    $password = $_POST["password"];
    $connect = connection();
    $username = mysqli_real_escape_string($connect,$username);
    $password = mysqli_real_escape_string($connect,$password);
    $sql = "SELECT `username`, `password` FROM `users` WHERE `username`= '$username' and
    `password`='$password'";
    $result = $connect->query($sql);
    if (($result->num_rows)==0){
	     header('Location:fail_login.html');
      }else{
		      header('Location:try.php');
	}
  con_close($connect);
?>
