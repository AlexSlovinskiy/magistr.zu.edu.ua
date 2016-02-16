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
  	<title>Список до наказу про зарахування</title>
</head>
<?php
include ("MySQL/MysqlConnect.php");
include ("Parts/SpecialityList.php");
?>

<body>
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">Список до наказу про зарахування</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="Друкувати" class="button" onClick="printpage()"/>
					<input type="button" value="Назад" class="button" onClick="window.location.href = 'AdminPage.php' "/>
					</p>
				</form>
			</div>

		<br/>
		<table align=center width="900px" class="examsblank" cellspacing=0 cellpadding=0 border=0>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:10px;" align=right><strong>Список</strong></td>
			</tr>

			<tr>
				<table align=center width="1000px" class="exams" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<tr>
                    	 <td align=center>№ з.п</td>
                    	 <td align=center>Шифр</td>
                    	 <td align=center>ПІБ</td>
                    	 <td align=center>Спеціальність</td>
                    </tr>

					<?php
						$j=1;
						for ($i=0; $i<count($spc_list["stc"]); $i++)
							{							$query="SELECT * FROM abiturients
											WHERE
											speciality = '".$spc_list["stc"][$i]["spec"]."' AND
											study_type = 'Денна' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-' AND
											finans = 'c'
												ORDER BY specialization ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{								while ($row = mysql_fetch_assoc($sql))
									{                                    echo "<tr><td align=center>".$j.".</td>";
                                    echo "<td align=left>".$row["ab_id"]."</td>";
                                    echo "<td align=left>".$row["lastname"];
                                    echo " ".$row["firstname"];
                                    echo " ".$row["patronymic"]."</td>";
                                    echo "<td align=left>".$row["speciality"]."</td></tr>";
                                    $j++;
                                    }
								}
							}
						for ($i=0; $i<count($spc_list["zao"]); $i++)
							{
							$query="SELECT * FROM abiturients
											WHERE
											speciality = '".$spc_list["zao"][$i]["spec"]."' AND
											study_type = 'Заочна' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-' AND
											finans = 'c'
												ORDER BY specialization ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td>";
                                    echo "<td align=left>".$row["ab_id"]."</td>";
                                    echo "<td align=left>".$row["lastname"];
                                    echo " ".$row["firstname"];
                                    echo " ".$row["patronymic"]."</td>";
                                    echo "<td align=left>".$row["speciality"]."</td></tr>";
                                    $j++;
                                    }
								}
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
											finans = 'c'
												ORDER BY specialization ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td>";
                                    echo "<td align=left>".$row["ab_id"]."</td>";
                                    echo "<td align=left>".$row["lastname"];
                                    echo " ".$row["firstname"];
                                    echo " ".$row["patronymic"]."</td>";
                                    echo "<td align=left>".$row["speciality"]."</td></tr>";
                                    $j++;
									}
								}
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
											finans = 'c'
												ORDER BY specialization ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td>";
                                    echo "<td align=left>".$row["ab_id"]."</td>";
                                    echo "<td align=left>".$row["lastname"];
                                    echo " ".$row["firstname"];
                                    echo " ".$row["patronymic"]."</td>";
                                    echo "<td align=left>".$row["speciality"]."</td></tr>";
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