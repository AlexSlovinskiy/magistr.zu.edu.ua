<?php
require_once "Scripts/lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("windows-1251");

$training = $_REQUEST['training'];

include ("MySQL/MysqlConnect.php");
$query = "SELECT `faculty_id` FROM `trainings_bak` WHERE `training_name` = '".$training."' ";
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql)>0)
   	while ($row = mysql_fetch_assoc($sql))
   		{
   		$list=unserialize(htmlspecialchars_decode($row["faculty_id"]));
        $list_length=count($list);
        }

$query = "SELECT SQL_CALC_FOUND_ROWS `faculty_id` FROM `faculties`";
$sql = mysql_query($query) or die(mysql_error());
$sql_rows= mysql_query("SELECT FOUND_ROWS()") or die(mysql_error());
$count=mysql_fetch_assoc($sql_rows);
$count=$count["FOUND_ROWS()"];
$faculty_ids=array();
if (mysql_num_rows($sql)>0)
	while ($row = mysql_fetch_assoc($sql)) $faculty_ids[]=$row["faculty_id"];

global $_RESULT;
//результат
$_RESULT = array(
	"list" => $list,
	"length" => $list_length,
	"faculty_number" => $count,
	"faculty_ids" => $faculty_ids,
);
// ошибки
print_r($list);
echo "OK";
?>