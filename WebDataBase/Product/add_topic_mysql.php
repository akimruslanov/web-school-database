<?php
  include 'functions.php';
  $connect=connection();
  $topic = mysqli_real_escape_string($connect,$_POST["topic"]);
  $sql = "INSERT INTO `topic_info` (`ID_topic`,`topic_name`) VALUES (NULL,'$topic');";
  if(mysqli_query($connect, $sql)){
    header("Location: view_topics.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
con_close($connect);?>
