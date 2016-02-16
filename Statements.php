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
  	<title>³������ ����������� ����</title>
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
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">³������ ����������� ����</h1>
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
					<p style="font-family:times;font-size:14px;" align=center>³������ ����������� ���� �� <?echo $study_type;?> ����� �������� �������-��������������� ���� &bdquo;<?echo $type;?>&ldquo;</p>
				    <p style="font-family:times;font-size:14px;" align=center>� ������������ ��������� ���������� ���� ����� ������ ������ �� <?echo $date_1;?></p>
				</td>
			</tr>
			<tr>
				<table align=center width="1000px" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<tr>
                    	<td align=center rowspan=3>� �/�</td>
                        <td align=center rowspan=3>������������</td>
                        <td align=center rowspan=3>ϲ� ���������</td>
                        <td align=center rowspan=3>˳�. �����</td>
                        <td align=center rowspan=3>������</td>
                        <td align=center rowspan=3>����</td>
                        <td align=center rowspan=3>�����</td>
                        <td align=center colspan=16>����� ����</td>
                        <td align=center colspan=4>��������</td>
                        <td align=center rowspan=3>����</td>
                        <td align=center rowspan=3>��� ����</td>
                        <td align=center rowspan=3>��� �����</td>
                        <td align=center rowspan=3>������</td>
					</tr>
					<tr>
                    	<td align=center rowspan=2>���</td>
                    	<td align=center rowspan=2>���� ����</td>
                        <td align=center colspan=8>� ���� ����</td>
                        <td align=center rowspan=2>� 3-4</td>
                        <td align=center rowspan=2>��� 3</td>
                        <td align=center rowspan=2>����</td>
                        <td align=center rowspan=2>����</td>
                        <td align=center rowspan=2>�����</td>
                        <td align=center rowspan=2>Ƴ���</td>
                        <td align=center rowspan=2>��� �� <?echo date("Y");?></td>
                        <td align=center rowspan=2>��� <?echo date("Y");?></td>
                        <td align=center rowspan=2>��� �� <?echo date("Y");?></td>
                        <td align=center rowspan=2>��� <?echo date("Y");?></td>
					</tr>
					<tr>
     					<td align=center>�����</td>
                        <td align=center>�����</td>
                        <td align=center>����</td>
                        <td align=center>����</td>
                        <td align=center>�����</td>
                        <td align=center>����</td>
                        <td align=center>�����</td>
                        <td align=center>�����</td>
					</tr>
					<tr style="border:solid 2px rgb(0,0,0);">
						<?
						for ($i=1; $i<=31; $i++)
							echo "<td align=center>".$i."</td>";
						?>
					</tr>
					<?php

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

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'b'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$derjavne = mysql_fetch_assoc($sql);
    							$sum_derjavne += $derjavne["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'c'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract = mysql_fetch_assoc($sql);
    							$sum_contract += $contract["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `dip_honour` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$dip_honour = mysql_fetch_assoc($sql);
    							$sum_dip_honour += $dip_honour["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `benefits` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$benefits = mysql_fetch_assoc($sql);
    							$sum_benefits += $benefits["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `invalid` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$invalid = mysql_fetch_assoc($sql);
    							$sum_invalid += $invalid["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `syrota` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$syrota = mysql_fetch_assoc($sql);
    							$sum_syrota += $syrota["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `chornob` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chornob = mysql_fetch_assoc($sql);
    							$sum_chornob += $chornob["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `inozem` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$inozem = mysql_fetch_assoc($sql);
    							$sum_inozem += $inozem["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `veteran` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$veteran = mysql_fetch_assoc($sql);
    							$sum_veteran += $veteran["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `chacht` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chacht = mysql_fetch_assoc($sql);
    							$sum_chacht += $chacht["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `zagybl` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$zagybl = mysql_fetch_assoc($sql);
    							$sum_zagybl += $zagybl["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `zasyadka` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$zasyadka = mysql_fetch_assoc($sql);
    							$sum_zasyadka += $zasyadka["COUNT(*)"];

								$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `chornob34` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chornob34 = mysql_fetch_assoc($sql);
    							$sum_chornob34 += $chornob34["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `invalid3` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$invalid3 = mysql_fetch_assoc($sql);
    							$sum_invalid3 += $invalid3["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `location` = 'village'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$village = mysql_fetch_assoc($sql);
    							$sum_village += $village["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `location` = 'city'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$city = mysql_fetch_assoc($sql);
    							$sum_city += $city["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `location` = 'city_zt'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$city_zt = mysql_fetch_assoc($sql);
    							$sum_city_zt += $city_zt["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `sex` = 'female'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$female = mysql_fetch_assoc($sql);
    							$sum_female += $female["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `institution` = '��� ���� �. ������' AND `dip_date` >= '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$ZDU_10 = mysql_fetch_assoc($sql);
    							$sum_ZDU_10 += $ZDU_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `institution` = '��� ���� �. ������' AND `dip_date` < '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$ZDU_befor_10 = mysql_fetch_assoc($sql);
    							$sum_ZDU_befor_10 += $ZDU_befor_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `institution` <> '��� ���� �. ������' AND `dip_date` >= '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$other_10 = mysql_fetch_assoc($sql);
    							$sum_other_10 += $other_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `institution` <> '��� ���� �. ������' AND `dip_date` < '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$other_befor_10 = mysql_fetch_assoc($sql);
    							$sum_other_befor_10 += $other_befor_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `nationality` <> '������' AND `nationality` <> '��� ������������'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$nationality = mysql_fetch_assoc($sql);
    							$sum_nationality += $nationality["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `apply` = '+' AND `finans` = 'b'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$apply_b = mysql_fetch_assoc($sql);
    							$sum_apply_b += $apply_b["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `apply` = '+' AND `finans` = 'c'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$apply_c = mysql_fetch_assoc($sql);
    							$sum_apply_c += $apply_c["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `target` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$target = mysql_fetch_assoc($sql);
    							$sum_target += $target["COUNT(*)"];

                                $n=$i+1;
								echo "
                            	<tr>
                            		<td align=center valign=center>".$n."</td>
                            		<td align=left valign=center>".$mag_list["stc"][$i]["spec"]."</td>
                            		<td align=center valign=center>".$mag_list["stc"][$i]["name"]."</td>
                            		<td align=center valign=center>".$mag_list["stc"][$i]["license"]."</td>
                            		<td align=center valign=center>".$all["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$derjavne["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$dip_honour["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$benefits["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$invalid["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$syrota["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chornob["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$inozem["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$veteran["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chacht["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$zagybl["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$zasyadka["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chornob34["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$invalid3["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$village["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$city["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$city_zt["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$female["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$ZDU_befor_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$ZDU_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$other_befor_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$other_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$nationality["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$apply_b["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$apply_c["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$target["COUNT(*)"]."</td>
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

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'b'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$derjavne = mysql_fetch_assoc($sql);
    							$sum_derjavne += $derjavne["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'c'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract = mysql_fetch_assoc($sql);
    							$sum_contract += $contract["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `dip_honour` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$dip_honour = mysql_fetch_assoc($sql);
    							$sum_dip_honour += $dip_honour["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `benefits` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$benefits = mysql_fetch_assoc($sql);
    							$sum_benefits += $benefits["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `invalid` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$invalid = mysql_fetch_assoc($sql);
    							$sum_invalid += $invalid["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `syrota` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$syrota = mysql_fetch_assoc($sql);
    							$sum_syrota += $syrota["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `chornob` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chornob = mysql_fetch_assoc($sql);
    							$sum_chornob += $chornob["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `inozem` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$inozem = mysql_fetch_assoc($sql);
    							$sum_inozem += $inozem["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `veteran` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$veteran = mysql_fetch_assoc($sql);
    							$sum_veteran += $veteran["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `chacht` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chacht = mysql_fetch_assoc($sql);
    							$sum_chacht += $chacht["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `zagybl` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$zagybl = mysql_fetch_assoc($sql);
    							$sum_zagybl += $zagybl["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `zasyadka` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$zasyadka = mysql_fetch_assoc($sql);
    							$sum_zasyadka += $zasyadka["COUNT(*)"];

								$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `chornob34` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chornob34 = mysql_fetch_assoc($sql);
    							$sum_chornob34 += $chornob34["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `invalid3` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$invalid3 = mysql_fetch_assoc($sql);
    							$sum_invalid3 += $invalid3["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `location` = 'village'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$village = mysql_fetch_assoc($sql);
    							$sum_village += $village["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `location` = 'city'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$city = mysql_fetch_assoc($sql);
    							$sum_city += $city["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `location` = 'city_zt'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$city_zt = mysql_fetch_assoc($sql);
    							$sum_city_zt += $city_zt["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `sex` = 'female'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$female = mysql_fetch_assoc($sql);
    							$sum_female += $female["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `institution` = '��� ���� �. ������' AND `dip_date` >= '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$ZDU_10 = mysql_fetch_assoc($sql);
    							$sum_ZDU_10 += $ZDU_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `institution` = '��� ���� �. ������' AND `dip_date` < '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$ZDU_befor_10 = mysql_fetch_assoc($sql);
    							$sum_ZDU_befor_10 += $ZDU_befor_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `institution` <> '��� ���� �. ������' AND `dip_date` >= '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$other_10 = mysql_fetch_assoc($sql);
    							$sum_other_10 += $other_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `institution` <> '��� ���� �. ������' AND `dip_date` < '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$other_befor_10 = mysql_fetch_assoc($sql);
    							$sum_other_befor_10 += $other_befor_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `nationality` <> '������' AND `nationality` <> '��� ������������'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$nationality = mysql_fetch_assoc($sql);
    							$sum_nationality += $nationality["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `apply` = '+' AND `finans` = 'b'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$apply_b = mysql_fetch_assoc($sql);
    							$sum_apply_b += $apply_b["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `apply` = '+' AND `finans` = 'c'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$apply_c = mysql_fetch_assoc($sql);
    							$sum_apply_c += $apply_c["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$mag_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `target` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$target = mysql_fetch_assoc($sql);
    							$sum_target += $target["COUNT(*)"];

								$n=$i+1;
								echo "
                            	<tr>
                            		<td align=center valign=center>".$n."</td>
                            		<td align=left valign=center>".$mag_list["zao"][$i]["spec"]."</td>
                            		<td align=center valign=center>".$mag_list["zao"][$i]["name"]."</td>
                            		<td align=center valign=center>".$mag_list["zao"][$i]["license"]."</td>
                            		<td align=center valign=center>".$all["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$derjavne["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$dip_honour["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$benefits["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$invalid["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$syrota["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chornob["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$inozem["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$veteran["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chacht["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$zagybl["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$zasyadka["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chornob34["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$invalid3["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$village["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$city["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$city_zt["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$female["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$ZDU_befor_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$ZDU_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$other_befor_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$other_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$nationality["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$apply_b["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$apply_c["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$target["COUNT(*)"]."</td>
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

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'b'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$derjavne = mysql_fetch_assoc($sql);
    							$sum_derjavne += $derjavne["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `finans` = 'c'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract = mysql_fetch_assoc($sql);
    							$sum_contract += $contract["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `dip_honour` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$dip_honour = mysql_fetch_assoc($sql);
    							$sum_dip_honour += $dip_honour["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `benefits` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$benefits = mysql_fetch_assoc($sql);
    							$sum_benefits += $benefits["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `invalid` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$invalid = mysql_fetch_assoc($sql);
    							$sum_invalid += $invalid["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `syrota` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$syrota = mysql_fetch_assoc($sql);
    							$sum_syrota += $syrota["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `chornob` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chornob = mysql_fetch_assoc($sql);
    							$sum_chornob += $chornob["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `inozem` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$inozem = mysql_fetch_assoc($sql);
    							$sum_inozem += $inozem["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `veteran` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$veteran = mysql_fetch_assoc($sql);
    							$sum_veteran += $veteran["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `chacht` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chacht = mysql_fetch_assoc($sql);
    							$sum_chacht += $chacht["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `zagybl` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$zagybl = mysql_fetch_assoc($sql);
    							$sum_zagybl += $zagybl["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `zasyadka` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$zasyadka = mysql_fetch_assoc($sql);
    							$sum_zasyadka += $zasyadka["COUNT(*)"];

								$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `chornob34` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chornob34 = mysql_fetch_assoc($sql);
    							$sum_chornob34 += $chornob34["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `invalid3` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$invalid3 = mysql_fetch_assoc($sql);
    							$sum_invalid3 += $invalid3["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `location` = 'village'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$village = mysql_fetch_assoc($sql);
    							$sum_village += $village["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `location` = 'city'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$city = mysql_fetch_assoc($sql);
    							$sum_city += $city["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `location` = 'city_zt'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$city_zt = mysql_fetch_assoc($sql);
    							$sum_city_zt += $city_zt["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `sex` = 'female'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$female = mysql_fetch_assoc($sql);
    							$sum_female += $female["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `institution` = '��� ���� �. ������' AND `dip_date` >= '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$ZDU_10 = mysql_fetch_assoc($sql);
    							$sum_ZDU_10 += $ZDU_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `institution` = '��� ���� �. ������' AND `dip_date` < '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$ZDU_befor_10 = mysql_fetch_assoc($sql);
    							$sum_ZDU_befor_10 += $ZDU_befor_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `institution` <> '��� ���� �. ������' AND `dip_date` >= '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$other_10 = mysql_fetch_assoc($sql);
    							$sum_other_10 += $other_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `institution` <> '��� ���� �. ������' AND `dip_date` < '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$other_befor_10 = mysql_fetch_assoc($sql);
    							$sum_other_befor_10 += $other_befor_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `nationality` <> '������' AND `nationality` <> '��� ������������'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$nationality = mysql_fetch_assoc($sql);
    							$sum_nationality += $nationality["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `apply` = '+' AND `finans` = 'b'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$apply_b = mysql_fetch_assoc($sql);
    							$sum_apply_b += $apply_b["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `apply` = '+' AND `finans` = 'c'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$apply_c = mysql_fetch_assoc($sql);
    							$sum_apply_c += $apply_c["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["stc"][$i]["spec"]."' AND `study_type` = '�����' AND `target` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$target = mysql_fetch_assoc($sql);
    							$sum_target += $target["COUNT(*)"];

                            	$n=$i+1;
                            	echo "
                            	<tr>
                            		<td align=center valign=center>".$n."</td>
                            		<td align=left valign=center>".$spc_list["stc"][$i]["spec"]."</td>
                            		<td align=center valign=center>".$spc_list["stc"][$i]["name"]."</td>
									<td align=center valign=center>".$spc_list["stc"][$i]["license"]."</td>
                            		<td align=center valign=center>".$all["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$derjavne["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$dip_honour["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$benefits["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$invalid["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$syrota["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chornob["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$inozem["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$veteran["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chacht["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$zagybl["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$zasyadka["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chornob34["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$invalid3["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$village["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$city["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$city_zt["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$female["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$ZDU_befor_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$ZDU_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$other_befor_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$other_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$nationality["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$apply_b["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$apply_c["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$target["COUNT(*)"]."</td>
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

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'b'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$derjavne = mysql_fetch_assoc($sql);
    							$sum_derjavne += $derjavne["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `finans` = 'c'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$contract = mysql_fetch_assoc($sql);
    							$sum_contract += $contract["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `dip_honour` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$dip_honour = mysql_fetch_assoc($sql);
    							$sum_dip_honour += $dip_honour["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `benefits` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$benefits = mysql_fetch_assoc($sql);
    							$sum_benefits += $benefits["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `invalid` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$invalid = mysql_fetch_assoc($sql);
    							$sum_invalid += $invalid["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `syrota` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$syrota = mysql_fetch_assoc($sql);
    							$sum_syrota += $syrota["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `chornob` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chornob = mysql_fetch_assoc($sql);
    							$sum_chornob += $chornob["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `inozem` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$inozem = mysql_fetch_assoc($sql);
    							$sum_inozem += $inozem["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `veteran` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$veteran = mysql_fetch_assoc($sql);
    							$sum_veteran += $veteran["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `chacht` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chacht = mysql_fetch_assoc($sql);
    							$sum_chacht += $chacht["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `zagybl` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$zagybl = mysql_fetch_assoc($sql);
    							$sum_zagybl += $zagybl["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `zasyadka` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$zasyadka = mysql_fetch_assoc($sql);
    							$sum_zasyadka += $zasyadka["COUNT(*)"];

								$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `chornob34` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$chornob34 = mysql_fetch_assoc($sql);
    							$sum_chornob34 += $chornob34["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `invalid3` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$invalid3 = mysql_fetch_assoc($sql);
    							$sum_invalid3 += $invalid3["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `location` = 'village'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$village = mysql_fetch_assoc($sql);
    							$sum_village += $village["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `location` = 'city'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$city = mysql_fetch_assoc($sql);
    							$sum_city += $city["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `location` = 'city_zt'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$city_zt = mysql_fetch_assoc($sql);
    							$sum_city_zt += $city_zt["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `sex` = 'female'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$female = mysql_fetch_assoc($sql);
    							$sum_female += $female["COUNT(*)"];

                                $query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `institution` = '��� ���� �. ������' AND `dip_date` >= '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$ZDU_10 = mysql_fetch_assoc($sql);
    							$sum_ZDU_10 += $ZDU_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `institution` = '��� ���� �. ������' AND `dip_date` < '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$ZDU_befor_10 = mysql_fetch_assoc($sql);
    							$sum_ZDU_befor_10 += $ZDU_befor_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `institution` <> '��� ���� �. ������' AND `dip_date` >= '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$other_10 = mysql_fetch_assoc($sql);
    							$sum_other_10 += $other_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `institution` <> '��� ���� �. ������' AND `dip_date` < '".mktime(0,0,0,1,1,date("Y"))."'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$other_befor_10 = mysql_fetch_assoc($sql);
    							$sum_other_befor_10 += $other_befor_10["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `nationality` <> '������' AND `nationality` <> '��� ������������'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$nationality = mysql_fetch_assoc($sql);
    							$sum_nationality += $nationality["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `apply` = '+' AND `finans` = 'b'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$apply_b = mysql_fetch_assoc($sql);
    							$sum_apply_b += $apply_b["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `apply` = '+' AND `finans` = 'c'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$apply_c = mysql_fetch_assoc($sql);
    							$sum_apply_c += $apply_c["COUNT(*)"];

    							$query = "SELECT COUNT(*)  FROM `abiturients` WHERE `date` <='".$date."' AND `speciality` = '".$spc_list["zao"][$i]["spec"]."' AND `study_type` = '������' AND `target` = '+'";
    							$sql = mysql_query($query) or die(mysql_error());
    							$target = mysql_fetch_assoc($sql);
    							$sum_target += $target["COUNT(*)"];

                            	$n=$i+1;
                            	echo "
                            	<tr>
                            		<td align=center valign=center>".$n."</td>
                            		<td align=left valign=center>".$spc_list["zao"][$i]["spec"]."</td>
                            		<td align=center valign=center>".$spc_list["zao"][$i]["name"]."</td>
                            		<td align=center valign=center>".$spc_list["zao"][$i]["license"]."</td>
                            		<td align=center valign=center>".$all["COUNT(*)"]."</td>
                            		<td align=center valign=center>".$derjavne["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$contract["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$dip_honour["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$benefits["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$invalid["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$syrota["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chornob["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$inozem["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$veteran["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chacht["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$zagybl["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$zasyadka["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$chornob34["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$invalid3["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$village["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$city["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$city_zt["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$female["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$ZDU_befor_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$ZDU_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$other_befor_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$other_10["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$nationality["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$apply_b["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$apply_c["COUNT(*)"]."</td>
                                    <td align=center valign=center>".$target["COUNT(*)"]."</td>
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
						<td align=center></td>
						<td align=center><?echo $sum_all;?></td>
						<td align=center><?echo $sum_derjavne;?></td>
						<td align=center><?echo $sum_contract;?></td>
						<td align=center><?echo $sum_dip_honour;?></td>
						<td align=center><?echo $sum_benefits;?></td>
						<td align=center><?echo $sum_invalid;?></td>
						<td align=center><?echo $sum_syrota;?></td>
						<td align=center><?echo $sum_chornob;?></td>
						<td align=center><?echo $sum_inozem;?></td>
						<td align=center><?echo $sum_veteran;?></td>
						<td align=center><?echo $sum_chacht;?></td>
						<td align=center><?echo $sum_zagybl;?></td>
						<td align=center><?echo $sum_zasyadka;?></td>
						<td align=center><?echo $sum_chornob34;?></td>
						<td align=center><?echo $sum_invalid3;?></td>
						<td align=center><?echo $sum_village;?></td>
						<td align=center><?echo $sum_city;?></td>
						<td align=center><?echo $sum_city_zt;?></td>
						<td align=center><?echo $sum_female;?></td>
						<td align=center><?echo $sum_ZDU_befor_10;?></td>
						<td align=center><?echo $sum_ZDU_10;?></td>
						<td align=center><?echo $sum_other_befor_10;?></td>
						<td align=center><?echo $sum_other_10;?></td>
						<td align=center><?echo $sum_nationality;?></td>
						<td align=center><?echo $sum_apply_b;?></td>
						<td align=center><?echo $sum_apply_c;?></td>
						<td align=center><?echo $sum_target;?></td>
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