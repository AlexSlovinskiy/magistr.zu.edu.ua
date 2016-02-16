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

if ($_SESSION['search_study_type_exam']=="�����") $study_type="�����";
if ($_SESSION['search_study_type_exam']=="������") $study_type="������";

$speciality=$_SESSION['search_speciality_exam'];
$language=$_SESSION['search_language_exam'];

if (substr($speciality,0,1)=="8") $mag=1; else $mag=0;

/*echo '<pre>';
print_r($_SESSION);
print_r($_POST);
echo '</pre>';*/
?>
<body>
	<div class="main">
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">������ ����</h1>
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
				<?php
					$_SESSION["exam_blank"]=1; //�� ��������� ������
					if ($_GET["page"]!="") $_SESSION["exam_blank"]=$_GET["page"]; //���������� ��������
					$offset=($_GET["page"]-1)*30;
					if (!isset($_GET["page"]) || $_GET["page"]<1) $offset=0;

					$query = "SELECT  SQL_CALC_FOUND_ROWS * FROM `abiturients`
   										WHERE `speciality` = '".$_SESSION['search_speciality_exam']."' AND
                      						`study_type` = '".$_SESSION['search_study_type_exam']."' AND
                      						`take_away` = '-' ";
                    		if ($mag==1 && $language!="%")
                    			$query=$query." AND `language` = '".$_SESSION['search_language_exam']."'
                    							AND `bal1` >= 124 ";
							$query=$query." ORDER BY `ab_id` LIMIT ".$offset.", 30";

					$sql = mysql_query($query) or die(mysql_error());
                    $sql_rows= mysql_query("SELECT FOUND_ROWS()") or die(mysql_error());
   					$num_of_rows=mysql_fetch_assoc($sql_rows);
   					$num_of_rows=$num_of_rows["FOUND_ROWS()"];
					$num_of_pages=floor($num_of_rows/30)+1;
                    if ($num_of_pages>0)
          				{
          				echo "�����: ";
          				for ($i=1; $i<=$num_of_pages; $i++)
                 			{
                 			if ($i==$_GET["page"])
                 				echo "<a href='ExamsList.php?page=".$i."' title='����� ".$i."' style='font-size:115%; color:rgb(98,143,23);'>&nbsp;".$i."&nbsp;</a>";
                 					else if (!isset($_GET["page"]) && $i==1)
                 			 			echo "<a href='ExamsList.php?page=".$i."' title='����� ".$i."' style='font-size:115%; color:rgb(98,143,23);'>&nbsp;".$i."&nbsp;</a>";
                          	 				else echo "<a href='ExamsList.php?page=".$i."' title='����� ".$i."'>&nbsp;".$i."&nbsp;</a>";
                 			}
          				}
				?>
				</p>
			</div>


		<br/>
		<table align=center width="900px" class="examsblank" cellspacing=0 cellpadding=0 border=0>
		    <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:5px;" align=center>������������ ��������� ���������� ���� ����� ������</td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=center><?echo $study_type;?> �������� <?if ($language!="%" && $mag==1) echo '('.$language.' ����)'?> </td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;" align=center>�� ������������ &nbsp;<strong><?echo $speciality;?></strong></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:5px;" align=center><strong>������ ����� <?echo '� '.$_SESSION["exam_blank"];?></strong></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-top:5px;" align=left>���� �������� "____" ______________ 20____ ����</td>
			</tr>

			<tr>
				<table align=center width="900px" class="exams" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0); margin-top:15px;">
					<tr>
					   	<td align=center><strong>� <br />�/�</strong></td>
					   	<td align=center><strong>&nbsp;&nbsp;&nbsp;������� �� �������&nbsp;&nbsp;&nbsp;</strong></td>
                        <td align=center><strong>� ������- <br />��������� <br /> ������</strong></td>
						<td align=center><strong>ϳ����<br /> ��������</strong></td>
						<?if ($mag==1) echo '<td align=center><strong>����.<br /> ����</strong></td>';?>
      				</tr>

					<tr style="border:solid 2px rgb(0,0,0);">
						<?
						if ($mag==1) $till=5; else $till=4;
                        for ($i=1; $i<=$till; $i++)
							echo "<td align=center>".$i."</td>";
						?>
					</tr>

					<?php
                    $i=1;

                    if (mysql_num_rows($sql)>0)
   						{
   						while ($row = mysql_fetch_assoc($sql))
   							{
   							echo '<tr>';
                            echo "<td align=center>".$i.'.'."</td>";
                            echo "<td align=left>".$row["lastname"]." ".substr($row["firstname"],0,1).'. '.substr($row["patronymic"],0,1).'.'."</td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            if ($mag==1) echo "<td align=center>".substr($row["language"],0,3).'.'."</td>";
                            echo "</tr>";
                            $i++;
                            }
   						}


					?>

				</table>
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