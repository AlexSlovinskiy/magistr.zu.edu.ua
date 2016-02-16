<?php
session_name("user");
session_start();
include ("MySQL/MysqlConnect.php");
require('fpdf.php');

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

$pdf=new FPDF();
//set document properties
$pdf->SetAuthor('Alexandr Slovinskiy');
$pdf->SetTitle('Zayava');
//set font for the entire document
$pdf->AddFont('Times','','times.php');
$pdf->SetFont('Times','');
$pdf->SetTextColor(0,0,0);
//set up a page

$pdf->AddPage('P');
$pdf->SetDisplayMode(real,'default');
//display the title with a border around it
//Set x and y position for the main text, reduce font size and write content
$pdf->Image('img/form_1_01_3.jpg',0,0,210);

$pdf->SetXY (35,45);
$pdf->SetFont('Times','',12);
$pdf->Write(5,$row['lastname']." ".$row['firstname']." ".$row['patronymic']);

$pdf->SetXY (120,68);
$pdf->SetFont('Times','',12);
if ($row['study_type']=="Денна") $pdf->Write(5,"денну");
if ($row['study_type']=="Заочна") $pdf->Write(5,"заочну");
$pdf->SetXY (55,76);
$pdf->Write(5, $row['faculty']);
$pdf->SetXY (65,84);
if ($row['type']=="mag") $pdf->Write(5,"магістра");
if ($row['type']=="spc") $pdf->Write(5,"спеціаліста");
$pdf->SetXY (20,93);
$pdf->Write(5,$row['speciality']);
$pdf->SetXY (40,113);
$pdf->Write(5,date("Y", $row['dip_date'])." рік, ".$row['institution']);
if ($row['dip_honour']=="+")
	{	$pdf->SetXY (117,124);	$pdf->Write(5,"X");
	}
else {
	$pdf->SetXY (102,124);
	$pdf->Write(5,"X");
	}
$pdf->SetXY (55,133);
$pdf->Write(5,$row['dip_average']);
$pdf->SetXY (80,142);
$pdf->Write(5,$row['language']);
if ($row['benefits']=="+")
	{
	$pdf->SetXY (112,153);
	$pdf->Write(5,"X");
	$pdf->SetXY (15,162);
	$pdf->Write(5,str_replace("\r\n"," ",$row['benefit_doc']));
	}
else {
	$pdf->SetXY (99,153);
	$pdf->Write(5,"X");
	}
if ($row['qualification']=="Спеціаліст" || $row['qualification']=="Магістр")
	{
	$pdf->SetXY (99,171);
	$pdf->Write(5,"X");
	}
else {
	$pdf->SetXY (84,171);
	$pdf->Write(5,"X");
	}
if ($row['nationality']=="Україна")
	{
	$pdf->SetXY (60,181);
	$pdf->Write(5,"X");
	}
else {
	$pdf->SetXY (83,181);
	$pdf->Write(5,"X");
	}
if ($row['sex']=="female")
	{
	$pdf->SetXY (154,181);
	$pdf->Write(5,"X");
	}
else {
	$pdf->SetXY (130,181);
	$pdf->Write(5,"X");
	}
$pdf->SetXY (45,187);
$pdf->Write(5,date("d", $row['birth_date'])." ");
$pdf->Write(5,$months[date("m", $row['birth_date'])]." ");
$pdf->Write(5,date("Y", $row['birth_date'])." року");

$pdf->SetFontSize(10);
$pdf->SetXY (70,193);
$pdf->Write(5,$row['state']);
$pdf->SetXY (136,193);
$pdf->Write(5,$row['district']);
$pdf->SetXY (28,200);
$pdf->Write(5,$row['city']);
$pdf->SetXY (100,200);
$pdf->Write(5,$row['street']);
$pdf->SetXY (26,207);
$pdf->Write(5,$row['build_number']);
$pdf->SetXY (66,207);
$pdf->Write(5,$row['flat_number']);
$pdf->SetXY (132,207);
$pdf->Write(5,$row['phone']);

$pdf->SetFontSize(11);
if ($row['hostel']=="+")
	{
	$pdf->SetXY (105,214);
	$pdf->Write(5,"X");
	}
else {
	$pdf->SetXY (148,215);
	$pdf->Write(5,"X");
	}

$pdf->SetXY (17,271);
$pdf->Write(5,date("d", $row['date']));
$pdf->SetXY (35,271);
$pdf->Write(5,$months[date("m", $row['date'])]);
$pdf->SetXY (70,271);
$pdf->Write(5,date("y", $row['date']));

//Output the document
$pdf->Output('ExamCard.pdf','I');

?>