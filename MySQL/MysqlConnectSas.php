<?php
//connect to database
$user = "root";
$pass = "samsung";
$db = "Magistr";

mysql_connect("localhost", $user, $pass)
	or die ("Could not connect: ".mysql_error());
mysql_query("SET NAMES cp1251");

mysql_select_db($db)
	or die ("Could not select database: ".mysql_error());
?>
