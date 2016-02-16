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
  	<title>Додаток до наказу форма № Н-1.12.2</title>
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
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">Додаток до наказу про зарахування форма № Н-1.12.2</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="Друкувати" class="button" onClick="printpage()"/>
					<input type="button" value="Назад" class="button" onClick="window.location.href = 'AdminPage.php' "/>
					</p>
				</form>
			</div>

<?php

if ($_POST["search_study_type"]!='') $_SESSION['search_study_type']=$_POST["search_study_type"];
if ($_POST["search_finance"]!='') $_SESSION['search_finance']=$_POST["search_finance"];

if ($_POST["search_study_type"]=='Денна') $study_type="stc";
if ($_POST["search_study_type"]=='Заочна') $study_type="zao";

?>
		<br/>
		<table align=center width="900px" class="examsblank" cellspacing=0 cellpadding=0 border=0>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:10px;" align=right><strong>Форма № Н-1.12.2</strong></td>
			</tr>

			<tr>
				<table align=center width="1000px" class="exams" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<tr>
                    	 <td align=center>№ з.п</td>
                    	 <td align=center>Спеціальність</td>
                    	 <td align=center>Прізвище</td>
                    	 <td align=center>Ім'я</td>
                    	 <td align=center>По батькові</td>
                    	 <td align=center>Серія<br />док-та</td>
                    	 <td align=center>Номер<br />док-та</td>
                    	 <td align=center>Код<br />док-та</td>
                    	 <td align=center>Фаховий<br />іспит</td>
                    	 <td align=center>Іноземна<br />мова</td>
                    	 <td align=center>Сума<br />балів</td>
                    	 <td align=center>Середній бал<br />дипллома</td>
                    	 <td align=center>Загальна<br />сума</td>
                    	 <td align=center>Код<br />пільги</td>
                    	 <td align=center>Спец.<br />звання</td>
					</tr>
					<tr>
						<?php for ($i=1; $i<=15; $i++) echo '<td align=center>'.$i.'</td>' ?>
					</tr>
					<tr>
                    	<td align=center colspan="15">
                    		<strong><?php echo $_POST["search_study_type"]?> форма навчання</strong>
                    		<strong>
                    				<?php if ($_POST["search_finance"]=='b') echo "за державним замовленням";
                    					  if ($_POST["search_finance"]=='c') echo "за рахунок коштів фізичних, юридичних осіб";
                    				?>
                    		</strong>
                    	</td>
                    </tr>
					<?php
						$j=1;
						for ($i=0; $i<count($spc_list[$study_type]); $i++)
							{							$query="SELECT * FROM abiturients
											WHERE
											speciality = '".$spc_list[$study_type][$i]["spec"]."' AND
											study_type = '".$_POST["search_study_type"]."' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-' AND
											finans = '".$_POST["search_finance"]."'
												ORDER BY specialization ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{								while ($row = mysql_fetch_assoc($sql))
									{                                    echo "<tr><td align=center>".$j.".</td>";
                                    echo "<td align=left>".$row["speciality"]."</td>";
                                    echo "<td align=left>".$row["lastname"]."</td>";
                                    echo "<td align=left>".$row["firstname"]."</td>";
                                    echo "<td align=left>".$row["patronymic"]."</td>";
                                    echo "<td align=center>".$row["dip_serial"]."</td>";
                                    echo "<td align=center>".$row["dip_number"]."</td>";
                                    echo "<td align=center></td>";
                                    echo "<td align=center>".$row["bal1"]."</td>";
                                    echo "<td align=center>";
                                    if ($row["bal2"]>0) echo $row["bal2"];
                                    echo "</td>";
                                    $sum=$row["bal1"]+$row["bal2"];
                                    echo "<td align=center>".$sum."</td>";
                                    echo "<td align=center>".$row["dip_average"]."</td>";
                                    $sum=$row["bal1"]+$row["bal2"]+$row["dip_average"];
									echo "<td align=center>".$sum."</td>";
									echo"<td align=center>";
                                    if ($row['invalid']=='+') echo "Інв. І-ІІ гр.";
                                    if ($row['syrota']=='+') echo "Діти-сироти";
                                    if ($row['chornob']=='+') echo "Чорноб І-ІІ кат.";
                                    if ($row['inozem']=='+') echo "Міжн. обмін";
                                    if ($row['veteran']=='+') echo "Ветер. війни";
                                    if ($row['chacht']=='+') echo "Шахт. праця";
                                    if ($row['zagybl']=='+') echo "Діти загибл. військ.";
                                    if ($row['zasyadka']=='+') echo "Засядьк.";
                                    if ($row['benefits']=='-') echo "-";
                                    echo "</td>";
                                    echo "<td align=center></td>";
                                    echo "</tr>";
                                    $j++;
                                    }
								}
							}
                        for ($i=0; $i<count($mag_list[$study_type]); $i++)
							{
							$query="SELECT * FROM abiturients
											WHERE
											speciality = '".$mag_list[$study_type][$i]["spec"]."' AND
											study_type = '".$_POST["search_study_type"]."' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-' AND
											finans = '".$_POST["search_finance"]."'
												ORDER BY specialization ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td>";
                                    echo "<td align=left>".$row["speciality"]."</td>";
                                    echo "<td align=left>".$row["lastname"]."</td>";
                                    echo "<td align=left>".$row["firstname"]."</td>";
                                    echo "<td align=left>".$row["patronymic"]."</td>";
                                    echo "<td align=center>".$row["dip_serial"]."</td>";
                                    echo "<td align=center>".$row["dip_number"]."</td>";
                                    echo "<td align=center></td>";
                                    echo "<td align=center>".$row["bal1"]."</td>";
                                    echo "<td align=center>";
                                    if ($row["bal2"]>0) echo $row["bal2"];
                                    echo "</td>";
                                    $sum=$row["bal1"]+$row["bal2"];
                                    echo "<td align=center>".$sum."</td>";
                                    echo "<td align=center>".$row["dip_average"]."</td>";
                                    $sum=$row["bal1"]+$row["bal2"]+$row["dip_average"];
									echo "<td align=center>".$sum."</td>";
									echo"<td align=center>";
                                    if ($row['invalid']=='+') echo "Інв. І-ІІ гр.";
                                    if ($row['syrota']=='+') echo "Діти-сироти";
                                    if ($row['chornob']=='+') echo "Чорноб І-ІІ кат.";
                                    if ($row['inozem']=='+') echo "Міжн. обмін";
                                    if ($row['veteran']=='+') echo "Ветер. війни";
                                    if ($row['chacht']=='+') echo "Шахт. праця";
                                    if ($row['zagybl']=='+') echo "Діти загибл. військ.";
                                    if ($row['zasyadka']=='+') echo "Засядьк.";
                                    if ($row['benefits']=='-') echo "-";
                                    echo "</td>";
                                    echo "<td align=center></td>";
                                    echo "</tr>";
                                    $j++;
									}
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