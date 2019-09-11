<?php
include 'functions.php';
$connect = connection();
$student_ID = mysqli_real_escape_string($connect, $_POST["name_ID"]);
$sql_name = "SELECT `name`,`surname` FROM `students_info` WHERE `ID_students`='$student_ID'";
$result_name = mysqli_fetch_assoc($connect->query($sql_name));
$name = $result_name['name']." ".$result_name['surname'];
$sql = "SELECT `grades_info`.`grade_name`,`sub_student`.`ID_sw`,`sub_topic`.`subtopic_name`,`sub_student`.`skill`,`topic_info`.`topic_name`,`unit_info`.`unit_name`,`sub_student`.`date_added` FROM `sub_topic`,`sub_student`,`topic_info`,`unit_info`,`grades_info` WHERE `sub_student`.`student_ID`='$student_ID' AND `sub_topic`.`ID_sub`=`sub_student`.`sub_ID` AND `sub_student`.`grade_ID`=`grades_info`.`ID_grade` AND `sub_topic`.`topic_ID`=`topic_info`.`ID_topic` AND `sub_topic`.`unit_ID`=`unit_info`.`ID_unit` ";
$result = $connect->query($sql);
  ?>
<html lang="en">
  <head>
    <title>View remarks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="grids.css" media="screen"/>
    <style>
      td, th {
        border: 1px solid #dddddd;}
    </style>
  </head>
  <body>
    <?php require('nav_bar.php'); ?>
    <h1><?php echo $name; ?></h1>
    <table>
      <tr style="">
        <th>Subtopic</th>
        <th>Skill learned</th>
        <th>Grade</th>
        <th>Topic</th>
        <th>Unit</th>
        <th>Date added</th>
        <th>Perform</th>
      </tr>
      <?php while ($row=mysqli_fetch_assoc($result)){ ?>
        <tr>
          <th><?php echo $row['subtopic_name']; ?></th>
          <th><?php echo $row['skill']; ?></th>
          <th><?php echo $row['grade_name']?></th>
          <th><?php echo $row['topic_name'];?></th>
          <th><?php echo $row['unit_name'];?></th>
          <th><?php echo $row['date_added'];?></th>
          <th><div class="container" style="width:75px">
            <div class="row">
              <div class="col-sm-1">
                <form action="actions_remarks.php" method="post">
                  <input type="hidden" name="action_type" value="delete"/>
                  <button name="remark_ID" type="submit" value="<?php echo $row['ID_sw'];?>" class="glyphicon glyphicon-ban-circle"></button>
                </form>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-1">
                <form action="actions_remarks.php" method="post">
                  <input type="hidden" name="action_type" value="edit" />
                  <button name="remark_ID" type="submit" value="<?php echo $row['ID_sw']?>" class="glyphicon glyphicon-pencil"></button>
                </form>
              </div>
            </div>
          </div></th>
        </tr>
      <?php }?>
    </table>
  </body>
</html>
