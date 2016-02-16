<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");
include ("MySQL/MysqlConnect.php");

	$months=array("січня"=>"1", "лютого"=>"2", "березня"=>"3", "квітня"=>"4", "травня"=>"5", "червня"=>"6", "липня"=>"7", "серпня"=>"8", "вересня"=>"9", "жовтня"=>"10", "листопада"=>"11", "грудня"=>"12");

	if (($_SESSION["status"]=="user") || (!isset($_SESSION["status"])))
		{
		print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
		exit();
		}

	if (isset($_POST['add_abit']))
		{
		$error=0;
		if ($_POST["ab_id"]!="") $ab_id = $_POST["ab_id"];		if ($_POST["lastname"]!="") $lastname=mysql_real_escape_string($_POST["lastname"]); else $error++;
		if ($_POST["firstname"]!="") $firstname=mysql_real_escape_string($_POST["firstname"]); else $error++;
		if ($_POST["patronymic"]!="") $patronymic=mysql_real_escape_string($_POST["patronymic"]); else $error++;

		if ($_POST["faculty"]!="") $faculty=mysql_real_escape_string($_POST["faculty"]); else $error++;
		if ($_POST["training"]!="") $training=mysql_real_escape_string($_POST["training"]); else $error++;
        if ($_POST["study_type"]!="") $study_type=mysql_real_escape_string($_POST["study_type"]); else $error++;
        if ($_POST["finans"]!="") $finans=mysql_real_escape_string($_POST["finans"]); else $error++;

		if ($_POST["language"]!="") $language=mysql_real_escape_string($_POST["language"]); else $error++;

        if ($_POST["nationality"]!="")
			{
        	if ($_POST["nationality"]=="Громадянин України") $nationality="Україна";
        	if ($_POST["nationality"]=="Без громадянства") $nationality=mysql_real_escape_string($_POST["nationality"]);
        	if ($_POST["nationality"]=="Іноземець")
        		{        		if ($_POST["country"]!="") $nationality=mysql_real_escape_string($_POST["country"]); else $error++;
        		}
        	}
        else $error++;

        if ($_POST["pasp_serial"]!="") $pasp_serial=mysql_real_escape_string($_POST["pasp_serial"]); else $error++;
        if ($_POST["pasp_number"]!="") $pasp_number=mysql_real_escape_string($_POST["pasp_number"]); else $error++;
        if ($_POST["pasp_issue"]!="") $pasp_issue=mysql_real_escape_string($_POST["pasp_issue"]); else $error++;
        $pasp_day=0; $pasp_month=0; $pasp_year=0;
        if ($_POST["pasp_day"]!="") $pasp_day=$_POST["pasp_day"]; else $error++;
        if ($_POST["pasp_month"]!="") $pasp_month=$_POST["pasp_month"]; else $error++;
        if ($_POST["pasp_year"]!="") $pasp_year=$_POST["pasp_year"]; else $error++;
        $pasp_date=mktime(0,0,0,$months[$pasp_month],$pasp_day,$pasp_year); //дата в секундах от 1970г.
        //echo date("M-d-Y",$pasp_date);
        $birth_day=0; $birth_month=0; $birth_year=0;
        if ($_POST["birth_day"]!="") $birth_day=$_POST["birth_day"]; else $error++;
        if ($_POST["birth_month"]!="") $birth_month=$_POST["birth_month"]; else $error++;
        if ($_POST["birth_year"]!="") $birth_year=$_POST["birth_year"]; else $error++;
        $birth_date=mktime(0,0,0,$months[$birth_month],$birth_day,$birth_year);//дата в секундах от 1970г.
        //echo date("M-d-Y",$birth_date);

        if ($_POST["sex"]!="") $sex=mysql_real_escape_string($_POST["sex"]); else $error++;

        if ($_POST["ID_code"]!="") $ID_code=mysql_real_escape_string($_POST["ID_code"]);

        if ($_POST["street"]!="") $street=mysql_real_escape_string($_POST["street"]);
        if ($_POST["build_number"]!="") $build_number=mysql_real_escape_string($_POST["build_number"]);
        if ($_POST["flat_number"]!="") $flat_number=mysql_real_escape_string($_POST["flat_number"]);
        if ($_POST["city"]!="") $city=mysql_real_escape_string($_POST["city"]); else $error++;
        if ($_POST["district"]!="") $district=mysql_real_escape_string($_POST["district"]); else $error++;
        if ($_POST["state"]!="") $state=mysql_real_escape_string($_POST["state"]); else $error++;
        if ($_POST["phone"]!="") $phone=mysql_real_escape_string($_POST["phone"]); else $error++;


        //проверка введенных данных
        if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> ЗАПОВНІТЬ ПРОПУЩЕНІ ПОЛЯ, ЩО ПОЗНАЧЕНІ ЧЕРВОНИМ КОЛЬОРОМ!</h1>';
			}
		if ($error==0)
			{					$query = "UPDATE `Registred`
						SET
						 `lastname` = '".$lastname."' , `firstname` = '".$firstname."' , `patronymic` = '".$patronymic."' ,
						 `faculty` = '".$faculty."' , `training` = '".$training."' ,  `study_type` = '".$study_type."' ,
						 `finans` = '".$finans."' , `language` = '".$language."' , `nationality` = '".$nationality."',
						 `pasp_serial` = '".$pasp_serial."' , `pasp_number` = '".$pasp_number."',
						 `pasp_issue` = '".$pasp_issue."' ,  `pasp_date` = '".$pasp_date."' , `birth_date` = '".$birth_date."' ,
						 `sex` = '".$sex."' , `ID_code` = '".$ID_code."' ,
						 `street` = '".$street."' , `build_number` = '".$build_number."' , `flat_number` = '".$flat_number."' ,
						 `city` = '".$city."' , `district` = '".$district."' , `state` = '".$state."' , `phone` = '".$phone."'
					WHERE `ab_id` = '".$ab_id."' LIMIT 1";
   				$sql = mysql_query($query) or die(mysql_error());
				$success='<h1 class="block"> ДАНІ СТУДЕНТА УСПІШНО ВІДРЕДАГОВАНО!</h1>';
				unset($_POST);

			}

		}
	$element_error="border:solid 2px rgb(212,12,12);";

 if (isset($_POST['regSearch']))
 	{
 	if ($_POST["regLastname"]!="") $regLastname=mysql_real_escape_string($_POST["regLastname"]);
 		else $regLastname="%";
 	if ($_POST["regPasspSerial"]!="") $regPasspSerial=mysql_real_escape_string($_POST["regPasspSerial"]);
 		else $regPasspSerial="%";
 	if ($_POST["regPasspNumber"]!="") $regPasspNumber=mysql_real_escape_string($_POST["regPasspNumber"]);
 		else $regPasspNumber="%";
 	}
?>
<script type="text/javascript">

</script>
<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle" style="font-size:190%;">Редагування даних випускника бакалаврату <?php if (date("n")>=9) echo date("Y")+1; else echo date("Y"); ?> року </h1>
					<div class="column1-unit">
                        <input type="hidden" name="debug" id="debug" class="field" value=""/>
						<?php
						echo $success;
						/*echo "<pre>";
						print_r($_POST);
						echo"</pre>";*/
						$_POST['registred']="yes";
						$_POST['regSearch']="checked";
						include("Parts/FormRegistred.php");
						include("Parts/FormTempRegistrationAdd.php");
						?>

					</div>
            		<hr class="clear-contentunit" />
            	</div>
        	</div>

<?php
if ($type=="mag") include("Scripts/SelectM.php");
if ($type=="spc") include("Scripts/SelectS.php");

include("Scripts/SelectFacultyBak.php");
include ("Parts/Footer.php");

?>
