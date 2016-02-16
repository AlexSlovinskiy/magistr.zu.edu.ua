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

$query = "SELECT * FROM `users` WHERE `executive` = '+' LIMIT 1";
$sql = mysql_query($query) or die(mysql_error());
$row1 = mysql_fetch_assoc($sql);
$executive=$row1["user_surname"]." ".substr($row1["user_name"],0,1).". ".substr($row1["user_patronymic"],0,1).".";

$pdf=new FPDF();
//set document properties
$pdf->SetAuthor('Alexandr Slovinskiy');
$pdf->SetTitle('Exam Card');
//set font for the entire document
$pdf->AddFont('Times','','times.php');
$pdf->SetFont('Times','');
$pdf->SetTextColor(0,0,0);
//set up a page
$pdf->AddPage('P');
$pdf->SetDisplayMode(real,'default');
//display the title with a border around it
//Set x and y position for the main text, reduce font size and write content
$pdf->Image('img/form_1_04_1.jpg',5,5,205);
if ($row['study_type']=="Денна") $pdf->Line(58,53.5,65,53.5);
if ($row['study_type']=="Заочна") $pdf->Line(67,53.5,76,53.5);

$pdf->SetXY (52,64);
$pdf->SetFont('Times','',10);
$pdf->Write(5,$row['ab_id']);
$pdf->SetFontSize(9);
$pdf->SetXY (22,70);
$pdf->Write(5,$row['lastname']);
$pdf->SetXY (15,74.5);
$pdf->Write(5,$row['firstname']);
$pdf->SetXY (24,78);
$pdf->Write(5,$row['patronymic']);
$pdf->SetFontSize(8);
$pdf->SetXY (34,81.5);
$pdf->Write(5, $row['faculty']);
$pdf->SetXY (7,89);
$pdf->Write(5, str_replace($row['faculty'], "", $row['training']));
$pdf->SetXY (7,96);
$pdf->Write(5,$row['speciality']);
$pdf->SetXY (52,100);
if ($row['type']=="mag") $pdf->Write(5,"магістр");
if ($row['type']=="spc") $pdf->Write(5,"спеціаліст");
$pdf->SetFontSize(10);
$pdf->SetXY (10,115.5);
$pdf->Write(5,date("d", $row['date']));
$pdf->SetXY (20,115.5);
$pdf->Write(5,$months[date("m", $row['date'])]);
$pdf->SetXY (43,115.5);
$pdf->Write(5,date("y", $row['date']));
$pdf->SetFontSize(8);
$pdf->SetXY (85,122.5);
$pdf->Write(5,$executive);

$pdf->AddPage('P');
$pdf->Image('img/form_1_04_2.jpg',5,5,205);
$pdf->SetFontSize(9);
$pdf->SetXY (15,37);
$pdf->Write(5, "Середній бал додатку до диплома");
$pdf->SetXY (86,37);
$pdf->Write(5,$row['dip_average']);
$pdf->SetFontSize(10);
$pdf->SetXY (150,119.5);
$pdf->Write(5,$executive);

//Output the document
$pdf->Output('ExamCard.pdf','I');

?>