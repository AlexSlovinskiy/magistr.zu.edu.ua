<?php
session_name("blank");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-Transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
  	<meta http-equiv="cache-control" content="no-cache" />
  	<meta name="copyright" content="Zhytomyr Ivan Franko State University" />
  	<meta name="author" content="Olexandr Slovinskiy" />
  	<link rel="stylesheet" type="text/css" media="screen" href="css/not_print.css" />
  	<link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
	<link rel="icon" type="image/png" href="img/favicon.png" />
  	<title>Екзаменаційна відомість</title>
</head>
<?php

include ("MySQL/MysqlConnect.php");

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

if (substr($speciality,0,1)=="8") $mag=1; else $mag=0;

/*echo '<pre>';
print_r($_SESSION);
print_r($_POST);
echo '</pre>';*/
?>
<body>
	<div class="main">
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">Екзаменаційна відомість</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="Друкувати" class="button" onClick="printpage()"/>
					<input type="button" value="Назад" class="button" onClick="window.location.href = 'Exams.php' "/>
					</p>
				</form>
			</div>
			<div class="column1-unit">
				<p class="caption">

				</p>
			</div>


		<br/>
		<table align=center width="900px" class="examsblank" cellspacing=0 cellpadding=0 border=0>
		    <tr style="font-family:times;font-size:18px;">
		    	<td align=right style="border:none;">Форма № У-1.06</td>
		    </tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:15px;" align=center>Житомирський державний університет імені Івана Франка</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=center><?echo $study_type;?> навчання</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:10px;" align=center>За спеціальністю &nbsp;<strong><?echo $speciality;?></strong></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:15px;" align=center><strong>ЕКЗАМЕНАЦІЙНА ВІДОМІСТЬ № ______</strong></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=center>з ______________________________________________________ (тестування)</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=left>На групу __________  потоку _________</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=left>Дата екзамену "____" ______________ 20____ року</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=left>Початок екзамену ______ &nbsp;&nbsp;&nbsp; Закінчення екзамену ______</td>
			</tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=left>Прізвища та ініціали екзаменаторів</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0);" align=left>&nbsp;</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0);" align=left>&nbsp;</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; border-bottom:solid 1px rgb(0,0,0);" align=left>&nbsp;</td>
			</tr>

			<tr>
				<table align=center width="900px" class="exams" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0); margin-top:15px;">
					<tr>
					   	<td align=center rowspan=2><strong>№ <br />з/п</strong></td>
					   	<td align=center rowspan=2><strong>&nbsp;&nbsp;&nbsp;Шифр&nbsp;&nbsp;&nbsp;</strong></td>
                        <td align=center rowspan=2><strong>&nbsp;&nbsp;&nbsp;Прізвище та ініціали&nbsp;&nbsp;&nbsp;</strong></td>
                        <td align=center rowspan=2><strong>№ <br /> екзаме- <br />наційного <br /> листка</strong></td>
						<td align=center colspan=2><strong>Оцінки</strong></td>
						<td align=center rowspan=2><strong>Підпис<br /> екзаменатора</strong></td>
      				</tr>
      				<tr>
      					<td align=center><strong>Цифрою</strong></td>
					   	<td align=center><strong>Прописом</strong></td>
      				</tr>

					<tr style="border:solid 2px rgb(0,0,0);">
						<?
                        for ($i=1; $i<=7; $i++)
							echo "<td align=center>".$i."</td>";
						?>
					</tr>

					<?php
                    $i=1;
                    while ($i<=30)
                     	{                     	echo '<tr>';
                     	echo "<td align=center>".$i.'.'."</td>";                     	echo '<td></td>';
                     	echo "<td></td>";
                      	echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
                        $i++;
                     	}

					?>

				</table>
			</tr>
		</table>
		<table align=center width="900px" class="examsblank" cellspacing=0 cellpadding=0 border=0 style="margin-top:30px">
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=left>Відповідальний секретар приймальної комісії _____________ В.В. Чумак</td>
			</tr>
		    <tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=left> "____" _________________ 20____ року</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:20px;" align=right>Кількість екзаменованих абітурієнтів ______</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=right>Кількість абітурієнтів, які не з'явились на екзамен ______</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;  padding-top:20px;" align=left>Екзаменатори: </td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;" align=left>____________________________________</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;" align=left>____________________________________</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;" align=left>____________________________________</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;" align=left>____________________________________</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;" align=left>____________________________________</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;" align=left>Голова атестаційної комісії: </td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;" align=left>____________________________________</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;" align=left> "____" _________________ 20____ року</td>
			</tr>
		</table>
	</div>
	</div>
	<script type="text/javascript">
		function printpage()
			{
			window.print();
			}
	</script>


</body>
</html>