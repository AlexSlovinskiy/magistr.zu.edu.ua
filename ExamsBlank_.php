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
  	<title>������������� �������</title>
</head>
<?php

include ("MySQL/MysqlConnect.php");

$months=array("����"=>"1", "������"=>"2", "�������"=>"3", "�����"=>"4", "������"=>"5", "������"=>"6", "�����"=>"7", "������"=>"8", "�������"=>"9", "������"=>"10", "���������"=>"11", "������"=>"12");

if ($_POST["search_study_type"]!='') $_SESSION['search_study_type_exam']=$_POST["search_study_type"];
if ($_POST["search_speciality"]!='') $_SESSION['search_speciality_exam']=$_POST["search_speciality"];
if ($_POST["search_language"]!='') $_SESSION['search_language_exam']=$_POST["search_language"];
	else $_SESSION['search_language_exam']='%';


if ($_POST['ExamsList']=='������')
 	{
 	print "<meta http-equiv=\"Refresh\" content=\"0;URL=ExamsList.php\">";
	exit();
 	}


if ($_SESSION['search_study_type_exam']=="�����") $study_type="�����";
if ($_SESSION['search_study_type_exam']=="������") $study_type="������";

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
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">������������� �������</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="���������" class="button" onClick="printpage()"/>
					<input type="button" value="�����" class="button" onClick="window.location.href = 'Exams.php' "/>
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
		    	<td align=right style="border:none;">����� � �-1.06</td>
		    </tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:15px;" align=center>������������ ��������� ���������� ���� ����� ������</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=center><?echo $study_type;?> ��������</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:10px;" align=center>�� ������������ &nbsp;<strong><?echo $speciality;?></strong></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:15px;" align=center><strong>��������ֲ��� ²��̲��� � ______</strong></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=center>� ______________________________________________________ (����������)</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=left>�� ����� __________  ������ _________</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=left>���� �������� "____" ______________ 20____ ����</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=left>������� �������� ______ &nbsp;&nbsp;&nbsp; ��������� �������� ______</td>
			</tr>
            <tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=left>������� �� ������� ������������</td>
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
					   	<td align=center rowspan=2><strong>� <br />�/�</strong></td>
					   	<td align=center rowspan=2><strong>&nbsp;&nbsp;&nbsp;����&nbsp;&nbsp;&nbsp;</strong></td>
                        <td align=center rowspan=2><strong>&nbsp;&nbsp;&nbsp;������� �� �������&nbsp;&nbsp;&nbsp;</strong></td>
                        <td align=center rowspan=2><strong>� <br /> ������- <br />��������� <br /> ������</strong></td>
						<td align=center colspan=2><strong>������</strong></td>
						<td align=center rowspan=2><strong>ϳ����<br /> ������������</strong></td>
      				</tr>
      				<tr>
      					<td align=center><strong>������</strong></td>
					   	<td align=center><strong>��������</strong></td>
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
				<td style="border:none;" align=left>³����������� �������� ���������� ���� _____________ �.�. �����</td>
			</tr>
		    <tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=left> "____" _________________ 20____ ����</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:20px;" align=right>ʳ������ ������������� �������� ______</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=right>ʳ������ ��������, �� �� �'������� �� ������� ______</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;  padding-top:20px;" align=left>������������: </td>
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
				<td style="border:none; padding-left:450px;" align=left>������ ����������� ����: </td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;" align=left>____________________________________</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-left:450px;" align=left> "____" _________________ 20____ ����</td>
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