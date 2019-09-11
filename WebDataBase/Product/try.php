<?php
include 'functions.php';
$conn = connection();
$sql = "SELECT `ID_students`,`Name`,`surname`,`pic` FROM `students_info` ORDER BY `name` asc";
$result = $conn->query($sql);
  ?>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="grids.css" media="screen"/>
  </head>
  <body>
    <?php
    require('nav_bar.php'); ?>
      <div class="container">
      <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)){?>
          <div class="col-lg-4 col-sm-12">
            <div class="row"> <!-- beginning of upper part -->
              <div class="col-sm-9">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).'"/>';?>
              </div>
              <div class="col-sm-3">
                <?php
                $id = $row['ID_students']; ?>
                <div class="row">
                  <div class="col-sm-1">
                    <form action="add_remark.php" method="post">
                      <button name="name_ID" type="submit" value="<?php echo $id;?>" class="glyphicon glyphicon-plus"></button>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-1">
                    <form action="delete_student.php" method="post" onsubmit="return confirm('Do you really wish to delete student information?');">
                      <button name="name_ID" type="submit" value="<?php echo $id;?>" class="glyphicon glyphicon-ban-circle"></button>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-1">
                    <form action="edit_student.php" method="post">
                      <button name="name_ID" type="submit" value="<?php echo $id;?>" class="glyphicon glyphicon-pencil">
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-1">
                    <form action="view_by_student.php" method="post">
                      <button name="name_ID" type="submit" value="<?php echo $id;?>" class="glyphicon glyphicon-search"></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row"> <!-- beginning of bottom part -->
              <?php
                echo $row['Name'];
                echo ' ';
                echo $row['surname'];
              ?>
            </div>
            <div class="row">
              Best area ____ with grade _
            </div>
            <div class="row">
              Needs help in ____ with grade _
            </div>
            </div>
            <?php }?>
      </div>
      </div>
<?php con_close($conn);?>
  </body>
</html>
