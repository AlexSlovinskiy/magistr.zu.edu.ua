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
  	<title>������� �� ���������������</title>
</head>
<?php
include ("MySQL/MysqlConnect.php");
//include ("Parts/SpecialityList.php");
if ($_SESSION['status']!="admin" && $_SESSION['status']!="root")
 	{
 	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
 	}
?>

<body>
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">������� �� ��������������� (������� ��������� ��������)</h1>
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
		<table align=center cellspacing=0 cellpadding=0 border=1 width=900>
		<tr>
			<td align=center valign=center width=25 colspan="7">������ ���������</td>
		</tr>
		<tr>
			<td align=center valign=center width=25>�</td>
			<td align=center valign=center>������������</td>
			<td align=center valign=center>�����</td>
			<td align=center valign=center>������</td>
			<td align=center valign=center>������</td>
		</tr>


<?php
	//������� ���� ��������������
	$query1 = "SELECT * FROM `specialities` ORDER BY `speciality_name`";
	$sql1 = mysql_query($query1) or die(mysql_error());
   	if (mysql_num_rows($sql1)>0)
   	$i=1;
	while ($spc = mysql_fetch_assoc($sql1))
		{

			echo "<tr>";
			echo "<td align='center'>".$i."</td>";
            echo "<td>".$spc['speciality_name']."</td>";

			$query = "SELECT SQL_CALC_FOUND_ROWS DISTINCT `lastname` , `firstname` , `patronymic` , `pasp_number` FROM `abiturients` WHERE `speciality` = '".$spc['speciality_name']."' AND `study_type`='�����' ";
			$sql = mysql_query($query) or die(mysql_error());
			$sql_rows= mysql_query("SELECT FOUND_ROWS()") or die(mysql_error());
   			$num_of_rows=mysql_fetch_assoc($sql_rows);
   			$num_of_rows=$num_of_rows["FOUND_ROWS()"];
    		echo "<td align='center'>".$num_of_rows."</td>";

    		$query = "SELECT SQL_CALC_FOUND_ROWS DISTINCT `lastname` , `firstname` , `patronymic` , `pasp_number` FROM `abiturients` WHERE `speciality` = '".$spc['speciality_name']."' AND `study_type`='������' ";
			$sql = mysql_query($query) or die(mysql_error());
			$sql_rows= mysql_query("SELECT FOUND_ROWS()") or die(mysql_error());
   			$num_of_rows=mysql_fetch_assoc($sql_rows);
   			$num_of_rows=$num_of_rows["FOUND_ROWS()"];
   			echo "<td align='center'>".$num_of_rows."</td>";

    		$query = "SELECT SQL_CALC_FOUND_ROWS DISTINCT `lastname` , `firstname` , `patronymic` , `pasp_number` FROM `abiturients` WHERE `speciality` = '".$spc['speciality_name']."' ";
			$sql = mysql_query($query) or die(mysql_error());
			$sql_rows= mysql_query("SELECT FOUND_ROWS()") or die(mysql_error());
   			$num_of_rows=mysql_fetch_assoc($sql_rows);
   			$num_of_rows=$num_of_rows["FOUND_ROWS()"];
    		echo "<td align='center'>".$num_of_rows."</td>";
			echo "</tr>";

		   	$i++;
		}

?>
        <tr></tr>
 		</table>

	<script type="text/javascript">
		function printpage()
			{
			window.print();
			}
	</script>


</body>
</html>