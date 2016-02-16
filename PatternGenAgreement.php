<?php
session_name("user");
session_start();
include ("MySQL/MysqlConnect.php");
require('fpdf.php');
require('fpdi/fpdi.php');

$months=array("01"=>"січня", "02"=>"лютого", "03"=>"березня", "04"=>"квітня", "05"=>"травня", "06"=>"червня", "07"=>"липня", "08"=>"серпня", "09"=>"вересня", "10"=>"жовтня", "11"=>"листопада", "12"=>"грудня");

$id=intval($_GET['id']);
if ($id<1 || !isset($_SESSION['login']))
 	{
 	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
 	}

// делаем запрос к БД и ищем соответствие юзера абитуриенту
if ($_SESSION['status']=="user")
	{
	$query = "SELECT * FROM `abiturients` WHERE `ab_id`='".$id."' AND `operator` = '".$_SESSION["user_id"]."' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql) == 1)
  		{
  		$row = mysql_fetch_assoc($sql);
  		}
  	else
  		{
  		print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
		exit();
  		}
  	}
if ($_SESSION['status']=="admin")
	{
	$query = "SELECT * FROM `abiturients` WHERE `ab_id` = '".$id."'";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql) == 1) $row = mysql_fetch_assoc($sql);
	}

$pdf = new FPDI();
$pageCount = $pdf->setSourceFile("img/ugoda2014.pdf");
$pageNo = 1;
$templateId = $pdf->importPage($pageNo);
$size = $pdf->getTemplateSize($templateId);
$pdf->AddPage('P', array($size['w'], $size['h']));
$pdf->useTemplate($templateId);
$pdf->AddFont('Times','','times.php');
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(11);


$pdf->SetXY (35,61);
$pdf->Write(5,$row['lastname']." ".$row['firstname']." ".$row['patronymic']);
$pdf->SetXY (55,70);
if ($row['type']=="mag") $pdf->Write(5,"6-й курс, ".$row['faculty']);
if ($row['type']=="spc") $pdf->Write(5,"5-й курс ".$row['faculty']);
if ($row['study_type']=="Денна") $type=", денна форма навчання";
if ($row['study_type']=="Заочна") $type=", заочна форма навчання";
$pdf->SetXY (68,76);
if ($row['type']=="mag") $pdf->Write(5,"магістр".$type);
if ($row['type']=="spc") $pdf->Write(5,"спеціаліст".$type);
$pdf->SetXY (45,82);
$pdf->Write(5, str_replace($row['faculty'], "", $row['training']));
$pdf->SetXY (38,88);
$pdf->Write(5,$row['speciality']);
$pdf->SetXY (15,100);
$pdf->Write(5,$row['speciality']);
$pdf->SetFontSize(10);
$pdf->SetXY (15,150);
$pdf->Write(5,str_replace($row['faculty'], "", $row['training']).", спеціальністю ".$row['speciality']);
if ($row['study_type']=="Денна")
	$query2 = "SELECT `ending_date_stc` FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
if ($row['study_type']=="Заочна")
	$query2 = "SELECT `ending_date_zao` FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
$sql2 = mysql_query($query2) or die(mysql_error());
if (mysql_num_rows($sql2)>0) $row2 = mysql_fetch_assoc($sql2);
if ($row['study_type']=="Денна")
	{
	$pdf->SetFontSize(11);
	$pdf->SetXY (110,197);
	$pdf->Write(5,date("d", $row2['ending_date_stc']));
	$pdf->SetXY (125,197);
	$pdf->Write(5,$months[date("m", $row2['ending_date_stc'])]);
	$pdf->SetXY (163,197);
	$pdf->Write(5,date("y", $row2['ending_date_stc']));
    }

if ($row['study_type']=="Заочна")
	{
	$pdf->SetFontSize(11);
	$pdf->SetXY (110,197);
	$pdf->Write(5,date("d", $row2['ending_date_zao']));
	$pdf->SetXY (125,197);
	$pdf->Write(5,$months[date("m", $row2['ending_date_zao'])]);
	$pdf->SetXY (163,197);
	$pdf->Write(5,date("y", $row2['ending_date_zao']));
    }
if ($row['flat_number']!="") $row['build_number'] = $row['build_number']." кв. ".$row['flat_number'];
$pdf->SetFontSize(10);
$pdf->SetXY (37,225);
$address = array();
$address[] = $row['nationality'];
$address[] = $row['state'];
$address[] = $row['district'];
$address[] = $row['city'];
$address[] = $row['street'] .' '. $row['build_number'];
$address[] = "тел. " . $row['phone'];
$pdf->Write(5,implode(', ', array_filter($address)));
$pdf->SetXY (37,234);
$pdf->Write(5,$row['pasp_serial']." ".$row['pasp_number']);
$pdf->SetXY (27,243);
$pdf->Write(5,"виданий ".$row['pasp_issue']." ".date("d.m.Y", $row['pasp_date']));
$pdf->SetFontSize(8);
//Output the document
$pdf->Output("agreement.pdf", "I");
?>