<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");
include ("MySQL/MysqlConnect.php");

if (!isset($_SESSION["login"]))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}

	if (isset($_POST['add_tr']))
		{
		$error=0;		for ($i=1; $i<$_POST['num_of_fields']; $i++)
        	{
        	if (isset($_POST["faculty".$i.""]))
        		{        		$faculty_ids[$i]=$_POST["faculty".$i.""];
        		}
            else
            	{            	$faculty_ids[$i]=0;
            	$error++;
            	}
        	}
        if ($error<($_POST['num_of_fields']-1)) $error=0;
		if ($_POST["training"]!="") $training=mysql_real_escape_string($_POST["training"]); else $error++;

		//проверка введенных данных
        if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> ЗАПОВНІТЬ ПРОПУЩЕНІ ПОЛЯ, ТА ВКАЖІТЬ ФАКУЛЬТЕТИ!</h1>';
			}
		if ($error==0)
			{			//проверка наличия такого же направления
			$query="SELECT * FROM `trainings_bak`
					WHERE `training_name`='".$training."'";
    		$sql = mysql_query($query) or die(mysql_error());
    		if (mysql_num_rows($sql)>0)
    			{
    			$success='<h1 class="block" style="background:rgb(212,12,12)"> Напрям підготовки &bdquo;'.$training.'&ldquo; вже є в базі!</h1>';
    			}
    		else
    			{    			$faculties=htmlspecialchars(serialize($faculty_ids));				$query = "INSERT INTO `trainings_bak`
						( `training_name` , `faculty_id` )
						VALUES ('".$training."', '".$faculties."')";
   				$sql = mysql_query($query) or die(mysql_error());
   				$success='<h1 class="block"> НАПРЯМ ПІДГОТОВКИ УСПІШНО ЗАНЕСЕНО ДО БАЗИ ДАНИХ!</h1>';
				unset($_POST);
				}
			}

        }

   if (isset($_POST['del_trn']))
   		{   		$error=0;        if ($_POST["del_training"]!="") $training=mysql_real_escape_string($_POST["del_training"]); else $error++;
        if ($_POST["del_trn_ok"]!="+") $error++;
   		if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> ВИБЕРІТЬ НАПРЯМ ТА ПІДТВЕРДІТЬ ВИДАЛЕННЯ!</h1>';
			}
        if ($error==0)
			{			$query = "DELETE FROM `trainings_bak` WHERE `training_name` = '".$training."' LIMIT 1";
			$sql = mysql_query($query) or die(mysql_error());
			$success='<h1 class="block"> НАПРЯМ ПІДГОТОВКИ ВИДАЛЕНО З БАЗИ ДАНИХ!</h1>';
			unset($_POST);
			}
   		}

 if (isset($_POST['edit_trn']))
 		{
 		$error=0;
		if ($_POST["edit_training"]!="") $training=mysql_real_escape_string($_POST["edit_training"]); else $error++;
		if ($_POST["new_training"]!="") $new_training=mysql_real_escape_string($_POST["new_training"]); else $error++;

        //проверка введенных данных
        if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> ЗАПОВНІТЬ ПРОПУЩЕНІ ПОЛЯ, ЩО ПОЗНАЧЕНІ ЧЕРВОНИМ КОЛЬОРОМ!</h1>';
			}
		if ($error==0)
			{
            $query = "SELECT `faculty_id` FROM `faculties`";
			$sql = mysql_query($query) or die(mysql_error());
			if (mysql_num_rows($sql)>0)
				while ($row = mysql_fetch_assoc($sql)) $ids[]=$row["faculty_id"];
			/*echo "<pre>";
			print_r($_POST);
			echo "</pre>";*/
			for ($i=0; $i<count($ids); $i++)
				{				if (isset($_POST["new_faculty".$ids[$i].""]))
        			{
        			$faculty_ids[$i+1]=$_POST["new_faculty".$ids[$i].""];
        			}
            	else
            		{
            		$faculty_ids[$i+1]=0;
					}
				}

			$faculties=htmlspecialchars(serialize($faculty_ids));
			$query = "UPDATE `trainings_bak`
							SET `training_name` = '".$new_training."' , `faculty_id` = '".$faculties."'
							WHERE `training_name` = '".$training."' LIMIT 1";
			$sql = mysql_query($query) or die(mysql_error());
			$success='<h1 class="block"> НАПРЯМ ПІДГОТОВКИ УСПІШНО ВІДРЕДАГОВАНО!</h1>';
			unset($_POST);
			}
 		}

	$element_error="border:solid 2px rgb(212,12,12);";

?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">Напрями підготовки (бакалаврат)</h1>
					<div class="column1-unit">
						<?php
						/*echo "<pre>";
						print_r($_POST);
						print_r($faculty_ids);
						echo"</pre>";*/
						echo $success;
						include("Parts/FormTrainingBak.php");
  						?>

					</div>
            		<hr class="clear-contentunit" />
            	</div>
        	</div>

<?php


include ("Parts/Footer.php");

?>
