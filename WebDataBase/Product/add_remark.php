<?php
include 'functions.php';
$name_ID = $_POST["name_ID"];
$connect = connection();
$sql = "SELECT `name`,`surname` FROM `students_info` WHERE `ID_students` = '$name_ID'";
$result_name = $connect->query($sql);
$row = mysqli_fetch_assoc($result_name);
?>
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
		function get_unit_ID(a){
			$('#unit_ID').val(a);
		}
		function get_topic_ID(a){
			$('#topic_ID').val(a);
		}
	  $(document).ready(function(){
	  	$("#search-box").keyup(function (){
				$.ajax({
	  		type: "POST",
	  		url: "readSubtopics.php",
	  		data:{keyword: $(this).val(),topic_ID: $('#topic_ID').val(), unit_ID: $('#unit_ID').val(),},
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
		<form autocomplete="off" action = "add_remark_mysql.php" method="post">
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
					<input type="hidden" name="student_id" value="<?php echo $name_ID?>">
					<span><?php echo $row['name']; echo ' '; echo $row['surname']; ?></span>
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
	    		<label for="unit">Unit</label>
				</div>
				<div class="col-sm-2">
					<select name="unit" onchange="get_unit_ID(this.value)">
					<?php $sql_unit = "SELECT `ID_unit`, `unit_name` FROM `unit_info`;";
					$result_unit = $connect->query($sql_unit);
					$counter=0;
					while ($row = mysqli_fetch_assoc($result_unit)){
						if ($counter==0) {
							$default_unitID = $row['ID_unit'];
						}
						?>
						<option value="<?php echo $row['ID_unit'];?>"><?php echo $row['unit_name']; ?></option>
					<?php $counter+=1;}?></select>
				<input type="hidden" id="unit_ID" value="0"/>
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
					<label for="topic">Topic</label>
				</div>
				<div class="col-sm-2">
					<select name="topic" onchange="get_topic_ID(this.value)">
					<?php $sql_topic = "SELECT * FROM `topic_info`";
					$result_topic = $connect->query($sql_topic);
					$counter=0;
					while ($row=mysqli_fetch_assoc($result_topic)){
						if ($counter==0){
							$default_topicID = $row['ID_topic'];
						}?>
					<option value = "<?php echo $row['ID_topic'];?>"><?php echo $row['topic_name']; ?></option>
					<?php $counter+=1;}?></select>
					<input type="hidden" id="topic_ID" value="<?php echo $default_topicID;?>" />
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
					<label for="subtopic">Subtopic</label>
				</div>
				<div class="col-sm-2">
					<input type="text" name = "subtopic" id="search-box">
					<div id="suggestion-box"></div>
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
					<label for="note">Note</label>
				</div>
				<div class="col-sm-2">
					<input type = "text" name = "note">
				</div>
			</div>
			<div class="row row-space">
				<div class="col-sm-2">
					<label for="skill">Skill</label>
				</div>
				<div class="col-sm-2">
					<input type = "text" name = "skill">
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
						while ($row=mysqli_fetch_assoc($result)) {?>
								<option value="<?php echo $row['ID_grade']?>"><?php echo $row['grade_value'];?></option>
						<?php }?>
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
