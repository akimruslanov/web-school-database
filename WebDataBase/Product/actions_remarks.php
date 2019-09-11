<?php
include 'functions.php';
$connect = connection();
$action=$_POST['action_type'];
$remark_ID = mysqli_real_escape_string($connect,$_POST['remark_ID']);
if ($action=="edit"){
  $sql_getinfo = "SELECT `sub_student`.`grade_ID`, `students_info`.`ID_students`,`students_info`.`name`,`students_info`.`surname`,`sub_student`.`sub_ID`,`sub_topic`.`topic_ID`,`sub_topic`.`subtopic_name`,`sub_topic`.`unit_ID`,`sub_student`.`note`,`sub_student`.`skill` FROM `sub_topic`,`students_info`,`sub_student` WHERE `sub_student`.`ID_sw`='$remark_ID' AND `sub_student`.`student_ID`=`students_info`.`ID_students` AND `sub_student`.`sub_ID`=`sub_topic`.`ID_sub`";
  $result=$connect->query($sql_getinfo);
  $row_default = mysqli_fetch_assoc($result);?>
  <html lang="en">
  	<head>
  		<link rel="stylesheet" type="text/css" href="color_box.css" media="screen" />
  		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  		<title>add remark</title>
  		<meta name="author" content="UserPc" / />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="grids.css" media="screen"/>
  		<style>span {
  	    padding: 1px;
  	    border: 1px solid black;
  	    display: inline-block;
  		}</style>
  		<script>
  	  $(document).ready(function(){
  	  	$("#search-box").keyup(function(){
  				$.ajax({
  	  		type: "POST",
  	  		url: "readSubtopics.php",
  	  		data:'keyword='+$(this).val(),
  	  		beforeSend: function(){
  	  			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
  	  		},
  	  		success: function(data){
  	  			$("#suggestion-box").show();
  	  			$("#suggestion-box").html(data);
  	  			$("#search-box").css("background","#FFF");
  	  		}
  			});
  	  	});
  	  });
  	  //To select country name
  	  function selectSubtopic(val) {
  	  $("#search-box").val(val);
  	  $("#suggestion-box").hide();
  	  }
  	  </script>
  	</head>
  	<body>
  	<?php require('nav_bar.php'); ?>
  		<div class="container">
  		<form autocomplete="off" action = "edit_remark.php" method="post">
  			<div class="row">
  				<div class="col-sm-9">
  					<h1>Please input the following information to proceed</h1>
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  					<label for="name">Student Name</label>
  				</div>
  				<div class="col-sm-2">
            <select name="student_id">
              <?php $sql = "SELECT `ID_students`,`name`,`surname` FROM `students_info`";
              $result=$connect->query($sql);
              while ($row=mysqli_fetch_assoc($result)){
                if ($row['ID_students']==$row_default['ID_students']){?>
                  <option value="<?php echo $row_default['ID_students'];?>" selected="selected"><?php echo $row_default['name']; echo ' '; echo $row_default['surname']; ?></option>
                <?php }else{ ?>
                  <option value="<?php echo $row['ID_students'];?>"><?php echo $row['name'].' '.$row['surname'];?></option>
              <?php }}?>
            </select>
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  	    		<label for="unit">Unit</label>
  				</div>
  				<div class="col-sm-2">
  					<select name="unit">
  					<?php $sql_unit = "SELECT `ID_unit`, `unit_name` FROM `unit_info`;";
  					$result_unit = $connect->query($sql_unit);
  					while ($row = mysqli_fetch_assoc($result_unit)){
              if ($row['ID_unit']==$row_default['unit_ID']){?>
                  <option value="<?php echo $row_default['unit_ID']?>" selected="selected"><?php echo $row['unit_name']?></option>
              <?php }else{?>
  						<option value="<?php echo $row['ID_unit'];?>"><?php echo $row['unit_name']; ?></option>
  					<?php }}?></select>
            <input type="hidden" id="unit_ID" value="<?php echo $row_default['unit_ID'];?>" />
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  					<label for="topic">Topic</label>
  				</div>
  				<div class="col-sm-2">
  					<select name="topic">
  					<?php $sql_topic = "SELECT * FROM `topic_info`";
  					$result_topic = $connect->query($sql_topic);
  					while ($row=mysqli_fetch_assoc($result_topic)){
              if ($row['ID_topic']==$row_default['topic_ID']){?>
                <option value = "<?php echo $row['ID_topic'];?>" selected="selected"><?php echo $row['topic_name']; ?></option><?php }else{ ?>
  					<option value = "<?php echo $row['ID_topic'];?>"><?php echo $row['topic_name']; ?></option>
          <?php }}?></select>
          <input type="hidden" id="topic_ID" value="<?php echo $row_default['topic_ID'];?>" />
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  					<label for="subtopic">Subtopic</label>
  				</div>
  				<div class="col-sm-2">
  					<input type="text" name = "subtopic" id="search-box" value="<?php echo $row_default['subtopic_name'];?>">
  					<div id="suggestion-box"></div>
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  					<label for="note">Note</label>
  				</div>
  				<div class="col-sm-2">
  					<input type = "text" name = "note" value="<?php echo $row_default['note']?>">
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  					<label for="skill">Skill</label>
  				</div>
  				<div class="col-sm-2">
  					<input type = "text" name = "skill" value="<?php echo $row_default['skill']?>">
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  					<label for="grade">Grade</label>
  				</div>
  				<div class="col-sm-2">
  					<select name="grade">
              <?php $sql = "SELECT `ID_grade`,`grade_value` FROM `grades_info`";
              $result = $connect->query($sql);
              while ($row=mysqli_fetch_assoc($result)) {
                if($row['ID_grade']==$row_default['grade_ID']){?>
                  <option value="<?php echo $row['ID_grade']?>" selected="selected"><?php echo $row['grade_value'];?></option>
                <?php }else{?>
                  <option value="<?php echo $row['ID_grade']?>"><?php echo $row['grade_value'];?></option>
              <?php }}?>
  					</select>
  				</div>
  			</div>
  			<div class"row row-space">
  				<div class="col-sm-2">
  				</div>
  			</div>
  			<div class="row row-space">
  				<div class="col-sm-2">
  					<input class="enter" type="submit" name = "enter" value = "Enter" />
  				</div>
  			</div>
  		</form>
  		</div>
  	</body>
  </html>
<?php }else{
  $sql_delete="DELETE FROM `sub_student` WHERE `ID_sw`='$remark_ID'";
  if (mysqli_query($connect,$sql_delete)){
    header("Location: view_all_remarks.php");
  }else {
    echo "ERROR";
  }
} ?>
