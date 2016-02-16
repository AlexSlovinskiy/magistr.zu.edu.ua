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
  	<title>Відомість надходження заяв</title>
</head>
<?php
include ("MySQL/MysqlConnect.php");

if ($_POST["search_study_type"]=="Денна") $study_type="Денна";
	else if ($_POST["search_study_type"]=="Заочна") $study_type="Заочна";
		else $study_type="%";
if ($_POST["search_faculty"]!="") $faculty=$_POST["search_faculty"];
	else $faculty="%";
if ($_POST["search_training"]!="") $training=$_POST["search_training"];
	else $training="%";

$_SESSION['search_reg_faculty']=$faculty;
$_SESSION['search_reg_training']=$training;
$_SESSION['search_reg_study_type']=$study_type;

/*echo"<pre>";
print_r($_SESSION);
echo"</pre>";
*/?>
<body>
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">Список замовлення на виготовлення дипломів бакалавра</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="Друкувати" class="button" onClick="printpage()"/>
					<input type="button" value="Назад" class="button" onClick="window.location.href = 'AdminSpaceRegistredList.php' "/>
					</p>
				</form>
			</div>


		<br/>
		<table align=center width="900px" cellspacing=0 cellpadding=0 border=0>
			<tr style="font-family:times;font-size:24px;">
				<td style="border:none; padding-top:15px;" align=center><strong>П І Д Т В Е Р Д Ж Е Н Н Я<br /></strong></td>
			</tr>
			<tr style="font-family:times;font-size:24px;">
				<td style="border:none;padding-top:15px;" align=center>замовлення на виготовлення дипломів бакалавра</td>
			</tr>
			<tr style="font-family:times;font-size:24px;">
				<td style="border:none;padding-top:5px;" align=center>Житомирський державний університет імені Івана Франка</td>
			</tr>
            <tr style="font-family:times;font-size:24px;">
				<td style="border:none; padding-top:15px;" align=left>Факультет: <?php echo $faculty?></td>
			</tr>
			<tr style="font-family:times;font-size:24px;">
				<td style="border:none;" align=left>Напрям підготовки: <?php echo $training?></td>
			</tr>
			<tr style="font-family:times;font-size:24px;">
				<td style="border:none;padding-bottom:15px;" align=left>Форма навчання: <?php echo $study_type?></td>
			</tr>
			<tr>
				<table align=center width="900px" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<tr style='font-family:times;font-size:20px;font-weight:bold;'>
                    	<td align=center rowspan=2>№ з/п</td>
                        <td align=center rowspan=2>Прізвище, ім'я, по батькові випускника</td>
                        <td align=center rowspan=2>Стать</td>
                        <td align=center rowspan=2>Дата <br />народж.</td>
                        <td align=center colspan=3>Документ, що засвідчує особу</td>
                        <td align=center rowspan=2>Примітка</td>
					</tr>
					<tr style='font-family:times;font-size:20px;font-weight:bold;'>
                    	<td align=center>Тип</td>
                    	<td align=center>Серія</td>
                        <td align=center>Номер</td>
                    </tr>

					<?php
                    $query = "SELECT * FROM `Registred` WHERE
                    								`faculty` LIKE '".$faculty."' AND
                    								`training` LIKE '".$training."' AND
                    								`study_type` LIKE '".$study_type."'
                    								ORDER BY `lastname`";

    				$sql = mysql_query($query) or die(mysql_error());

                    if (mysql_num_rows($sql)>0)
   						{
   						$i=1;
   						while ($row = mysql_fetch_assoc($sql))
   							{
                            echo "<tr style='font-family:times;font-size:20px;'>";
                            echo "<td align=center>".$i."</td>";
                            echo "<td>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                            if ($row["sex"]=="male") echo "<td align=center>чол.</td>";
                            if ($row["sex"]=="female") echo "<td align=center>жін.</td>";
                            echo "<td align=center>".date("d.m.Y", $row["birth_date"])."</td>";
                            echo "<td align=center>П</td>";
                            echo "<td align=center>".$row["pasp_serial"]."</td>";
                            echo "<td align=center>".$row["pasp_number"]."</td>";
                            if ($row["finans"]=="Контракт") echo "<td align=center>К</td>";
                            if ($row["finans"]=="Бюджет") echo "<td align=center>Б</td>";
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