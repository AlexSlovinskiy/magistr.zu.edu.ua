<?php
session_name("blank");
session_start();

include ("MySQL/MysqlConnect.php");
include ("Parts/SpecialityList.php");
require('fpdf.php');

$months=array("січня"=>"1", "лютого"=>"2", "березня"=>"3", "квітня"=>"4", "травня"=>"5", "червня"=>"6", "липня"=>"7", "серпня"=>"8", "вересня"=>"9", "жовтня"=>"10", "листопада"=>"11", "грудня"=>"12");

if ($_POST["order_number"]!='') $_SESSION['order_number']=$_POST["order_number"];
if ($_POST["search_study_type"]!='') $_SESSION['search_study_type']=$_POST["search_study_type"];
if ($_POST["search_finance"]!='') $_SESSION['search_finance']=$_POST["search_finance"];
if ($_POST["day"]!='') $_SESSION['day']=$_POST["day"];
if ($_POST["month"]!='') $_SESSION['month']=$_POST["month"];
if ($_POST["year"]!='') $_SESSION['year']=$_POST["year"];

if ($_POST["search_study_type"]=='Денна') $study_type="stc";
if ($_POST["search_study_type"]=='Заочна') $study_type="zao";

$pdf=new FPDF();
//set document properties
$pdf->SetAuthor('Alexandr Slovinskiy');
$pdf->SetTitle('Order Annex');
//set font for the entire document
$pdf->AddFont('Times','','times.php');
$pdf->SetFont('Times','');
$pdf->SetTextColor(0,0,0);
//set up a page
$pdf->AddPage('L');
$pdf->SetDisplayMode(real,'default');
//display the title with a border around it
//Set x and y position for the main text, reduce font size and write content
$pdf->Image('img/form_1-12-2.jpg',10,15,280);
$pdf->SetFontSize(9);
$pdf->SetXY (261,29.5);
$pdf->Write(5,$_POST["order_number"]);

$pdf->SetXY (197.5,37);
$pdf->Write(5,$_POST["day"]);
$pdf->SetXY (205,37);
$pdf->Write(5,$_POST["month"]);
$pdf->SetXY (225.4,37);
$pdf->Write(5,substr($_POST["year"],2,2));

$pdf->SetXY (196,63);
if ($_POST["search_finance"]=='b') $pdf->Write(5,"за державним замовленням");
if ($_POST["search_finance"]=='c') $pdf->Write(5,"за рахунок коштів фізичних, юридичних осіб");
$pdf->SetXY (222,51.5);
$pdf->Write(5,strtolower($_POST["search_study_type"]));

$pdf->Line(11,154,11,200);
$pdf->Line(21.5,154,21.5,200);
$pdf->Line(89,153,89,200);
$pdf->Line(114.5,153,114.5,200);
$pdf->Line(133,153,133,200);
$pdf->Line(152,153,152,200);
$pdf->Line(161,153,161,200);
$pdf->Line(176,153,176,200);
$pdf->Line(185,153,185,200);
$pdf->Line(194,153,194,200);

$pdf->Line(287,154,287,200);

$pdf->Line(11,163,285,163);

/*$pdf->SetXY (10,10);
$pdf->Write(5,$study_type);
$pdf->Write(5,count($spc_list[$study_type]));
*/

$n=1;
$start_x=12; $start_y=160;
$pdf->SetFontSize(8);
//for ($i=0; $i<count($spc_list[$study_type]); $i++)
	{
	$query="SELECT * FROM abiturients
				WHERE
				speciality = '".$spc_list[$study_type][0]["spec"]."' AND
				study_type = '".$_POST["search_study_type"]."' AND
				take_away = '-' AND
				recommend = '+' AND
				pact <> '-' AND
				finans = '".$_POST["search_finance"]."'
				ORDER BY specialization ASC, lastname ASC";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql)>0)
		{
		$row = mysql_fetch_assoc($sql);
		//while ($row = mysql_fetch_assoc($sql))
			{			$pdf->SetXY ($start_x, $start_y);
			$pdf->Write(5,$n);			$pdf->SetXY ($start_x, $start_y);
			$pdf->Write(5,$row["speciality"]);

			}
		}
	}





//$pdf->AddPage('L');


//Output the document
$pdf->Output('OrderAnnex.pdf','I');

?>