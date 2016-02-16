<?php
require_once "Scripts/lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("windows-1251");

$selected_user = $_REQUEST['selected_user'];

include ("MySQL/MysqlConnect.php");
$query = "SELECT * FROM `users` WHERE `login` = '".$selected_user."' LIMIT 1";
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql)>0)
   	while ($row = mysql_fetch_assoc($sql))
   		{
   		$login=$row["login"];
   		$surname=$row["user_surname"];
   		$name=$row["user_name"];
   		$patronymic=$row["user_patronymic"];
   		$status=$row["status"];
   		$executive=$row["executive"];
        }


global $_RESULT;
//результат
$_RESULT = array(
	"login" =>$login,
	"surname" => $surname,
	"name" => $name,
	"patronymic" => $patronymic,
	"status" => $status,
	"executive" => $executive,
);
// ошибки
print_r($list);
echo "OK";
?>