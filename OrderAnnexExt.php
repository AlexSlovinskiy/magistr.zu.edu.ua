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
  	<title>Додаток до наказу (розширена версія)</title>
</head>
<?php
include ("MySQL/MysqlConnect.php");
include ("Parts/SpecialityList.php");
if ($_SESSION['status']!="admin" && $_SESSION['status']!="root")
 	{
 	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
 	}
?>

<body>
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">Додаток до наказу про зарахування (розширений)</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="Друкувати" class="button" onClick="printpage()"/>
					<input type="button" value="Назад" class="button" onClick="window.location.href = 'AdminPage.php' "/>
					</p>
				</form>
			</div>
            <div class="column1-unit">
				<p class="caption">
                <a href="OrderAnnexExt.php?fin=b">Бюджет</a>
                <a href="OrderAnnexExt.php?fin=c" style="margin-left:20px;">Контракт</a>
				</p>
			</div>
<?php
	$j=1; $k=1;
	if ($_GET["fin"]=='b') $finans='b';
		else if ($_GET["fin"]=='c') $finans='c';
			else $finans='b';
?>
		<br/>
		<table align=center width="900px" class="examsblank" cellspacing=0 cellpadding=0 border=0>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:10px;" align=center><strong>ЖИТОМИРСЬКИЙ ДЕРЖАВНИЙ УНІВЕРСИТЕТ ІМЕНІ ІВАНА ФРАНКА</strong></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:10px;" align=center><strong>НАКАЗ</strong></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:15px;" align=center><strong>Про зарахування за освітньо-кваліфікаційним рівнем "магістр”  та "спеціаліст" денної та заочної форм навчання
							<?if ($finans=='b') echo"на місця державного замовлення";
							if ($finans=='c') echo"за кошти фізичних та юридичних осіб";
							?> </strong></td>
			</tr>
			<tr>
				<table align=center width="1000px" class="exams" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<tr>
                    	 <td align=center colspan="2">№ з.п</td>
                    	 <td align=center>ПІБ</td>
                    	 <td align=center>Спеціальність</td>
                    	 <td align=center>Попередня <br />кв-ція</td>
                    	 <td align=center>ВНЗ</td>
                    	 <td align=center>Дата <br /> видачі <br />дипллома</td>
                    	 <td align=center>Іноз. мова</td>
                    	 <td align=center>Пільги</td>
                    	 <td align=center>Вік на <br /> дату подання <br /> док-тів</td>
                    	 <td align=center>Дата <br /> народження</td>
					</tr>
					<tr>
                    	<td align=center colspan="11"><strong>Денна форма навчання</strong></td>
                    </tr>
					<?php
						for ($i=0; $i<count($spc_list["stc"]); $i++)
							{							$query="SELECT * FROM abiturients
											WHERE
											speciality = '".$spc_list["stc"][$i]["spec"]."' AND
											study_type = 'Денна' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-' AND
											finans = '".$finans."'
												ORDER BY specialization ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{								echo "<tr><td align=center colspan='11'>&bdquo;".$spc_list["stc"][$i]["spec"]."&ldquo;</td></tr>";
								while ($row = mysql_fetch_assoc($sql))
									{                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                    echo "<td align=left>".$row["specialization"]."</td>";
                                    echo "<td align=center>".$row["qualification"]."</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == 'ЖДУ імені І. Франка') echo "ЖДУ</td>"; else echo "Інший</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td></td>";
                                    if ($row['invalid']=='+') echo "<td align=center>Інв. І-ІІ гр.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>Діти-сироти</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>Чорноб І-ІІ кат.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>Міжн. обмін</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>Ветер. війни</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>Шахт. праця</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>Діти загибл. військ.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>Засядьк.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
                                    $j++; $k++;
                                    }
								}
							$k=1;
							}
                        for ($i=0; $i<count($mag_list["stc"]); $i++)
							{
							$query="SELECT * FROM abiturients
											WHERE
											speciality = '".$mag_list["stc"][$i]["spec"]."' AND
											study_type = 'Денна' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-' AND
											finans = '".$finans."'
												ORDER BY specialization ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								echo "<tr><td align=center colspan='11'>&bdquo;".$mag_list["stc"][$i]["spec"]."&ldquo;</td></tr>";
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                    echo "<td></td>";
                                    echo "<td align=center>".$row["qualification"]."</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == 'ЖДУ імені І. Франка') echo "ЖДУ</td>"; else echo "Інший</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td align=center>".$row["language"]."</td>";
                                    if ($row['invalid']=='+') echo "<td align=center>Інв. І-ІІ гр.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>Діти-сироти</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>Чорноб І-ІІ кат.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>Міжн. обмін</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>Ветер. війни</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>Шахт. праця</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>Діти загибл. військ.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>Засядьк.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
									$j++; $k++;
									}
								}
							$k=1;
							}
					?>
                    <tr>
                    	<td align=center colspan="11"><strong>Заочна форма навчання</strong></td>
                    </tr>
					<?php
						for ($i=0; $i<count($spc_list["zao"]); $i++)
							{
							$query="SELECT * FROM abiturients
											WHERE
											speciality = '".$spc_list["zao"][$i]["spec"]."' AND
											study_type = 'Заочна' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-' AND
											finans = '".$finans."'
												ORDER BY specialization ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								echo "<tr><td align=center colspan='11'>&bdquo;".$spc_list["zao"][$i]["spec"]."&ldquo;</td></tr>";
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                   	echo "<td align=left>".$row["specialization"]."</td>";
                                   	echo "<td align=center>".$row["qualification"]."</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == 'ЖДУ імені І. Франка') echo "ЖДУ</td>"; else echo "Інший</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td></td>";
                                    if ($row['invalid']=='+') echo "<td align=center>Інв. І-ІІ гр.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>Діти-сироти</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>Чорноб І-ІІ кат.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>Міжн. обмін</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>Ветер. війни</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>Шахт. праця</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>Діти загибл. військ.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>Засядьк.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
                                    $j++; $k++;
                                    }
								}
							$k=1;
							}
                        for ($i=0; $i<count($mag_list["zao"]); $i++)
							{
							$query="SELECT * FROM abiturients
											WHERE
											speciality = '".$mag_list["zao"][$i]["spec"]."' AND
											study_type = 'Заочна' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-' AND
											finans = '".$finans."'
												ORDER BY specialization ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								echo "<tr><td align=center colspan='11'>&bdquo;".$mag_list["zao"][$i]["spec"]."&ldquo;</td>";
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                    echo "<td></td>";
                                    echo "<td align=center>".$row["qualification"]."</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == 'ЖДУ імені І. Франка') echo "ЖДУ</td>"; else echo "Інший</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td align=center>".$row["language"]."</td>";
                                    if ($row['invalid']=='+') echo "<td align=center>Інв. І-ІІ гр.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>Діти-сироти</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>Чорноб І-ІІ кат.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>Міжн. обмін</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>Ветер. війни</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>Шахт. праця</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>Діти загибл. військ.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>Засядьк.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
                                    $j++; $k++;
									}
								}
							$k=1;
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