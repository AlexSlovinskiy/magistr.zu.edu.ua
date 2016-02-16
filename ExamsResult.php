<?php
session_name("exams");
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
  	<title>���������� �������� ������</title>
</head>
<?php
include ("MySQL/MysqlConnect.php");

$months=array("����"=>"1", "������"=>"2", "�������"=>"3", "�����"=>"4", "������"=>"5", "������"=>"6", "�����"=>"7", "������"=>"8", "�������"=>"9", "������"=>"10", "���������"=>"11", "������"=>"12");

if ($_POST["search_study_type"]=="�����") $study_type="�����";
if ($_POST["search_study_type"]=="������") $study_type="������";

$_SESSION["search_study_type"]=$_POST["search_study_type"];
$_SESSION["search_speciality"]=$_POST["search_speciality"];

if ($_POST['ExamsRating']=='��������� ������')
 	{
 	print "<meta http-equiv=\"Refresh\" content=\"0;URL=ExamsRating.php\">";
	exit();
 	}

if ($_POST['ExamsRecomend']=='������������')
 	{
 	print "<meta http-equiv=\"Refresh\" content=\"0;URL=ExamsRecomend.php\">";
	exit();
 	}

if ($_POST['ExamsRecomendEx']=='���������� ������ ��������������')
 	{
 	print "<meta http-equiv=\"Refresh\" content=\"0;URL=ExamsRecomend.php?ext=1\">";
	exit();
 	}

if ($_POST['ExamsRecomendAuto']=='������������ ������ ��������������')
 	{
 	print "<meta http-equiv=\"Refresh\" content=\"0;URL=ExamsRecomendAuto.php\">";
	exit();
 	}



$speciality=$_POST["search_speciality"];
if (substr($speciality,0,1)=="8") $mag=1; else $mag=0;
?>
<body>
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">���������� �������� ������</h1>
    		<div class="printBtn">
				<form>
					<p>
					<input type="button" value="���������" class="button" onClick="printpage()"/>
					<input type="button" value="�����" class="button" onClick="window.location.href = 'Exams.php' "/>
					</p>
				</form>
			</div>


		<br/>
		<table align=center width="900px" cellspacing=0 cellpadding=0 border=0>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;">
					<p style="padding-bottom:10px;" align=center>������������ ��������� ���������� ���� ����� ������</p>
					<!--<p align=center>���������� �������� ������</p>-->
					<p align=center>���������� �������� ������</p>
					<p align=center>����� ��������: <strong><?echo $study_type;?></strong> </p>
				    <p align=center>������������:</p>
				    <p align=center style="padding-bottom:10px;"><strong>&bdquo;<?echo $speciality;?>&ldquo;</strong></p>
				</td>
			</tr>
			<tr>
				<table align=center width="1000px" class="exams" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<tr>
					   	<td align=center><strong>� �/�</strong></td>
                        <td align=center><strong>�������, ��`�, �� �������</strong></td>
                        <td align=center><strong>���������� <br /> �����</strong></td>
                        <?if ($mag==1) echo "<td align=center><strong>�������� <br /> ����</strong></td>
                        <td align=center><strong>����������  <br /> �����</strong></td>
                        <td align=center><strong>���� ����</strong></td>"; ?>
					</tr>

					<tr style="border:solid 2px rgb(0,0,0);">
						<?
						if ($mag==1) $till=6; else $till=3;
						for ($i=1; $i<=$till; $i++)
							echo "<td align=center>".$i."</td>";
						?>
					</tr>

					<?php
					$query = "SELECT * FROM `abiturients` WHERE
                    						`speciality` = '".$_SESSION["search_speciality"]."' AND
                    						`study_type` = '".$_SESSION["search_study_type"]."' AND
											`take_away` = '-'
											ORDER BY `lastname`";

    				$sql = mysql_query($query) or die(mysql_error());
                    $i=1;
					if (mysql_num_rows($sql)>0)
   						{
   						while ($row = mysql_fetch_assoc($sql))
   							{
                            echo "<tr>";
                            echo "<td align=center>".$i."</td>";
                            echo "<td align=center>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                            echo "<td align=center>".$row['bal1']."</td>";
                            if ($mag==1)
								{
								echo "<td align=center>".$row['bal2']."</td>";
								echo "<td align=center>".$row['bal3']."</td>";
								$sum=$row['bal1']+$row['bal2']+$row['bal3'];
								echo "<td align=center>".$sum."</td>";
								}
                            echo "</tr>";
                            $i++;
   							}
   						}

					?>

				</table>
			</tr>
		</table>
	</div>

	<script type="text/javascript">
		function printpage()
			{
			window.print();
			}
	</script>


</body>
</html>