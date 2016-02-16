<?php
session_name("user");
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
  	<title>������ ���������</title>
</head>
<?php
if (!isset($_SESSION["login"]))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}

include ("MySQL/MysqlConnect.php");

$months=array("����"=>"1", "������"=>"2", "�������"=>"3", "�����"=>"4", "������"=>"5", "������"=>"6", "�����"=>"7", "������"=>"8", "�������"=>"9", "������"=>"10", "���������"=>"11", "������"=>"12");

if ($_POST["search_study_type"]=="�����") $study_type="�����";
if ($_POST["search_study_type"]=="������") $study_type="������";

$speciality=$_POST["search_speciality"];
$date_1=$_POST["day"]." ".$_POST["month"]." ".$_POST["year"]." ����.";
$date=mktime(0,0,0,$months[$_POST["month"]],$_POST["day"],$_POST["year"]);
$date_start=$date;
$date_end=$date_start+86400;
if ($_POST["all_date"]=="+") $date_1=" ���� ����� ";
//echo date("M-d-Y",$date);

?>
<body>
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">������ ���������</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="���������" class="button" onClick="printpage()"/>
					<input type="button" value="�����" class="button" onClick="window.location.href = 'Reports.php' "/>
					</p>
				</form>
			</div>


		<br/>
		<table align=center width="900px" cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td style="border:none;">
					<p style="font-family:times;font-size:14px;" align=center>������ ��������� �� <?echo $study_type;?> ����� ��������</p>
				    <p style="font-family:times;font-size:14px;" align=center>������������: &bdquo;<?echo $speciality;?>&ldquo; �� <?echo $date_1;?></p>
				</td>
			</tr>
			<tr>
				<table align=center width="1000px" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<tr>
					   	<td align=center>� �/�</td>
                        <td align=center>���</td>
                        <td align=center>���� ��������� ���������</td>
                        <td align=center>�������, ��`�, �� �������</td>
                        <td align=center>������� ������</td>
                        <td align=center>�����</td>
                        <td align=center>г� �����- �����</td>
                        <td align=center>ϳ����</td>
                        <td align=center>��������, �� ������� �����</td>
                        <td align=center>�����- �������� ��������</td>
                        <td align=center>���� ��������� ������ �������(��)</td>
                        <td align=center>���, ����, ����� �� ���� ������ �������</td>
                        <td align=center>������� ��� ������� �� �������/ <br />�������� ������� � ��������</td>
                        <td align=center>³����� ��� ����������� ��� ���������� ������ ������ � ��������</td>
                        <td align=center>�������� ��� ��������� ���������� ���������</td>
					</tr>

					<tr style="border:solid 2px rgb(0,0,0);">
						<?
						for ($i=1; $i<=15; $i++)
							echo "<td align=center>".$i."</td>";
						?>
					</tr>

					<?php
					if ($_POST["all_date"]=="+")
						$query = "SELECT * FROM `abiturients` WHERE
                    								`speciality` = '".$speciality."'AND
                    								`study_type` = '".$_POST["search_study_type"]."'
                    								ORDER BY `ab_id`"  ;
      				else
      					$query = "SELECT * FROM `abiturients` WHERE (`date` BETWEEN '".$date_start."' AND '".$date_end."') AND
                    								`speciality` = '".$speciality."'AND
                    								`study_type` = '".$_POST["search_study_type"]."'
                    								ORDER BY `ab_id`"  ;

    				$sql = mysql_query($query) or die(mysql_error());
                    if (mysql_num_rows($sql)>0)
   						{
   						$i=1;
   						while ($row = mysql_fetch_assoc($sql))
   							{
                            echo "<tr>";
                            echo "<td align=center>".$i."</td>";
                            echo "<td align=center>".$row["ab_id"]."</td>";
                            echo "<td align=center>".date("d.m.Y", $row['date'])."</td>";
                            echo "<td align=center>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                            echo "<td align=center>";
                            	if ($row["state"]!="") echo $row["state"]." ���. ";
                            	if ($row["district"]!="") echo $row["district"]." �-�. ";
                            	echo " �. (�.) ".$row["city"]." ";
                            	echo $row["street"].", ".$row["build_number"];
                            	if ($row["flat_number"]!="") echo " ��. ".$row["flat_number"];
                            	echo "</td>";
                            echo "<td align=center>"; if ($row["sex"]=='male') echo "���. </td>"; if ($row["sex"]=='female') echo "��. </td>";
                            echo "<td align=center>".date("Y", $row['birth_date'])."</td>";
                            echo "<td align=center>";
                            		if ($row["benefits"]=="+")
                            			{
                                        if ($row["invalid"]=="+") echo " ������ �-�� ����� ";
                                        if ($row["syrota"]=="+") echo " ������ ";
                                        if ($row["chornob"]=="+") echo " ����������� �-�� ������� ";
                                        if ($row["inozem"]=="+") echo " ��������� (���������� ����) ";
                                        if ($row["veteran"]=="+") echo " ������� ����  ";
                                        if ($row["chacht"]=="+") echo " ������� ���������� ����� ";
                                        if ($row["zagybl"]=="+") echo " ĳ���� �������� ��������� ";
                                        if ($row["zasyadka"]=="+") echo " ѳ�'� ��������� �� ���� ��. ������� ";
                                        echo "</td>";
                            			}
                            		else  echo"-</td>";
                            echo "<td align=center>"; if ($row["benefit_doc"]!="") echo $row["benefit_doc"]."</td>"; else echo "-</td>";
                            echo "<td align=center>"; if ($row["chornob34"]=="+") echo "3-4 ���.</td>"; else echo "-</td>";
                            echo "<td align=center>".$row["institution"]."</td>";
                            if ($row["dip_orig"]=="+") $orig="(�������)"; else $orig="(����)";
                            echo "<td align=center>".$row["qualification"]."<br />".$orig."<br />".$row["dip_serial"]." ".$row["dip_number"]." ".date("d.m.Y", $row['dip_date'])."</td>";
                            echo "<td align=center>".$row["dip_average"]; if ($row["dip_honour"]=='+') echo "<br />��� </td>"; else echo "<br />� </td>";
                            echo "<td align=center></td>";
                            echo "<td align=center></td>";
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