<?php
include ("MySQL/MysqlConnect.php");

$query = "UPDATE `Registred`
				SET `faculty` = '���������-������������'
				WHERE `faculty` = 'C��������-������������'";
$sql = mysql_query($query) or die(mysql_error());
?>
