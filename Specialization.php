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
  	<title>Розподіл за спеціалізаціями</title>
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
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">Розподіл за спеціалізаціями</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="Друкувати" class="button" onClick="printpage()"/>
					<input type="button" value="Назад" class="button" onClick="window.location.href = 'AdminPage.php' "/>
					</p>
				</form>
			</div>


		<br/>
<table align=center width="900px" cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td style="border:none;">
			<p style="font-family:times;font-size:16px;font-weight:bold;" align=center>Денна форма</p>
		</td>
	</tr>
	<tr>
		<table align=center cellspacing=0 cellpadding=0 border=1 width=900>
			<tr>
			<td align=center valign=center width=25>№</td>
			<td align=center valign=center>Спеціалізація</td>
			<td align=center valign=center>Кількість <br>угод та договорів</td>
		</tr>


<?php
	$query = "SELECT `specialization`, COUNT(*) FROM `abiturients` WHERE ((`pact`='d' OR `pact`='y') AND `specialization`<>'' AND `study_type` = 'Денна' AND `take_away` <> '+') GROUP BY `specialization`";
    	$sql = mysql_query($query) or die(mysql_error());
		$i=1;
		if (mysql_num_rows($sql)>0)
   			{
   			while ($row = mysql_fetch_assoc($sql))
   				{
            	echo "<tr>";
                echo "<td>".$i.".</td>";
                echo "<td>".$row["specialization"]."</td>";
                echo "<td align=center>".$row["COUNT(*)"]."</td></tr>";
                $i++;
				}
			}

?>

		</table>
	</tr>
<br><br>
<table align=center width="900px" cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td style="border:none;">
			<p style="font-family:times;font-size:16px;font-weight:bold;" align=center>Заочна форма</p>
		</td>
	</tr>
	<tr>
		<table align=center cellspacing=0 cellpadding=0 border=1 width=900>
			<tr>
				<td align=center valign=center width=25>№</td>
				<td align=center valign=center>Спеціалізація</td>
				<td align=center valign=center>Кількість <br>угод та договорів</td>
			</tr>


<?php
	$query = "SELECT `specialization`, COUNT(*) FROM `abiturients` WHERE ((`pact`='d' OR `pact`='y') AND `specialization`<>'' AND `study_type` = 'Заочна' AND `take_away` <> '+') GROUP BY `specialization`";


$sql = mysql_query($query) or die(mysql_error());
		$i=1;
		if (mysql_num_rows($sql)>0)
   			{
   			while ($row = mysql_fetch_assoc($sql))
   				{
            	echo "<tr>";
                echo "<td>".$i.".</td>";
                echo "<td>".$row["specialization"]."</td>";
                echo "<td align=center>".$row["COUNT(*)"]."</td></tr>";
                $i++;
				}
			}

?>

		</table>
	</tr>

	<script type="text/javascript">
		function printpage()
			{
			window.print();
			}
	</script>


</body>
</html>