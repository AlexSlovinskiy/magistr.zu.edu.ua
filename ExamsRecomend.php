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
  	<title>������������ �� �����������</title>
</head>
<?php
include ("MySQL/MysqlConnect.php");
include ("Parts/SpecialityList.php");

$months=array("����"=>"1", "������"=>"2", "�������"=>"3", "�����"=>"4", "������"=>"5", "������"=>"6", "�����"=>"7", "������"=>"8", "�������"=>"9", "������"=>"10", "���������"=>"11", "������"=>"12");

$study_type=$_SESSION["search_study_type"];
$speciality=$_SESSION["search_speciality"];
if (substr($speciality,0,1)=="8") $mag=1; else $mag=0;

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
		$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `speciality` = '".$speciality."' AND `study_type` = '�����' " ;
    	$sql = mysql_query($query) or die(mysql_error());
    	$exams = mysql_fetch_assoc($sql);
    	$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `speciality` = '".$speciality."' AND `study_type` = '�����' AND `take_away` = '+'" ;
    	$sql = mysql_query($query) or die(mysql_error());
    	$away = mysql_fetch_assoc($sql);
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
		$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `speciality` = '".$speciality."' AND `study_type` = '������' " ;
    	$sql = mysql_query($query) or die(mysql_error());
    	$exams = mysql_fetch_assoc($sql);
    	$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `speciality` = '".$speciality."' AND `study_type` = '������' AND `take_away` = '+' " ;
    	$sql = mysql_query($query) or die(mysql_error());
    	$away = mysql_fetch_assoc($sql);
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
		$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `speciality` = '".$speciality."' AND `study_type` = '�����' " ;
    	$sql = mysql_query($query) or die(mysql_error());
    	$exams = mysql_fetch_assoc($sql);
    	$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `speciality` = '".$speciality."' AND `study_type` = '�����' AND `take_away` = '+' " ;
    	$sql = mysql_query($query) or die(mysql_error());
    	$away = mysql_fetch_assoc($sql);
    	}
	if ($study_type=='������')
		{
		for ($i=0; $i<=count($spc_list["zao"]); $i++)
			{
            if ($spc_list["zao"][$i]["spec"]==$speciality)
            	{
            	$license=$spc_list["zao"][$i]["license"];
            	$budget=$spc_list["zao"][$i]["budget"];
            	$quota=$spc_list["zao"][$i]["quota"];
            	}
			}
 		$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `speciality` = '".$speciality."' AND `study_type` = '������' " ;
    	$sql = mysql_query($query) or die(mysql_error());
    	$exams = mysql_fetch_assoc($sql);
    	$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `speciality` = '".$speciality."' AND `study_type` = '������' AND `take_away` = '+' " ;
    	$sql = mysql_query($query) or die(mysql_error());
    	$away = mysql_fetch_assoc($sql);
    	}
    }
?>
<body>
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">������������ �� �����������</h1>
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
					<p align=center>������������ �� �����������</p>
					<p align=center>����� ��������: <strong><?echo $study_type;?></strong> </p>
				    <p align=center>������������:</p>
				    <p align=center style="padding-bottom:10px;"><strong>&bdquo;<?echo $speciality;?>&ldquo;</strong></p>
				    <p> ˳�������� ����� �������: <strong><?echo $license;?></strong></p>
				    <p> ����� ���������� ����������: <strong><?echo $budget;?></strong></p>
				    <p style="padding-bottom:10px;">����� �������� ����: <strong><?echo $quota;?></strong></p>
		            <?php
		            if ($_GET['ext']==1)
		            	{
		            	echo '<p style="padding-top:0px;">������ ����� ������ ������: <strong>'.$exams["COUNT(*)"].'</strong></p>';
		            	echo '<p style="padding-bottom:10px;">� ��� ������� ���������: <strong>'.$away["COUNT(*)"].'</strong></p>';
		            	}
				    ?>
				</td>
			</tr>
			<tr>
				<table align=center width="1000px" class="exams" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<?php
					if ($_GET['ext']==1) $colspan=7;
						else $colspan=3;
					//���������� ����
					$query = "SELECT * FROM `abiturients` WHERE
                    						`speciality` = '".$_SESSION["search_speciality"]."' AND
                    						`study_type` = '".$_SESSION["search_study_type"]."' AND
											`government_exchange` = '+' AND
											`take_away` = '-' AND
											`recommend` = '+' AND
											`finans` = 'b'
											ORDER BY `benefits`, `bal1`+`bal2`+`bal3`+`dip_average` DESC, `dip_honour` , `dip_average` DESC, `lastname` ASC";

    				$sql = mysql_query($query) or die(mysql_error());
                    $i=1; $j=1;
					if (mysql_num_rows($sql)>0)
   						{
   						echo '<tr>
   								<td align=center colspan="'.$colspan.'"><strong><br />
                   			�� ����� ���������� ������� <br />̳��������� ����</strong></td>
					   		</tr>';
   						while ($row = mysql_fetch_assoc($sql))
   							{
                            echo "<tr>";
                            echo "<td align=center>".$i.".</td>";
                            echo "<td align=center>".$j.".</td>";
							if ($_GET['ext']==1) $row["patronymic"]=$row["patronymic"]."<br/>�������: ".$row["phone"];
							if ($row["pact"]=='-' && $_GET['ext']==1) echo "<td><b>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</b></td>";
								else echo "<td>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";

                            if ($_GET['ext']==1)
                            	{
                            	$bal=$row['bal1']+$row['bal2']+$row['bal3'];
                            	echo "<td align=center>���� ����: ".$bal."</td>";
                            	echo "<td align=center>��: &laquo;".$row['benefits']."&raquo;<br />";
                            		if ($row["invalid3"]=='+') echo "���. ��� ��.: &laquo;".$row['invalid3']."&raquo;</td>"; else echo "</td>";
                                echo "<td align=center>����. � ����.: &laquo;".$row['dip_honour']."&raquo; <br /> ������. ���. ����.: ".$row['dip_average']."<br /> ����� ��� ������: ".$row["pact"]."<br /> ����� �������: ".$row["dip_orig"]."</td>";
                            	echo "<td align=center>����. ".strtolower($row['qualification'])."�<br />".date("d.m.Y", $row['dip_date'])."</td>";
                            	}
                            echo "</tr>";
                            $i++; $j++;
   							}
   						}

					//���� ���������
					$query = "SELECT * FROM `abiturients` WHERE
                    						`speciality` = '".$_SESSION["search_speciality"]."' AND
                    						`study_type` = '".$_SESSION["search_study_type"]."' AND
											`benefits` = '+' AND
											`take_away` = '-' AND
											`recommend` = '+' AND
											`finans` = 'b'
											ORDER BY `benefits`, `bal1`+`bal2`+`bal3`+`dip_average` DESC, `dip_honour` , `dip_average` DESC, `lastname` ASC";

    				$sql = mysql_query($query) or die(mysql_error());
                    $i=1;
					if (mysql_num_rows($sql)>0)
   						{
   						echo '<tr>
   								<td align=center colspan="'.$colspan.'"><strong><br />
                   			�� ����� ���������� ������� <br />���� ���������</strong></td>
					   		</tr>';
   						while ($row = mysql_fetch_assoc($sql))
   							{
                            echo "<tr>";
                            echo "<td align=center>".$j.".</td>";
                            echo "<td align=center>".$i.".</td>";
							if ($_GET['ext']==1) $row["patronymic"]=$row["patronymic"]."<br/>�������: ".$row["phone"];
							if ($row["pact"]=='-' && $_GET['ext']==1) echo "<td><b>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</b></td>";
								else echo "<td>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";

                            if ($_GET['ext']==1)
                            	{
                            	$bal=$row['bal1']+$row['bal2']+$row['bal3'];
                            	echo "<td align=center>���� ����: ".$bal."</td>";
                            	echo "<td align=center>��: &laquo;".$row['benefits']."&raquo;<br />";
                            		if ($row["invalid3"]=='+') echo "���. ��� ��.: &laquo;".$row['invalid3']."&raquo;</td>"; else echo "</td>";
                                echo "<td align=center>����. � ����.: &laquo;".$row['dip_honour']."&raquo; <br /> ������. ���. ����.: ".$row['dip_average']."<br /> ����� ��� ������: ".$row["pact"]."<br /> ����� �������: ".$row["dip_orig"]."</td>";
                            	echo "<td align=center>����. ".strtolower($row['qualification'])."�<br />".date("d.m.Y", $row['dip_date'])."</td>";
                            	}
                            echo "</tr>";
                            $i++; $j++;
   							}
   						}
   					echo '<tr>
   					        <td align=center colspan="'.$colspan.'" style="border-bottom: none;"><br /></td>
						</tr>';

					//����� ������� ������
					$query = "SELECT * FROM `abiturients` WHERE
                    						`speciality` = '".$_SESSION["search_speciality"]."'AND
                    						`study_type` = '".$_SESSION["search_study_type"]."' AND
											`benefits` <> '+' AND
											`government_exchange` <> '+' AND
											`take_away` = '-' AND
											`recommend` = '+' AND
											`finans` = 'b'
											ORDER BY `bal1`+`bal2`+`bal3`+`dip_average` DESC, `dip_honour` , `dip_average` DESC, `lastname` ASC";

					$sql = mysql_query($query) or die(mysql_error());
                    $i=1;
                    if (mysql_num_rows($sql)>0)
   						{
   						echo '<tr>
                   			<td align=center colspan="'.$colspan.'" style="border-top: none; border-bottom: none;">
                   				<strong>�� ����� ���������� ������� <br />�� ��������� ��������</strong>
                   			</td>
					   	</tr>';
   						while ($row = mysql_fetch_assoc($sql))
   							{
                            echo "<tr>";
                            echo "<td align=center>".$j.".</td>";
                            echo "<td align=center>".$i.".</td>";
							if ($_GET['ext']==1) $row["patronymic"]=$row["patronymic"]."<br/>�������: ".$row["phone"];
							if ($row["pact"]=='-' && $_GET['ext']==1) echo "<td><b>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</b></td>";
								else echo "<td>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";

                           	if ($_GET['ext']==1)
                            	{
                            	$bal=$row['bal1']+$row['bal2']+$row['bal3'];
                            	echo "<td align=center>���� ����: ".$bal."</td>";
                            	echo "<td align=center>��: &laquo;".$row['benefits']."&raquo;<br />";
                            		if ($row["invalid3"]=='+') echo "���. ��� ��.: &laquo;".$row['invalid3']."&raquo;</td>"; else echo "</td>";
                                echo "<td align=center>����. � ����.: &laquo;".$row['dip_honour']."&raquo; <br /> ������. ���. ����.: ".$row['dip_average']."<br /> ����� ��� ������: ".$row["pact"]."<br /> ����� �������: ".$row["dip_orig"]."</td>";
                            	echo "<td align=center>����. ".strtolower($row['qualification'])."�<br />".date("d.m.Y", $row['dip_date'])."</td>";
                            	}
                            echo "</tr>";
                            $i++; $j++;
   							}
   						}
   					echo '<tr>
   					        <td align=center colspan="'.$colspan.'" style="border-bottom: none;"><br /></td>
						</tr>
                   		';

                    //���� ��������� ��������
					/*$query = "SELECT * FROM `abiturients` WHERE
                    						`speciality` = '".$_SESSION["search_speciality"]."' AND
                    						`study_type` = '".$_SESSION["search_study_type"]."' AND
											`benefits` = '+' AND
											`take_away` = '-' AND
											`recommend` = '+' AND
											`finans` = 'c'
											ORDER BY `benefits`, `bal1`+`bal2`+`dip_average` DESC, `dip_honour` , `dip_average` DESC, `lastname` ASC";

    				$sql = mysql_query($query) or die(mysql_error());
                    $i=1;
					if (mysql_num_rows($sql)>0)
   						{
   						echo '<tr>
   								<td align=center colspan="'.$colspan.'">
   									<strong><br />�� ����� �������� ��� <br />���� ���������</strong>
   								</td>
					   		</tr>';
   						while ($row = mysql_fetch_assoc($sql))
   							{
                            echo "<tr>";
                            echo "<td align=center>".$j.".</td>";
                            echo "<td align=center>".$i.".</td>";
							if ($_GET['ext']==1) $row["patronymic"]=$row["patronymic"]."<br/>�������: ".$row["phone"];
							if ($row["pact"]=='-' && $_GET['ext']==1) echo "<td><b>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</b></td>";
								else echo "<td>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";

                            if ($_GET['ext']==1)
                            	{
                            	$bal=$row['bal1']+$row['bal2'];
                            	echo "<td align=center>���� ����: ".$bal."</td>";
                            	echo "<td align=center>��: &laquo;".$row['benefits']."&raquo;<br />";
                            		if ($row["invalid3"]=='+') echo "���. ��� ��.: &laquo;".$row['invalid3']."&raquo;</td>"; else echo "</td>";
                                echo "<td align=center>����. � ����.: &laquo;".$row['dip_honour']."&raquo; <br /> ������. ���. ����.: ".$row['dip_average']."<br /> ����� ��� ������: ".$row["pact"]."<br /> ����� �������: ".$row["dip_orig"]."</td>";
                            	echo "<td align=center>����. ".strtolower($row['qualification'])."�<br />".date("d.m.Y", $row['dip_date'])."</td>";
                            	}
                            echo "</tr>";
                            $i++; $j++;
   							}
   						}
   					echo '<tr>
   					        <td align=center colspan="'.$colspan.'" style="border-bottom: none;"><br /></td>
						</tr>';  */

					//����� ������� ��������
					$query = "SELECT * FROM `abiturients` WHERE
                    						`speciality` = '".$_SESSION["search_speciality"]."'AND
                    						`study_type` = '".$_SESSION["search_study_type"]."' AND

											`take_away` = '-' AND
											`recommend` = '+' AND
											`finans` = 'c'
											ORDER BY `bal1`+`bal2`+`bal3`+`dip_average` DESC, `dip_honour` , `dip_average` DESC, `lastname` ASC";

					$sql = mysql_query($query) or die(mysql_error());
                    $i=1;
                    if (mysql_num_rows($sql)>0)
   						{
   						echo '<tr>
					   	    	<td align=center colspan="'.$colspan.'" style="border-top:none;">
					   	    		<strong>�� ����� �������� ��� <br /> �� ��������� ��������</strong>
					   	    	</td>
					   		</tr>';
					   	while ($row = mysql_fetch_assoc($sql))
   							{
                            echo "<tr>";
                            echo "<td align=center>".$j.".</td>";
                            echo "<td align=center>".$i.".</td>";
							if ($_GET['ext']==1) $row["patronymic"]=$row["patronymic"]."<br/>�������: ".$row["phone"];
							if ($row["pact"]=='-' && $_GET['ext']==1) echo "<td><b>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</b></td>";
								else echo "<td>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";

                           	if ($_GET['ext']==1)
                            	{
                            	$bal=$row['bal1']+$row['bal2']+$row['bal3'];
                            	echo "<td align=center>���� ����: ".$bal."</td>";
                            	echo "<td align=center>��: &laquo;".$row['benefits']."&raquo;<br />";
                            		if ($row["invalid3"]=='+') echo "���. ��� ��.: &laquo;".$row['invalid3']."&raquo;</td>"; else echo "</td>";
                                echo "<td align=center>����. � ����.: &laquo;".$row['dip_honour']."&raquo; <br /> ������. ���. ����.: ".$row['dip_average']."<br /> ����� ��� ������: ".$row["pact"]."<br /> ����� �������: ".$row["dip_orig"]."</td>";
                            	echo "<td align=center>����. ".strtolower($row['qualification'])."�<br />".date("d.m.Y", $row['dip_date'])."</td>";
                            	}
                            echo "</tr>";
                            $i++; $j++;
   							}
   						}

                   /* echo "<pre>";
                            print_r($benefiters);
                            print_r($non_benefiters);
                            echo "<pre>"; */
					?>

				</table>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none;">
					<p style="padding-top:30px; font-size:16px;" >�������� ��������:____________________________________________________</p>
				</td>
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