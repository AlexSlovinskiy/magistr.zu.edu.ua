<?php
include ("MySQL/MysqlConnect.php");

$query = "UPDATE `Registred`
				SET `faculty` = 'Соціально-психологічний'
				WHERE `faculty` = 'Cоціально-психологічний'";
$sql = mysql_query($query) or die(mysql_error());
?>
