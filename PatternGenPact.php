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
$pageCount = $pdf->setSourceFile("img/dogovir2015.pdf");
$pageNo = 1;
$templateId = $pdf->importPage($pageNo);
$size = $pdf->getTemplateSize($templateId);
$pdf->AddPage('P', array($size['w'], $size['h']));
$pdf->useTemplate($templateId);
$pdf->AddFont('Times','','times.php');
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(11);
$pdf->SetXY (20,40);
$pdf->Write(5,$row['lastname']." ".$row['firstname']." ".$row['patronymic']);
$pdf->SetXY (20,47);
$pdf->Write(5,$row['pasp_serial']." ".$row['pasp_number']." виданий ".$row['pasp_issue']." ".date("d.m.Y", $row['pasp_date']));
$pdf->SetXY (20,80);
$pdf->Write(5,$row['lastname']." ".$row['firstname']." ".$row['patronymic']);
$pdf->SetXY (35,87);
if ($row['study_type']=="Денна") $pdf->Write(5,"денною");
if ($row['study_type']=="Заочна") $pdf->Write(5,"заочною");
$pdf->SetXY (160,87);
if ($row['type']=="mag") $pdf->Write(5,"магістр");
if ($row['type']=="spc") $pdf->Write(5,"спеціаліст");
$pdf->SetXY (65,91);
$pdf->Write(5,$row['speciality']);
$pdf->SetXY (65,95);
$pdf->Write(5, $row['faculty']);
$pdf->SetXY (25, 100);
//$pdf->Write(5,date("d", $row['date']));
$pdf->Write(5,"1");
$pdf->SetXY (40,100);
//$pdf->Write(5,$months[date("m", $row['date'])]);
$pdf->Write(5,"вересня");
$pdf->SetXY (65,100);
$pdf->Write(5,date("y", time()));
//$pdf->Write(5,date("Y", $row['date']));

if ($row['study_type']=="Денна")
	$query2 = "SELECT * FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
if ($row['study_type']=="Заочна")
	$query2 = "SELECT * FROM `specialities` WHERE `speciality_name`='".$row['speciality']."'";
$sql2 = mysql_query($query2) or die(mysql_error());
if (mysql_num_rows($sql2)>0) $row2 = mysql_fetch_assoc($sql2);
if ($row['study_type']=="Денна")
	{
	$pdf->SetXY (88,100);
	$pdf->Write(5,date("d", $row2['ending_date_stc']));
	$pdf->SetXY (96,100);
	$pdf->Write(5,$months[date("m",$row2['ending_date_stc'])]);
	$pdf->SetXY (113,100);
	$pdf->Write(5,date("y", $row2['ending_date_stc']));
	}
if ($row['study_type']=="Заочна")
	{
	$pdf->SetXY (88,100);
	$pdf->Write(5,date("d", $row2['ending_date_zao']));
	$pdf->SetXY (96,100);
	$pdf->Write(5,$months[date("m",$row2['ending_date_zao'])]);
	$pdf->SetXY (113,100);
	$pdf->Write(5,date("y", $row2['ending_date_zao']));
	}
$pdf->SetXY (85,124);
$pdf->Write(5,$row['lastname']." ".$row['firstname']." ".$row['patronymic']);
$pdf->SetXY (85,142);
$pdf->Write(5,$row['lastname']." ".$row['firstname']." ".$row['patronymic']);
$pdf->SetXY (115,226);
if ($row['study_type']=="Денна")
	$pdf->Write(5,$row2['price_stc'].",00");
if ($row['study_type']=="Заочна")
	$pdf->Write(5,$row2['price_zao'].",00");
$pdf->SetXY (35,230);
if ($row['study_type']=="Денна")
	$pdf->Write(5,$row2['price_stc_p']." гривень 00 коп.");
if ($row['study_type']=="Заочна")
	$pdf->Write(5,$row2['price_zao_p']." гривень 00 коп.");

$pageNo = 2;
$templateId = $pdf->importPage($pageNo);
$size = $pdf->getTemplateSize($templateId);
$pdf->AddPage('P', array($size['w'], $size['h']));
$pdf->useTemplate($templateId);
$pdf->AddFont('Times','','times.php');
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(11);
$pdf->SetXY (20,203);
$pdf->Write(5,$row['lastname']." ".$row['firstname']." ".$row['patronymic']);
$pdf->SetXY (20,215);
$pdf->Write(5,$row['ID_code']);
$pdf->SetXY (20,223);
$pdf->Write(5,"Паспорт ".$row['pasp_serial']." ".$row['pasp_number']);
$pdf->SetXY (20,232);
$address = array();
$address[] = $row['nationality'];
$address[] = $row['state'];
$pdf->Write(5,implode(', ', array_filter($address)));
$pdf->SetXY (20,240);
$address = array();
$address[] = $row['district'];
$address[] = $row['city'];
$pdf->Write(5,implode(', ', array_filter($address)));
$pdf->SetXY (20,245);
$address = array();
$pdf->Write(5,$row['street']." ".$row['build_number']);
$pdf->SetXY (20,253);
$pdf->Write(5,$row['phone']);
$pdf->SetXY (60,271);
$pdf->Write(5,substr($row['firstname'],0,1).". ".substr($row['patronymic'],0,1).". ".$row['lastname']);

$pdf->Output("pact.pdf", "I");

?>