<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");
include ("MySQL/MysqlConnect.php");

if (!isset($_SESSION["login"]))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}

	if (isset($_POST['add_fac']))
		{
		$error=0;		if ($_POST["faculty"]!="") $faculty=mysql_real_escape_string($_POST["faculty"]); else $error++;
		//проверка введенных данных
        if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> ЗАПОВНІТЬ ПРОПУЩЕНІ ПОЛЯ, ЩО ПОЗНАЧЕНІ ЧЕРВОНИМ КОЛЬОРОМ!</h1>';
			}
		if ($error==0)
			{			//проверка наличия такого же фак-та
			$query="SELECT * FROM `faculties`
					WHERE `faculty_name`='".$faculty."'";
    		$sql = mysql_query($query) or die(mysql_error());
    		if (mysql_num_rows($sql)>0)
    			{
    			$success='<h1 class="block" style="background:rgb(212,12,12)"> &bdquo;'.$faculty.'&ldquo; факультет вже є в базі!</h1>';
    			}
    		else
    			{				$query = "INSERT INTO `faculties`
						( `faculty_name` )
				VALUES ('".$faculty."')";

   				$sql = mysql_query($query) or die(mysql_error());
				$success='<h1 class="block"> ФAКУЛЬТЕТ УСПІШНО ЗАНЕСЕНО ДО БАЗИ ДАНИХ!</h1>';
				unset($_POST);
				}
			}

        }

   if (isset($_POST['del_fac']))
   		{   		$error=0;        if ($_POST["del_faculty"]!="") $faculty=mysql_real_escape_string($_POST["del_faculty"]); else $error++;
        if ($_POST["del_fac_ok"]!="+") $error++;
   		if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> ВИБЕРІТЬ ФАКУЛЬТЕТ ТА ПІДТВЕРДІТЬ ВИДАЛЕННЯ!</h1>';
			}
        if ($error==0)
			{			//удаляем факультет			$query = "DELETE FROM `faculties` WHERE `faculty_name` = '".$faculty."' LIMIT 1";
			$sql = mysql_query($query) or die(mysql_error());
            //удаляем по связанным специальностям специализации
			$query = "SELECT `speciality_name` FROM `specialities` WHERE `faculty` = '".$faculty."' ";
			$sql = mysql_query($query) or die(mysql_error());
			if (mysql_num_rows($sql)>0)
   			while ($row = mysql_fetch_assoc($sql))
   				{
   				$query1 = "DELETE FROM `specializations` WHERE `speciality` = '".$row["speciality_name"]."' ";
				$sql1 = mysql_query($query1) or die(mysql_error());
        		}
        	//удаляем связанные специальности
			$query = "DELETE FROM `specialities` WHERE `faculty` = '".$faculty."' ";
			$sql = mysql_query($query) or die(mysql_error());

			$success='<h1 class="block"> ФАКУЛЬТЕТ ВИДАЛЕНО З БАЗИ ДАНИХ!</h1>';
			unset($_POST);
			}
   		}

 if (isset($_POST['edit_fac']))
 		{
 		$error=0;
		if ($_POST["edit_faculty"]!="") $faculty=mysql_real_escape_string($_POST["edit_faculty"]); else $error++;
		if ($_POST["new_faculty"]!="") $new_faculty=mysql_real_escape_string($_POST["new_faculty"]); else $error++;

        //проверка введенных данных
        if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> ЗАПОВНІТЬ ПРОПУЩЕНІ ПОЛЯ, ЩО ПОЗНАЧЕНІ ЧЕРВОНИМ КОЛЬОРОМ!</h1>';
			}
		if ($error==0)
			{
			$query = "UPDATE `faculties`
							SET `faculty_name` = '".$new_faculty."'
							WHERE `faculty_name` = '".$faculty."' LIMIT 1";
			$sql = mysql_query($query) or die(mysql_error());
			$success='<h1 class="block"> ФАКУЛЬТЕТ УСПІШНО ВІДРЕДАГОВАНО!</h1>';
			unset($_POST);
			}
 		}

	$element_error="border:solid 2px rgb(212,12,12);";

?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">Факультети</h1>
					<div class="column1-unit">
						<?php
						echo $success;
						include("Parts/FormFaculty.php");
  						?>

					</div>
            		<hr class="clear-contentunit" />
            	</div>
        	</div>

<?php


include ("Parts/Footer.php");

?>
