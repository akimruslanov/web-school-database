<?php
  include 'functions.php';
  $connect=connection();
  $topic = mysqli_real_escape_string($connect,$_POST["topic"]);
  $topic_ID = mysqli_real_escape_string($connect,$_POST["topic_ID"]);
  $sql = "UPDATE `topic_info` SET `topic_name`='$topic' WHERE `ID_topic`='$topic_ID';";
  if(mysqli_query($connect, $sql)){
    header("Location: view_topics.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
con_close($connect);?>
