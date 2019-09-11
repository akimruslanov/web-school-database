<?php
	include 'functions.php';
	$connect = connection();
	$sql = "SELECT `ID_students`, `Name`, `surname` FROM `students_info` WHERE `Name`= 'Akim'";
	$result= $connect->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ID_students"]. " - Name: " . $row["Name"]. " " . $row["surname"]. "<br>";
    }
} else {
    echo "0 results";

}
con_close($connect)
?>
