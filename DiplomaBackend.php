<?php
require_once "Scripts/lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("windows-1251");

$training = $_REQUEST['training'];
$study_type = $_REQUEST['study_type'];
$type = $_REQUEST['type'];
$done=0;

include ("MySQL/MysqlConnect.php");
if ($type=="bak") $query = "SELECT * FROM `Registred` WHERE `training` = '".$training."' AND `study_type` = '".$study_type."'";
if ($type=="spc") $query = "SELECT * FROM `abiturients` WHERE `specialization` = '".$training."' AND `study_type` = '".$study_type."' AND `apply`='+'";
if ($type=="mag") $query = "SELECT * FROM `abiturients` WHERE `speciality` = '".$training."' AND `study_type` = '".$study_type."' AND `apply`='+'";

$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql)>0)
	{
    $filename = "EducationImports/ExportBak.txt";
	if (is_writable($filename))
		{
		if (!$file_pointer = fopen($filename, 'a'))
			{
			$done=0;
         	exit;
    		}
    	else
    		{
        	ftruncate($file_pointer,0);
        	fseek($file_pointer,0,SEEK_SET);
        	}

   		while ($row = mysql_fetch_assoc($sql))
   			{
   			if (isset($row["speciality"]))
   				{
   				$pattern='{((\d\.\d+\s+) (\D+))}xis';
				preg_match($pattern,$row["speciality"] ,$pockets);
   				$speciality=$pockets[3];
   				}
   				else $speciality=trim($row["training"]);
   			if (isset($row["specialization"]))
   				{
   				$pattern='{((\d\.\d+\s+) (\D+) ((\d\.\d+\s+) (\D+))* )$}xis';
				preg_match($pattern,$row["specialization"] ,$pockets);
   				$speciality=$pockets[3].$pockets[6];
   				}
   				else $speciality=trim($row["training"]);

   			if ($row["sex"]=="male") $sex=0;
   			if ($row["sex"]=="female") $sex=1;
   			$birth_day=date("d", $row["birth_date"]);
			$birth_month=date("m", $row["birth_date"]);
        	$birth_year=date("Y", $row["birth_date"]);
        	$pasp_day=date("d", $row["pasp_date"]);
			$pasp_month=date("m", $row["pasp_date"]);
        	$pasp_year=date("Y", $row["pasp_date"]);
            if ($row["finans"]=="������" || $row["finans"]=="b") $finans=0;
   			if ($row["finans"]=="��������" || $row["finans"]=="c") $finans=1;
   			if ($study_type=="�����") $type=0;
   			if ($study_type=="������") $type=1;
            if ($row["nationality"]=="������") $nationality="380";
            	else $nationality="";

            $file_content=trim($row["lastname"])."|".
      						trim($row["firstname"])."|".
      						trim($row["patronymic"])."|".
      						$sex."|".
                            $birth_day.'.'.$birth_month.'.'.$birth_year
                            ."|1|".
                            trim($row["pasp_serial"])."|".
                            trim($row["pasp_number"])."|".
                            $finans."|".
                            trim($row["ID_code"])."|".
                            "0|".
                            "30.06.".date("Y")."|".
                            "30.06.".date("Y")."|".
                            "||||".
                            $type."|".
                            "30.06.".date("Y")."|".
                            "30.06.".date("Y")."|".
                            trim($row["faculty"])."|".
                            "|".
                            "|".
                            $speciality."|".
                            "|".
                            "Graduated|".
                            $pasp_day.'.'.$pasp_month.'.'.$pasp_year."|".
                            trim($row["pasp_issue"])."|".
                            $nationality."|".
                            "|".
                            trim($row["city"])."|".
                            trim($row["street"])."|".
                            trim($row["build_number"]).
      						"|\n";
			if (fwrite($file_pointer, $file_content) === FALSE)
        		{
        		$done=0;
	        	exit;
	    		}
	    	else $done=1;
   			}
   		}
   		else $done=0;
   	fclose ($file_pointer);
   	}


global $_RESULT;
//���������
$_RESULT = array(
	"done" =>$done,
);
// ������
print_r($list);
echo "OK".$done." ".$type;
?>