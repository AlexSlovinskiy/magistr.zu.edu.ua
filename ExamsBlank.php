<?php
session_name("blank");
session_start();

include ("MySQL/MysqlConnect.php");
require('fpdf.php');

$months=array("січня"=>"1", "лютого"=>"2", "березня"=>"3", "квітня"=>"4", "травня"=>"5", "червня"=>"6", "липня"=>"7", "серпня"=>"8", "вересня"=>"9", "жовтня"=>"10", "листопада"=>"11", "грудня"=>"12");

if ($_POST["search_study_type"]!='') $_SESSION['search_study_type_exam']=$_POST["search_study_type"];
if ($_POST["search_speciality"]!='') $_SESSION['search_speciality_exam']=$_POST["search_speciality"];
if ($_POST["search_language"]!='') $_SESSION['search_language_exam']=$_POST["search_language"];
	else $_SESSION['search_language_exam']='%';


if ($_POST['ExamsList']=='Список')
 	{
 	print "<meta http-equiv=\"Refresh\" content=\"0;URL=ExamsList.php\">";
	exit();
 	}


if ($_SESSION['search_study_type_exam']=="Денна") $study_type="Денне";
if ($_SESSION['search_study_type_exam']=="Заочна") $study_type="Заочне";

$speciality=$_SESSION['search_speciality_exam'];
$query = "SELECT * FROM `users` WHERE `executive` = '+' LIMIT 1";
$sql = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_assoc($sql);
$executive=$row["user_surname"]." ".substr($row["user_name"],0,1).". ".substr($row["user_patronymic"],0,1).".";

if (substr($speciality,0,1)=="8") $mag=1; else $mag=0;

$pdf=new FPDF();
//set document properties
$pdf->SetAuthor('Alexandr Slovinskiy');
$pdf->SetTitle('Exam Blank');
//set font for the entire document
$pdf->AddFont('Times','','times.php');
$pdf->SetFont('Times','');
$pdf->SetTextColor(0,0,0);
//set up a page
$pdf->AddPage('P');
$pdf->SetDisplayMode(real,'default');
//display the title with a border around it
//Set x and y position for the main text, reduce font size and write content
$pdf->Image('img/form-1-06-1.jpg',15,5,190);
if ($study_type=="Денне") $pdf->Line(96,37,109,37);
if ($study_type=="Заочне") $pdf->Line(111,37,125,37);

$pdf->SetFontSize(14);
$pdf->SetXY (95,54);
if ($mag==1) $pdf->Write(5,"магістр");
if ($mag==0) $pdf->Write(5,"спеціаліст");

$pdf->SetXY (174,80.5);
$pdf->Write(5,date("y", time()));

$pdf->AddPage('P');
$pdf->Image('img/form-1-06-2.jpg',15,5,190);
$pdf->SetXY (45, 193);
$pdf->Write(5,$executive);
$pdf->SetXY (70, 211);
$pdf->Write(5,date("y", time()));
$pdf->SetXY (180, 239);
$pdf->Write(5,date("y", time()));
//Output the document
$pdf->Output('ExamCard.pdf','I');

?>