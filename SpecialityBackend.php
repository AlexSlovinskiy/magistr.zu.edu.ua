<?php
require_once "Scripts/lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("windows-1251");
include ("MySQL/MysqlConnect.php");

$lic_stc=intval($_REQUEST["lic_stc"]);
$lic_zao=intval($_REQUEST["lic_zao"]);
$budg_stc=intval($_REQUEST["budg_stc"]);
$budg_zao=intval($_REQUEST["budg_zao"]);
$quota_stc=intval($_REQUEST["quota_stc"]);
$quota_zao=intval($_REQUEST["quota_zao"]);
$price_stc=intval($_REQUEST["price_stc"]);
$price_zao=intval($_REQUEST["price_zao"]);
//$price_short=intval($_REQUEST["price_short"]);
$price_stc_p=mysql_real_escape_string(trim($_REQUEST["price_stc_p"]));
$price_zao_p=mysql_real_escape_string(trim($_REQUEST["price_zao_p"]));
//$price_short_p=mysql_real_escape_string(trim($_REQUEST["price_short_p"]));
$operator_stc=intval($_REQUEST["operator_stc"]);
$operator_zao=intval($_REQUEST["operator_zao"]);
$spc_id=intval($_REQUEST["spc_id"]);
$day_stc=intval($_REQUEST["day_stc"]);
$month_stc=intval($_REQUEST["month_stc"]);
$year_stc=intval($_REQUEST["year_stc"]);
$ending_date_stc=mktime(0, 0, 0, $month_stc, $day_stc, $year_stc);
$day_zao=intval($_REQUEST["day_zao"]);
$month_zao=intval($_REQUEST["month_zao"]);
$year_zao=intval($_REQUEST["year_zao"]);
$ending_date_zao=mktime(0, 0, 0, $month_zao, $day_zao, $year_zao);



$query = "UPDATE `specialities`
				SET `lic_stc` = '".$lic_stc."' , `lic_zao` ='".$lic_zao."' , `budg_stc` = '".$budg_stc."' , `budg_zao` = '".$budg_zao."',
					`quota_stc` = '".$quota_stc."' , `quota_zao` = '".$quota_zao."', `ending_date_stc` = '".$ending_date_stc."', `ending_date_zao` = '".$ending_date_zao."',
					`price_stc` = '".$price_stc."' , `price_zao` = '".$price_zao."' , `price_short` = '".$price_short."' ,
					`price_stc_p` = '".$price_stc_p."' , `price_zao_p` = '".$price_zao_p."' , `price_short_p` = '".$price_short_p."' ,
					`operator_stc` = '".$operator_stc."' , `operator_zao` = '".$operator_zao."' WHERE `speciality_id` = '".$spc_id."' LIMIT 1";
$sql = mysql_query($query) or die(mysql_error());

$query = "SELECT * FROM `specialities` WHERE `speciality_id` = '".$spc_id."' ";
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql)>0)
   	while ($row = mysql_fetch_assoc($sql))
   		{
   		$lic_stc=$row['$lic_stc'];
		$lic_zao=$row['$lic_zao'];
		$budg_stc=$row['$budg_stc'];
		$quota_zao=$row['$quota_zao'];
		$quota_stc=$row['$quota_stc'];
		$budg_zao=$row['$budg_zao'];
		$price_stc=$row['$price_stc'];
		$price_zao=$row['$price_zao'];
		//$price_short=$row['$price_short'];
		$price_stc_p=$row['$price_stc_p'];
		$price_zao_p=$row['$price_zao_p'];
		//$price_short_p=$row['$price_short_p'];
		$operator_stc=$row['$operator_stc'];
		$operator_zao=$row['$operator_zao'];
		$spc_id=$row['$spc_id'];
        }

global $_RESULT;
//результат
$_RESULT = array(
	"$lic_stc" => $lic_stc,
	"$lic_zao" => $lic_zao,
	"$budg_stc" => $budg_stc,
	"$budg_zao" => $budg_zao,
	"$quota_stc" => $quota_stc,
	"$quota_zao" => $quota_zao,
	"$price_stc" => $price_stc,
	"$price_zao" => $price_zao,
	"$price_short" => $price_short,
	"$price_stc_p" => $price_stc_p,
	"$price_zao_p" => $price_zao_p,
	"$price_short_p" => $price_short_p,
	"$operator_stc" => $operator_stc,
	"$operator_zao" => $operator_zao,
	"$spc_id" => $spc_id,
);
// ошибки
//print_r($list);
echo "OK";
?>