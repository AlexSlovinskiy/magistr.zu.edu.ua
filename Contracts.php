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
  	<title>³������ ��������� ���� �� ��������</title>
</head>
<?php
include ("MySQL/MysqlConnect.php");
include ("Parts/SpecialityList.php");

$months=array("����"=>"1", "������"=>"2", "�������"=>"3", "�����"=>"4", "������"=>"5", "������"=>"6", "�����"=>"7", "������"=>"8", "�������"=>"9", "������"=>"10", "���������"=>"11", "������"=>"12");

if ($_POST["search_study_type"]=="�����") $study_type="�����";
if ($_POST["search_study_type"]=="������") $study_type="������";
if ($_POST["search_type"]=="mag") $type="������";
if ($_POST["search_type"]=="spc") $type="���������";
$date_1=$_POST["day"]." ".$_POST["month"]." ".$_POST["year"]." ����.";
$date=mktime(23,59,59,$months[$_POST["month"]],$_POST["day"],$_POST["year"]);

//echo mktime(0,0,0,1,1,date("Y"));
//echo date("d.m.Y", mktime(0,0,0,1,1,date("Y")));

?>
<body>
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">³������ ��������� ���� �� ��������</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="���������" class="button" onClick="printpage()"/>
					<input type="button" value="�����" class="button" onClick="window.location.href = 'AdminPage.php' "/>
					</p>
				</form>
			</div>


		<br/>
		<table align=center width="900px" cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td style="border:none;">
					<p style="font-family:times;font-size:14px;" align=center>³������ ��������� ���� �� �������� �� <?echo $study_type;?> ����� �������� �������-��������������� ���� &bdquo;<?echo $type;?>&ldquo;</p>
				    <p style="font-family:times;font-size:14px;" align=center>� ������������ ��������� ���������� ���� ����� ������ ������ �� <?echo $date_1;?></p>
				</td>
			</tr>
			<tr>
				<table align=center width="1000px" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<tr>
                    	<td align=center>� �/�</td>
                        <td align=center>������������</td>
                        <td align=center>ϲ� ���������</td>
                        <td align=center>������ ����</td>
                        <td align=center>������ �c���� ������</td>
                        <td align=center>˳����. �����</td>
                        <td align=center>ʳ���. ����. ����</td>
                        <td align=center>������ �����. �� ������</td>
                        <td align=center>������ �����</td>
                        <td align=center>��������. �� �����.</td>
                        <td align=center>������ �����.</td>
                        <td align=center>������� <br />��. ������</td>
                        <td align=center>������� ���-��</td>
                        <td align=center>ֳ�� �� ��</td>
                        <td align=center>�����</td>
					</tr>

					<tr style="border:solid 2px rgb(0,0,0);">
						<?
						for ($i=1; $i<=15; $i++)
							echo "<td align=center>".$i."</td>";
						?>
					</tr>
					<?php
                    $license=0;
                    $budget=0;
                    $coast=0;
                    $coast_all=0;
                    $pact=0;
                    $sum_license_over=0;

					if  ($type=="������")
						{
						if ($study_type=="�����")
							{
							for ($i=0; $i<count($mag_list["stc"]); $i++)
                        		{
								$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����'" ;
    							$sql = mysql_query($query) or die(mysql_error());
    							$all = mysql_fetch_assoc($sql);
    							$sum_all += $all["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `bal1` >= 24 AND `bal2` >= 24 " ;
    							$sql = mysql_query($query) or die(mysql_error());
    							$exams = mysql_fetch_assoc($sql);
    							$sum_exams += $exams["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'b' AND `dip_orig` = '+' AND `recommend` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$derjavne = mysql_fetch_assoc($sql);
    							$sum_derjavne += $derjavne["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'b' AND `recommend` = '+' AND `pact` <> '-'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$pact = mysql_fetch_assoc($sql);
    							$sum_pact += $pact["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'c' AND `recommend` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract = mysql_fetch_assoc($sql);
    							$sum_contract += $contract["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'c' AND `recommend` = '+' AND `pact` <> '-'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract_pact = mysql_fetch_assoc($sql);
    							$sum_contract_pact += $contract_pact["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `take_away` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$take_away = mysql_fetch_assoc($sql);
    							$sum_take_away += $take_away["COUNT(*)"];

                                $license+=$mag_list["stc"][$i]["license"];
                                $budget+=$mag_list["stc"][$i]["budget"];
                                $coast+=$mag_list["stc"][$i]["coast"];
                                $coast_all+=$mag_list["stc"][$i]["coast"]*$contract_pact["COUNT(*)"];

                                $license_over=$mag_list["stc"][$i]["license"]-$derjavne["COUNT(*)"]-$contract_pact["COUNT(*)"];
								$sum_license_over+=$license_over;

    							$n=$i+1;
    							echo "
                            	<tr>
                            		<td align=center valign=center>".$n."</td>
                            		<td align=left valign=center>".$mag_list["stc"][$i]["spec"]."</td>
                            		<td align=center valign=center>".$mag_list["stc"][$i]["name"]."</td>
                            		<td align=center valign=center>".$all["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$exams["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$mag_list["stc"][$i]["license"]."</td>
                                    <td align=center valign=center>".$mag_list["stc"][$i]["budget"]."</td>
                            		<td align=center valign=center>".$derjavne["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$pact["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract_pact["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$license_over."</td>
								    <td align=center valign=center>".$take_away["COUNT(*)"]."</td>
								    <td align=center valign=center>".$mag_list["stc"][$i]["coast"]."</td>
									<td align=center valign=center>".$mag_list["stc"][$i]["coast"]*$contract_pact["COUNT(*)"]."</td>
                             	</tr>
                        		";
                        		}
							}
						if ($study_type=="������")
							{
                       		for ($i=0; $i<count($mag_list["zao"]); $i++)
                        		{
								$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������'" ;
    							$sql = mysql_query($query) or die(mysql_error());
    							$all = mysql_fetch_assoc($sql);
    							$sum_all += $all["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `bal1` >= 24 AND `bal2` >= 24 " ;
    							$sql = mysql_query($query) or die(mysql_error());
    							$exams = mysql_fetch_assoc($sql);
    							$sum_exams += $exams["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'b' AND `dip_orig` = '+' AND `recommend` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$derjavne = mysql_fetch_assoc($sql);
    							$sum_derjavne += $derjavne["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'b' AND `recommend` = '+' AND `pact` <> '-'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$pact = mysql_fetch_assoc($sql);
    							$sum_pact += $pact["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'c' AND `recommend` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract = mysql_fetch_assoc($sql);
    							$sum_contract += $contract["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'c' AND `recommend` = '+' AND `pact` <> '-'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract_pact = mysql_fetch_assoc($sql);
    							$sum_contract_pact += $contract_pact["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `take_away` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$take_away = mysql_fetch_assoc($sql);
    							$sum_take_away += $take_away["COUNT(*)"];

                                $license+=$mag_list["zao"][$i]["license"];
                                $budget+=$mag_list["zao"][$i]["budget"];
                                $coast+=$mag_list["zao"][$i]["coast"];
                                $coast_all+=$mag_list["zao"][$i]["coast"]*$contract_pact["COUNT(*)"];

                                $license_over=$mag_list["zao"][$i]["license"]-$derjavne["COUNT(*)"]-$contract_pact["COUNT(*)"];
                                $sum_license_over+=$license_over;

								$n=$i+1;
								echo "
                            	<tr>
                            		<td align=center valign=center>".$n."</td>
                            		<td align=left valign=center>".$mag_list["zao"][$i]["spec"]."</td>
                            		<td align=center valign=center>".$mag_list["zao"][$i]["name"]."</td>
                            		<td align=center valign=center>".$all["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$exams["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$mag_list["zao"][$i]["license"]."</td>
                                    <td align=center valign=center>".$mag_list["zao"][$i]["budget"]."</td>
                            		<td align=center valign=center>".$derjavne["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$pact["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract_pact["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$license_over."</td>
								    <td align=center valign=center>".$take_away["COUNT(*)"]."</td>
								    <td align=center valign=center>".$mag_list["zao"][$i]["coast"]."</td>
									<td align=center valign=center>".$mag_list["zao"][$i]["coast"]*$contract_pact["COUNT(*)"]."</td>
                             	</tr>
                        		";
                        		}
                        	}
						}
                    if  ($type=="���������")
                       	{
                       	if ($study_type=="�����")
							{
                       		for ($i=0; $i<count($spc_list["stc"]); $i++)
                       			{
                       			$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����'" ;
    							$sql = mysql_query($query) or die(mysql_error());
    							$all = mysql_fetch_assoc($sql);
    							$sum_all += $all["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `bal1` >= 24 " ;
    							$sql = mysql_query($query) or die(mysql_error());
    							$exams = mysql_fetch_assoc($sql);
    							$sum_exams += $exams["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'b' AND `dip_orig` = '+' AND `recommend` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$derjavne = mysql_fetch_assoc($sql);
    							$sum_derjavne += $derjavne["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'b' AND `recommend` = '+' AND `pact` <> '-'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$pact = mysql_fetch_assoc($sql);
    							$sum_pact += $pact["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'c' AND `recommend` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract = mysql_fetch_assoc($sql);
    							$sum_contract += $contract["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'c' AND `recommend` = '+' AND `pact` <> '-'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract_pact = mysql_fetch_assoc($sql);
    							$sum_contract_pact += $contract_pact["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `take_away` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$take_away = mysql_fetch_assoc($sql);
    							$sum_take_away += $take_away["COUNT(*)"];

                                $license+=$spc_list["stc"][$i]["license"];
                                $budget+=$spc_list["stc"][$i]["budget"];
                                $coast+=$spc_list["stc"][$i]["coast"];
                                $coast_all+=$spc_list["stc"][$i]["coast"]*$contract_pact["COUNT(*)"];

                                $license_over=$spc_list["stc"][$i]["license"]-$derjavne["COUNT(*)"]-$contract_pact["COUNT(*)"];
                                $sum_license_over+=$license_over;

                            	$n=$i+1;
                            	echo "
                            	<tr>
                            		<td align=center valign=center>".$n."</td>
                            		<td align=left valign=center>".$spc_list["stc"][$i]["spec"]."</td>
                            		<td align=center valign=center>".$spc_list["stc"][$i]["name"]."</td>
                            		<td align=center valign=center>".$all["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$exams["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$spc_list["stc"][$i]["license"]."</td>
                                    <td align=center valign=center>".$spc_list["stc"][$i]["budget"]."</td>
                            		<td align=center valign=center>".$derjavne["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$pact["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract_pact["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$license_over."</td>
								    <td align=center valign=center>".$take_away["COUNT(*)"]."</td>
								    <td align=center valign=center>".$spc_list["stc"][$i]["coast"]."</td>
									<td align=center valign=center>".$spc_list["stc"][$i]["coast"]*$contract_pact["COUNT(*)"]."</td>
                             	</tr>
                        		";
                       			}
                       		}
                       	if ($study_type=="������")
							{
                       		for ($i=0; $i<count($spc_list["zao"]); $i++)
                       			{
                       			$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������'" ;
    							$sql = mysql_query($query) or die(mysql_error());
    							$all = mysql_fetch_assoc($sql);
    							$sum_all += $all["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `bal1` >= 24 " ;
    							$sql = mysql_query($query) or die(mysql_error());
    							$exams = mysql_fetch_assoc($sql);
    							$sum_exams += $exams["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'b' AND `dip_orig` = '+' AND `recommend` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$derjavne = mysql_fetch_assoc($sql);
    							$sum_derjavne += $derjavne["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'b' AND `recommend` = '+' AND `pact` <> '-'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$pact = mysql_fetch_assoc($sql);
    							$sum_pact += $pact["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'c' AND `recommend` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract = mysql_fetch_assoc($sql);
    							$sum_contract += $contract["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'c' AND `recommend` = '+' AND `pact` <> '-'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract_pact = mysql_fetch_assoc($sql);
    							$sum_contract_pact += $contract_pact["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `take_away` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$take_away = mysql_fetch_assoc($sql);
    							$sum_take_away += $take_away["COUNT(*)"];

                                $license+=$spc_list["zao"][$i]["license"];
                                $budget+=$spc_list["zao"][$i]["budget"];
                                $coast+=$spc_list["zao"][$i]["coast"];
                                $coast_all+=$spc_list["zao"][$i]["coast"]*$contract_pact["COUNT(*)"];

                                $license_over=$spc_list["zao"][$i]["license"]-$derjavne["COUNT(*)"]-$contract_pact["COUNT(*)"];
                                $sum_license_over+=$license_over;

                                $n=$i+1;
                            	echo "
                            	<tr>
                            		<td align=center valign=center>".$n."</td>
                            		<td align=left valign=center>".$spc_list["zao"][$i]["spec"]."</td>
                            		<td align=center valign=center>".$spc_list["zao"][$i]["name"]."</td>
                            		<td align=center valign=center>".$all["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$exams["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$spc_list["zao"][$i]["license"]."</td>
                                    <td align=center valign=center>".$spc_list["zao"][$i]["budget"]."</td>
                            		<td align=center valign=center>".$derjavne["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$pact["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract_pact["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$license_over."</td>
								    <td align=center valign=center>".$take_away["COUNT(*)"]."</td>
								    <td align=center valign=center>".$spc_list["zao"][$i]["coast"]."</td>
									<td align=center valign=center>".$spc_list["zao"][$i]["coast"]*$contract_pact["COUNT(*)"]."</td>
                             	</tr>
                        		";
                       			}
                       		}
                     	}
					?>
                    <tr style="border:solid 2px rgb(0,0,0);">
						<td align=center></td>
						<td align=center>������:</td>
						<td align=center></td>
						<td align=center><?echo $sum_all;?></td>
						<td align=center><?echo $sum_exams;?></td>
						<td align=center><?echo $license;?></td>
						<td align=center><?echo $budget;?></td>
						<td align=center><?echo $sum_derjavne;?></td>
						<td align=center><?echo $sum_pact;?></td>
						<td align=center><?echo $sum_contract;?></td>
						<td align=center><?echo $sum_contract_pact;?></td>
						<td align=center><?echo $sum_license_over;?></td>
                        <td align=center><?echo $sum_take_away;?></td>
                        <td align=center>-</td>
						<td align=center><?echo $coast_all;?></td>
					</tr>
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