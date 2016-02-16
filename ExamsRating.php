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
  	<title>����������� ������</title>
</head>
<?php
include ("MySQL/MysqlConnect.php");
include ("Parts/SpecialityList.php");

$months=array("����"=>"1", "������"=>"2", "�������"=>"3", "�����"=>"4", "������"=>"5", "������"=>"6", "�����"=>"7", "������"=>"8", "�������"=>"9", "������"=>"10", "���������"=>"11", "������"=>"12");

$study_type=$_SESSION["search_study_type"];
$speciality=$_SESSION["search_speciality"];

/*echo "<pre>";
print_r($spc_list);
echo "</pre>";*/

if (substr($speciality,0,1)=="8") $mag=1;
if (substr($speciality,0,1)=="7") $mag=0;
if ($mag==1)
	{
	if ($study_type=='�����')
		{
		for ($i=0; $i<count($mag_list["stc"]); $i++)
			{
            if ($mag_list["stc"][$i]["spec"]==$speciality)
            	{
            	$license=$mag_list["stc"][$i]["license"];
            	$budget=$mag_list["stc"][$i]["budget"];
            	$quota=$mag_list["stc"][$i]["quota"];
            	}
			}
		}
	if ($study_type=='������')
		{
		for ($i=0; $i<count($mag_list["zao"]); $i++)
			{
            if ($mag_list["zao"][$i]["spec"]==$speciality)
            	{
            	$license=$mag_list["zao"][$i]["license"];
            	$budget=$mag_list["zao"][$i]["budget"];
            	$quota=$mag_list["zao"][$i]["quota"];
            	}
			}
		}
	}
if ($mag==0)
	{
	if ($study_type=='�����')
		{
		for ($i=0; $i<count($spc_list["stc"]); $i++)
			{
            if ($spc_list["stc"][$i]["spec"]==$speciality)
            	{
            	$license=$spc_list["stc"][$i]["license"];
            	$budget=$spc_list["stc"][$i]["budget"];
            	$quota=$spc_list["stc"][$i]["quota"];
            	}
			}
		}
	if ($study_type=='������')
		{
		for ($i=0; $i<count($spc_list["zao"]); $i++)
			{
            if ($spc_list["zao"][$i]["spec"]==$speciality)
            	{
            	$license=$spc_list["zao"][$i]["license"];
            	$budget=$spc_list["zao"][$i]["budget"];
            	$quota=$spc_list["zao"][$i]["quota"];
            	}
			}
		}
	}
?>
<body>
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">����������� ������</h1>
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
					<p align=center>����������� ������</p>
					<p align=center>����� ��������: <strong><?echo $study_type;?></strong> </p>
				    <p align=center>������������:</p>
				    <p align=center style="padding-bottom:10px;"><strong>&bdquo;<?echo $speciality;?>&ldquo;</strong></p>
				    <p> ˳�������� ����� �������: <strong><?echo $license;?></strong></p>
				    <p> ����� ���������� ����������: <strong><?echo $budget;?></strong></p>
				    <p style="padding-bottom:10px;"> ����� �������������� ��������: <strong><?echo $quota;?></strong></p>
		        </td>
			</tr>
			<tr>
				<table align=center width="1000px" class="exams" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<tr>
					   	<td align=center><strong>� �/�</strong></td>
                        <td align=center><strong>�������, ��`�, �� �������</strong></td>
                        <td align=center><strong>���� ����-�/<br />������ � ����.</strong></td>
                        <td align=center><strong>������� ���<br /> �������</strong></td>
                        <td align=center><strong>���������� <br /> �����</strong></td>
                        <?if ($mag==1) echo "<td align=center><strong>�������� <br /> ����</strong></td>
                        <td align=center><strong>���������� <br /> �����</strong></td>"; ?>
						<td align=center><strong>���� ����</strong></td>
					</tr>

					<tr style="border:solid 2px rgb(0,0,0);">
						<?
                        if ($mag==1) $till=8; else $till=6;
						for ($i=1; $i<=$till; $i++)
							echo "<td align=center>".$i."</td>";
						?>
					</tr>
                   <?php
					$query = "SELECT SQL_CALC_FOUND_ROWS * FROM `abiturients` WHERE
                    						`speciality` = '".$_SESSION["search_speciality"]."' AND
                    						`study_type` = '".$_SESSION["search_study_type"]."' AND
											`take_away` = '-' AND
											`government_exchange` = '+' AND
											`bal1` >= 124 ";
					if ($mag==1) $query=$query."AND `bal2` >= 124 ";

					$query=$query."ORDER BY `bal1`+`bal2`+`bal3`+`dip_average` DESC, `dip_honour`, `dip_average` DESC , `lastname` ASC ";

    				$sql = mysql_query($query) or die(mysql_error());

    				$i=1;
					if (mysql_num_rows($sql)>0)
   						{
   						echo '<tr style="border:solid 2px rgb(0,0,0);">';
                    	if ($mag==1) $till=8; else $till=6;
						echo '<td align=center colspan="'.$till.'"><strong>̳��������� ����</strong></td></tr>';

   						while ($row = mysql_fetch_assoc($sql))
   							{
   							echo "<tr>";
                            echo "<td align=center>".$i."</td>";
                            echo "<td align=center>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                            echo "<td align=center>".$row["benefits"]."/".$row["dip_honour"]."</td>";
                            echo "<td align=center>".$row['dip_average']."</td>";
                            echo "<td align=center>".$row['bal1']."</td>";
                            if ($mag==1)
								{
								echo "<td align=center>".$row['bal2']."</td>";
								echo "<td align=center>".$row['bal3']."</td>";
								}
							$sum=$row['bal1']+$row['bal2']+$row['bal3']+$row['dip_average'];
							echo "<td align=center>".$sum."</td>";
                            echo "</tr>";
                            $i++;
   							}
   						}

					?>

					<?php
					$query = "SELECT SQL_CALC_FOUND_ROWS * FROM `abiturients` WHERE
                    						`speciality` = '".$_SESSION["search_speciality"]."' AND
                    						`study_type` = '".$_SESSION["search_study_type"]."' AND
											`take_away` = '-' AND
											`benefits` = '+' AND
											`bal1` >= 124 ";
					if ($mag==1) $query=$query."AND `bal2` >= 124 ";

					$query=$query."ORDER BY `bal1`+`bal2`+`bal3`+`dip_average` DESC, `dip_honour`, `dip_average` DESC , `lastname` ASC ";

    				$sql = mysql_query($query) or die(mysql_error());

    				$i=1;
					if (mysql_num_rows($sql)>0)
   						{
   						echo '<tr style="border:solid 2px rgb(0,0,0);">';
                    	if ($mag==1) $till=8; else $till=6;
						echo '<td align=center colspan="'.$till.'"><strong>���� ���������</strong></td></tr>';

   						while ($row = mysql_fetch_assoc($sql))
   							{
   							echo "<tr>";
                            echo "<td align=center>".$i."</td>";
                            echo "<td align=center>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                            echo "<td align=center>".$row["benefits"]."/".$row["dip_honour"]."</td>";
                            echo "<td align=center>".$row['dip_average']."</td>";
                            echo "<td align=center>".$row['bal1']."</td>";
                            if ($mag==1)
								{
								echo "<td align=center>".$row['bal2']."</td>";
								echo "<td align=center>".$row['bal3']."</td>";
								}
							$sum=$row['bal1']+$row['bal2']+$row['bal3']+$row['dip_average'];
							echo "<td align=center>".$sum."</td>";
                            echo "</tr>";
                            $i++;
   							}
   						}

					?>

					<tr style="border:solid 2px rgb(0,0,0);">
                    	<?
                        if ($mag==1) $till=8; else $till=6;
						echo '<td align=center colspan="'.$till.'"><strong>�� ��������� ��������</strong></td>';
						?>
                    </tr>

                    <?php
					$query = "SELECT * FROM `abiturients` WHERE
                    						`speciality` = '".$_SESSION["search_speciality"]."' AND
                    						`study_type` = '".$_SESSION["search_study_type"]."' AND
											`take_away` = '-' AND
											`benefits` <> '+' AND
											`bal1` >= 124 ";
					if ($mag==1) $query=$query."AND `bal2` >= 124 ";

					$query=$query."ORDER BY `bal1`+`bal2`+`bal3`+`dip_average` DESC, `dip_honour`, `dip_average` DESC , `lastname` ASC ";

    				$sql = mysql_query($query) or die(mysql_error());

    				$i=1;
					if (mysql_num_rows($sql)>0)
   						{
   						while ($row = mysql_fetch_assoc($sql))
   							{
   							echo "<tr>";
                            echo "<td align=center>".$i."</td>";
                            echo "<td align=center>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                            echo "<td align=center>".$row["benefits"]."/".$row["dip_honour"]."</td>";
                            echo "<td align=center>".$row['dip_average']."</td>";
                            echo "<td align=center>".$row['bal1']."</td>";
                            if ($mag==1)
								{
								echo "<td align=center>".$row['bal2']."</td>";
								echo "<td align=center>".$row['bal3']."</td>";
								}
							$sum=$row['bal1']+$row['bal2']+$row['bal3']+$row['dip_average'];
							echo "<td align=center>".$sum."</td>";
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