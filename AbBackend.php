<?php
require_once "Scripts/lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("windows-1251");

$selected_Ab = $_REQUEST['selected_Ab'];

include ("MySQL/MysqlConnect.php");
$query = "SELECT * FROM `Registred` WHERE `ab_id` = '".$selected_Ab."' LIMIT 1";
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql)>0)
   	while ($row = mysql_fetch_assoc($sql))
   		{
   		$lastname=$row["lastname"];
   		$firstname=$row["firstname"];
   		$patronymic=$row["patronymic"];
   		$study_type=$row["study_type"];
   		$finans=$row["finans"];
   		if (strcasecmp($row["nationality"],"Україна")==0) $nationality=1;
					else
						if (strcasecmp($row["nationality"],"Без громадянства")==0) $nationality=3;
							else
								{
								$nationality=2;
								$country=$row["nationality"];
								}
   		$pasp_serial=$row["pasp_serial"];
   		$pasp_number=$row["pasp_number"];
   		$pasp_issue=$row["pasp_issue"];

   		$pasp_day=date("j", $row["pasp_date"]);
		$pasp_month=date("n", $row["pasp_date"]);
        $pasp_year=date("Y")+1-date("Y", $row["pasp_date"]);
   		$birth_day=date("j", $row["birth_date"]);
		$birth_month=date("n", $row["birth_date"]);
        $birth_year=date("Y")+1-date("Y", $row["birth_date"])-15;
   		$sex=$row["sex"];
   		$ID_code=$row["ID_code"];
   		$street=$row["street"];
   		$build_number=$row["build_number"];
   		$flat_number=$row["flat_number"];
   		$city=$row["city"];
   		$district=$row["district"];
   		$state=$row["state"];
   		$phone=$row["phone"];
   		if ($row["language"]=="Англійська") $language=1;
   		if ($row["language"]=="Німецька") $language=2;
   		if ($row["language"]=="Французька") $language=3;
   		if ($row["language"]=="Іспанська") $language=4;
   		if ($row["language"]=="Польська") $language=5;
   		}


global $_RESULT;
//результат
$_RESULT = array(
	"lastname" =>$lastname,
	"firstname" => $firstname,
	"patronymic" => $patronymic,
	"study_type" => $study_type,
	"finans" => $finans,
	"nationality" => $nationality,
	"country" => $country,
	"pasp_serial" => $pasp_serial,
	"pasp_number" => $pasp_number,
	"pasp_issue" => $pasp_issue,
	"pasp_day" => $pasp_day,
	"pasp_month" => $pasp_month,
	"pasp_year" => $pasp_year,
	"birth_day" => $birth_day,
	"birth_month" => $birth_month,
	"birth_year" => $birth_year,
	"sex" => $sex,
	"ID_code" => $ID_code,
	"street" => $street,
	"build_number" => $build_number,
	"flat_number" => $flat_number,
	"city" => $city,
	"district" => $district,
	"state" => $state,
	"phone" => $phone,
	"language" => $language,
);
// ошибки
print_r($list);
echo "OK";
?>