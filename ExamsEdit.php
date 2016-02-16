<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");
include ("MySQL/MysqlConnect.php");

if (!isset($_SESSION["login"]))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}


if (isset($_GET["id"]))
	{//�������� ��o�������� ������ ��������� � ���������� ��� �����������
	$query="SELECT `operator` , `lastname` , `firstname` , `patronymic` , `speciality` , `study_type` FROM `abiturients` WHERE `ab_id`='".$_GET["id"]."' LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());
    	if (mysql_num_rows($sql)==1)
    		{
    		$row=mysql_fetch_assoc($sql);
    		$success='<h1 class="block" style="background:rgb(137,170,214)">
    						'.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'<br />
    						C�����������: &bdquo;'.$row["speciality"].'&ldquo; <br />'.$row["study_type"].' ����� ��������</h1>';
            $speciality=$row["speciality"];
    		if ($_SESSION['status']!="root" && $_SESSION['status']!="admin")
            	{
            	if ($row['operator']!=$_SESSION["user_id"])
            		{
					print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
					exit();
					}
				}
			}
		else
			{
			print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
			exit();
			}

	}
	else
		{
		print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
		exit();
		}


		$query="SELECT  `bal1` , `bal2` , `bal3` , `dip_average` , `cross_enter` FROM `abiturients` WHERE `ab_id`='".$_GET["id"]."'";
    	$sql = mysql_query($query) or die(mysql_error());
    	if (mysql_num_rows($sql)>0)
    		{
        	while ($row = mysql_fetch_assoc($sql))
   				{
   				$cross_enter = $row["cross_enter"];
   				$bal1= $row["bal1"];
   				$bal2= $row["bal2"];
   				$bal3= $row["bal3"];
   				$dip = $row["dip_average"] ;


            	}
            }

if (!isset($_POST['set_exams'])) {
	if ($cross_enter == '-') {
		$_POST["exam_mark1"] = $bal1 / 2;
	} else {
		$_POST["exam_mark1"] = $bal1;
	}
	$_POST["exam_mark2"] = $bal2;
	$_POST["exam_mark3"] = $bal3;
	if ($dip != 0) $_POST["dip_average"] = $dip;
}

if (isset($_POST["set_exams"])) {
	if ($_POST["exam_mark1"] != "") {
		if ($cross_enter == '-') {
			$bal1 = $_POST["exam_mark1"] * 2;
		} else {
			$bal1 = $_POST["exam_mark1"];
		}
	}
	if ($_POST["exam_mark2"] != "") {
		$bal2 = $_POST["exam_mark2"];
	}
	if ($_POST["exam_mark3"] != "") {
		$bal3 = $_POST["exam_mark3"];
	}
	if ($_POST["dip_average"] != "") {
		$avg = $_POST["dip_average"];
	}

	$query="UPDATE `abiturients` SET `bal1` =  '".$bal1."' , `bal2` =  '".$bal2."' , `bal3` =  '".$bal3."'  , `dip_average` = '".$avg."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
	$sql = mysql_query($query) or die(mysql_error());
	$success='<h1 class="block"> ���������� ����Ҳ� ��ϲ��� ������Ͳ �� ����! </h1>';
	print "<meta http-equiv=\"Refresh\" content=\"1;URL=MainPage.php?page=".$_SESSION["page"]."\">";
	}
?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">���������� �������� ������</h1>
					<div class="column1-unit">
          				<?echo $success;
          				include ("Parts/FormExams.php");
          				?>
					</div>
            		<hr class="clear-contentunit" />
            	</div>
        	</div>

<?php
include ("Parts/Footer.php");
?>
