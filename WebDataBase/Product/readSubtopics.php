<?php
include 'functions.php';
$connect=connection();
$topic_ID = mysqli_real_escape_string($connect,$_POST['topic_ID']);
$unit_ID = mysqli_real_escape_string($connect,$_POST["unit_ID"]);
if(isset($_POST["keyword"])) {
  $sql ="SELECT `ID_sub`, `subtopic_name` FROM `sub_topic` WHERE `subtopic_name` like '%" . $_POST["keyword"]. "%' AND `topic_ID`='$topic_ID' AND `unit_ID`='$unit_ID'  ORDER BY `subtopic_name`";
  $result = $connect->query($sql);
if(!empty($result)) {
?>
<ul id="subtopic-list">
<?php
foreach($result as $subtopic) {
?>
<option value="<?php echo $subtopic["ID_sub"];?>" onClick="selectSubtopic('<?php echo $subtopic["subtopic_name"]; ?>');"><?php echo $subtopic["subtopic_name"]; ?></option>
<?php } ?>
</ul>
<?php } } ?>
