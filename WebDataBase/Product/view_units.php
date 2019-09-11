<?php
include 'functions.php';
$connect = connection();
$sql = "SELECT `ID_unit`,`unit_name`,`description`,`start_date`,`end_date` FROM `unit_info`";
$result = $connect->query($sql);
?>
<html lang="en">
  <head>
    <title>View all units</title>
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
    <?php require('nav_bar.php');?>
    <table>
      <tr>
        <th>Unit</th>
        <th>Description</th>
        <th>Start Date</th>
        <th>End date</th>
        <th>Perform</th>
      </tr>
      <?php while($row=mysqli_fetch_assoc($result)){?>
        <tr>
          <th><?php echo $row['unit_name'];?></th>
          <th><?php echo $row['description'];?></th>
          <th><?php echo $row['start_date'];?></th>
          <th><?php echo $row['end_date'];?></th>
          <th><div class="container" style="width:75px;">
            <div class="row">
              <div class="col-sm-1">
                <form action="actions_units.php" method="post">
                  <input type="hidden" name="action_type" value="delete" />
                  <button name="unit_ID" type="submit" value="<?php echo $row['ID_unit'];?>" class="glyphicon glyphicon-ban-circle"></button>
                </form>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-1">
                <form action="actions_units.php" method="post">
                  <input type="hidden" name="action_type" value="edit" />
                  <button name="unit_ID" type="submit" value="<?php echo $row['ID_unit'];?>" class="glyphicon glyphicon-pencil"></button>
                </form>
              </div>
            </div>
          </div></th>
        </tr>
      <?php }?>
    </table>
  </body>
</html>
