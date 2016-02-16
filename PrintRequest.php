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
  	<title>Друк заяви абітурієнта, екзаменаційного листка, угоди або договору</title>
</head>
<?php
//print_r($_SESSION);
include ("MySQL/MysqlConnect.php");

$months=array("01"=>"січня", "02"=>"лютого", "03"=>"березня", "04"=>"квітня", "05"=>"травня", "06"=>"червня", "07"=>"липня", "08"=>"серпня", "09"=>"вересня", "10"=>"жовтня", "11"=>"листопада", "12"=>"грудня");

if (!isset($_GET["print"])) $_GET["print"]=0;
$id=intval($_GET['id']);
if ($id<1 || !isset($_SESSION['login']))
 	{
 	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
 	}

// делаем запрос к БД и ищем соответствие юзера абитуриенту
if ($_SESSION['status']=="user")
	{
	$query = "SELECT * FROM `abiturients` WHERE `ab_id`='".$id."' AND `operator` = '".$_SESSION["user_id"]."' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql) == 1)
  		{
  		$row = mysql_fetch_assoc($sql);
  		}
  	else
  		{
  		print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
		exit();
  		}
  	}

	$query = "SELECT * FROM `abiturients` WHERE `ab_id` = '".$id."'";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql) == 1)
		{		$row = mysql_fetch_assoc($sql);
		if ($_GET['print']==3 || $_GET['print']==4)
			{			$query1 = "SELECT * FROM `specialities` WHERE `speciality_name` = '".$row["speciality"]."'";
			$sql1 = mysql_query($query1) or die(mysql_error());
			if (mysql_num_rows($sql1) == 1) $row1 = mysql_fetch_assoc($sql1);

			$query1 = "SELECT `training_name` FROM `trainings`";
			$sql1 = mysql_query($query1) or die(mysql_error());
			if (mysql_num_rows($sql1) > 0)
				while ($row_tr = mysql_fetch_assoc($sql1))
					{					$trainings[substr($row_tr['training_name'],0,4)]=$row_tr['training_name'];
					}
			}
		}

/*echo '<pre>';
print_r($_SESSION);
print_r($_POST);
print_r($trainings);
echo '</pre>';*/

?>
<body>
	<div class="main">
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">Друк заяви абітурієнта, екзаменаційного листка, угоди або договору</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="Друкувати" class="button" onClick="printpage()"/>
					<input type="button" value="Назад" class="button" onClick="window.location.href = 'MainPage.php' "/>
					</p>
				</form>
			</div>
			<div class="column1-unit">
				<p class="caption">
                	<span style="color: rgb(80, 80, 80); font-weight: bold;">Абітурієнт: <?php echo $row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]?> </span>
                	<a href="PatternGenRequest.php?id=<?php echo $id;?>" target="_blank" style="margin-left:20px; <?php if ($_GET['print']==1) echo 'font-size:115%; color:rgb(98,143,23);'?>">Заява</a>
                	<a href="PatternExamsCard.php?id=<?php echo $id;?>" target="_blank" style="margin-left:20px; <?php if ($_GET['print']==2) echo 'font-size:115%; color:rgb(98,143,23);'?>">Екз.листок</a>
                	<?php
                		if ($row['finans']=="b")
                			{                			if ($_GET['print']==3) echo '<a href="PatternGenAgreement.php?id='.$id.'" style="margin-left:20px; font-size:115%; color:rgb(98,143,23);">Угода</a>';
                				else echo '<a href="PatternGenAgreement.php?id='.$id.'" style="margin-left:20px;">Угода</a>';
                			}
                		if ($row['finans']=="c")
                			{                			if ($_GET['print']==4) echo '<a href="PatternGenPact.php?id='.$id.'" style="margin-left:20px; font-size:115%; color:rgb(98,143,23);">Договір</a>';
                				else echo '<a href="PatternGenPact.php?id='.$id.'" style="margin-left:20px;">Договір</a>';
                			}
                	?>
				</p>
			</div>


		<br/>
		<?php
			if (1==intval($_GET["print"])) print "<meta http-equiv=\"Refresh\" content=\"0;URL=PatternGenRequest.php\">";
			if (3==intval($_GET["print"])) print "<meta http-equiv=\"Refresh\" content=\"0;URL=PatternGenAgreement.php\">";
			if (4==intval($_GET["print"])) print "<meta http-equiv=\"Refresh\" content=\"0;URL=PatternGenPact.php\">";
			//if (3==intval($_GET["print"])) include ("Parts/PatternAgreement.php");
			//if (4==intval($_GET["print"])) include ("Parts/PatternPact.php");
			if (2==intval($_GET["print"])) print "<meta http-equiv=\"Refresh\" content=\"0;URL=PatterExamsCard.php\">";
		?>

	</div>
	</div>
	<script type="text/javascript">
		function printpage()
			{
			window.print();
			}
	</script>


</body>
</html>