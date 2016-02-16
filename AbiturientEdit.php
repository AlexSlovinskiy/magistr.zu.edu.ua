<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");
include ("MySQL/MysqlConnect.php");

if (!isset($_SESSION["login"]))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}

//�������� ������� ������������
	$query_banned = "SELECT `banned`  FROM `users` WHERE `user_id`='".$_SESSION["user_id"]."' ";
    $sql_banned = mysql_query($query_banned) or die(mysql_error());
    $banned = mysql_fetch_assoc($sql_banned);
    $_SESSION["banned"]= $banned["banned"];
   	if ($_SESSION["banned"]=="+")
    	{
		print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php?page=".$_SESSION["page"]."\">";
		exit();
		}

$months=array("01"=>"����", "02"=>"������", "03"=>"�������", "04"=>"�����", "05"=>"������", "06"=>"������", "07"=>"�����", "08"=>"������", "09"=>"�������", "10"=>"������", "11"=>"���������", "12"=>"������");

//�������� ����������� ������ ��������� � ���������� ��� �����������
	$query="SELECT `operator` , `lastname` , `firstname` , `patronymic` , `speciality` , `type` FROM `abiturients` WHERE `ab_id`='".$_REQUEST["id"]."' LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());
    	if (mysql_num_rows($sql)==1)
    		{
    		$row= mysql_fetch_assoc($sql);
    		$abit='<h1 class="block" style="background:rgb(137,170,214)"> '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						<br />������������ &bdquo;'.$row["speciality"].'&ldquo;</h1>';
    		$type=$row['type'];
    		//�������� �� ��������� �� ��������������
    		$query_banned = "SELECT `banned`  FROM `users` WHERE `user_id`='".$row['operator']."' ";
    		$sql_banned = mysql_query($query_banned) or die(mysql_error());
    		$banned = mysql_fetch_assoc($sql_banned);
    		$_SESSION["banned"]= $banned["banned"];

    		if ($_SESSION['status']!="root" && $_SESSION['status']!="admin")
            	{
            	if ($row['operator']!=$_SESSION["user_id"] || $_SESSION["banned"]=="+" )
            		{
					print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php?page=".$_SESSION["page"]."\">";
					exit();
					}
				}
			}
		else
			{
			print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php?page=".$_SESSION["page"]."\">";
			exit();
			}


if (isset($_REQUEST["id"]))
	{
	if (isset($_POST['set_delete']))
		{
        if ($_POST["ab_delete"]=="+")
        	{
        	$query="DELETE FROM `abiturients` WHERE `ab_id`='".$_REQUEST["id"]."' LIMIT 1";
			$sql = mysql_query($query) or die(mysql_error());
            $success='<h1 class="block" style="background:rgb(212,12,12)"> ������ ��ϲ��� �������� � ����! </h1>';
            unset($_REQUEST);
			print "<meta http-equiv=\"Refresh\" content=\"1;URL=MainPage.php?page=".$_SESSION["page"]."\">";
        	}
        else $success='<h1 class="block" style="background:rgb(212,12,12)"> ϲ�����Ĳ�� ��������� ������ �����в����! </h1>';
		}

	if (isset($_POST['set_only_contract']))
		{
        if ($_POST["only_contract"]=="+")
        	{
        	$query="UPDATE `abiturients` SET `only_contract` = '+' WHERE `ab_id`='".$_REQUEST["id"]."' LIMIT 1";
			$sql = mysql_query($query) or die(mysql_error());
            $success='<h1 class="block" style="background:rgb(137,170,214)"> ����������� ²����� ²� ���������� ���������� </h1>';
            unset($_REQUEST);
			print "<meta http-equiv=\"Refresh\" content=\"1;URL=MainPage.php?page=".$_SESSION["page"]."\">";
        	}
        else
        	{
        	$query="UPDATE `abiturients` SET `only_contract` = '-' WHERE `ab_id`='".$_REQUEST["id"]."' LIMIT 1";
        	$sql = mysql_query($query) or die(mysql_error());
        	$success='<h1 class="block" style="background:rgb(137,170,214)"> ����������� ������ � ������Ѳ �� ��������� ������� </h1>';
        	unset($_REQUEST);
			print "<meta http-equiv=\"Refresh\" content=\"1;URL=MainPage.php?page=".$_SESSION["page"]."\">";
        	}
		}

	if (isset($_POST['set_government_exchange']))
		{
        if ($_POST["government_exchange"]=="+")
        	{
        	$query="UPDATE `abiturients` SET `government_exchange` = '+' WHERE `ab_id`='".$_REQUEST["id"]."' LIMIT 1";
			$sql = mysql_query($query) or die(mysql_error());
            $success='<h1 class="block" style="background:rgb(137,170,214)"> ����������� ������ ̲���������� ��̲�� </h1>';
            unset($_REQUEST);
			print "<meta http-equiv=\"Refresh\" content=\"1;URL=MainPage.php?page=".$_SESSION["page"]."\">";
        	}
        else
        	{
        	$query="UPDATE `abiturients` SET `government_exchange` = '-' WHERE `ab_id`='".$_REQUEST["id"]."' LIMIT 1";
        	$sql = mysql_query($query) or die(mysql_error());
        	$success='<h1 class="block" style="background:rgb(137,170,214)"> ²�̲�� ������� ̲���������� ��̲�� </h1>';
        	unset($_REQUEST);
			print "<meta http-equiv=\"Refresh\" content=\"1;URL=MainPage.php?page=".$_SESSION["page"]."\">";
        	}
		}

	if (!isset($_POST['add_abit']))
		{
		$query="SELECT * FROM `abiturients` WHERE `ab_id`='".$_REQUEST["id"]."'";
    	$sql = mysql_query($query) or die(mysql_error());
    	if (mysql_num_rows($sql)>0)
    		{
        	while ($row = mysql_fetch_assoc($sql))
   				{
				$_POST["lastname"]=$row["lastname"];
            	$_POST["firstname"]=$row["firstname"];
            	$_POST["patronymic"]=$row["patronymic"];
            	$_POST["faculty"]=$row["faculty"];
            	$_POST["training"]=$row["training"];
            	$_POST["speciality"]=$row["speciality"];
            	$_POST["specialization"]=$row["specialization"];
            	if (strcasecmp($row["institution"],"��� ���� �. ������")==0)
            		$_POST["institution"]="ZDU";
            	else
            		{
            		$_POST["institution"]="other";
	            	$_POST["institution_oth"]=$row["institution"];
            		}
            	$_POST["qualification"]=$row["qualification"];
            	$_POST["dip_study_type"]=$row["dip_study_type"];
            	$_POST["dip_finans"]=$row["dip_finans"];
				$_POST["dip_serial"]=$row["dip_serial"];
            	$_POST["dip_number"]=$row["dip_number"];
				$_POST["dip_day"]=date("d", $row["dip_date"]);
				$_POST["dip_month"]=$months[date("m", $row["dip_date"])];
            	$_POST["dip_year"]=date("Y", $row["dip_date"]);
                $_POST["dip_average"]=$row["dip_average"];
                $_POST["dip_honour"]=$row["dip_honour"];
                $_POST["dip_orig"]=$row["dip_orig"];
                $_POST["cross_enter"]=$row["cross_enter"];
                $_POST["language"]=$row["language"];
                $_POST["study_type"]=$row["study_type"];
                $_POST["target"]=$row["target"];

				if (strcasecmp($row["nationality"],"������")==0) $_POST["nationality"]="���������� ������";
					else
						if (strcasecmp($row["nationality"],"��� ������������")==0) $_POST["nationality"]="��� ������������";
							else
								{
								$_POST["nationality"]="���������";
								$_POST["country"]=$row["nationality"];
								}
				$_POST["pasp_serial"]=$row["pasp_serial"];
				$_POST["pasp_number"]=$row["pasp_number"];
            	$_POST["pasp_issue"]=$row["pasp_issue"];
            	$_POST["pasp_day"]=date("d", $row["pasp_date"]);
				$_POST["pasp_month"]=$months[date("m", $row["pasp_date"])];
            	$_POST["pasp_year"]=date("Y", $row["pasp_date"]);
            	$_POST["birth_day"]=date("d", $row["birth_date"]);
				$_POST["birth_month"]=$months[date("m", $row["birth_date"])];
            	$_POST["birth_year"]=date("Y", $row["birth_date"]);
            	$_POST["sex"]=$row["sex"];
            	$_POST["location"]=$row["location"];
            	$_POST["ID_code"]=$row["ID_code"];
            	$_POST["street"]=$row["street"];
            	$_POST["build_number"]=$row["build_number"];
            	$_POST["flat_number"]=$row["flat_number"];
            	$_POST["city"]=$row["city"];
            	$_POST["district"]=$row["district"];
            	$_POST["state"]=$row["state"];
            	$_POST["phone"]=$row["phone"];
            	$_POST["hostel"]=$row["hostel"];
            	$_POST["military"]=$row["military"];
                if ($_POST["military"]=="+")
        			{
        			$_POST["mil_doc"]=$row["mil_doc"];
        			$_POST["mil_issue"]=$row["mil_issue"];
        			$_POST["mil_day"]=date("d", $row["mil_date"]);
					$_POST["mil_month"]=$months[date("m", $row["mil_date"])];
            		$_POST["mil_year"]=date("Y", $row["mil_date"]);
        			}
        		$_POST["benefits"]=$row["benefits"];
                if ($_POST["benefits"]=="+")
        			{
        			$_POST["invalid"]=$row["invalid"];
        			$_POST["syrota"]=$row["syrota"];
        			$_POST["chornob"]=$row["chornob"];
        			$_POST["inozem"]=$row["inozem"];
        			$_POST["veteran"]=$row["veteran"];
        			$_POST["chacht"]=$row["chacht"];
        			$_POST["zagybl"]=$row["zagybl"];
        			$_POST["zasyadka"]=$row["zasyadka"];
        			$_POST["benefit_doc"]=$row["benefit_doc"];
        			}
        		$_POST["chornob34"]=$row["chornob34"];
                $_POST["invalid3"]=$row["invalid3"];
                $_POST["only_contract"]=$row["only_contract"];
                $_POST["government_exchange"]=$row["government_exchange"];
        		/*if (strncmp($_POST["training"],"0101",4)==0) $training1="0101. ���������� �����";
				if (strncmp($_POST["training"],"0305",4)==0) $training1="0305. Գ������";
				if (strncmp($_POST["training"],"0202",4)==0) $training1="0202. ���������";
				if (strncmp($_POST["training"],"0302",4)==0) $training1="0302. �����������";
				if (strncmp($_POST["training"],"0401",4)==0) $training1="0401. ���������";
				if (strncmp($_POST["training"],"0502",4)==0) $training1="0502. ����������";
				if (strncmp($_POST["training"],"0802",4)==0) $training1="0802. ��������� ����������";
				if (strncmp($_POST["training"],"0102",4)==0) $training1="0102. Գ����� ��������� � �����";*/
        		}
			}
        }


	if (isset($_POST['add_abit']))
		{
		$months=array("����"=>"1", "������"=>"2", "�������"=>"3", "�����"=>"4", "������"=>"5", "������"=>"6", "�����"=>"7", "������"=>"8", "�������"=>"9", "������"=>"10", "���������"=>"11", "������"=>"12");
		$error=0;
		if ($_POST["lastname"]!="") $lastname=mysql_real_escape_string($_POST["lastname"]); else $error++;
		if ($_POST["firstname"]!="") $firstname=mysql_real_escape_string($_POST["firstname"]); else $error++;
		if ($_POST["patronymic"]!="") $patronymic=mysql_real_escape_string($_POST["patronymic"]); else $error++;

		if ($_POST["faculty"]!="") $faculty=mysql_real_escape_string($_POST["faculty"]); else $error++;
		if ($_POST["training"]!="") $training=mysql_real_escape_string($_POST["training"]); else $error++;
		if ($_POST["speciality"]!="") $speciality=mysql_real_escape_string($_POST["speciality"]); else $error++;

		$query="SELECT `type` FROM `abiturients` WHERE `ab_id`='".$_REQUEST["id"]."'";
    	$sql = mysql_query($query) or die(mysql_error());
    	if (mysql_num_rows($sql)>0)
    		{
        	while ($row = mysql_fetch_assoc($sql))
   				{
   				$type=$row["type"];
   				}
   			}

		if ($type=="spc")
			{
			if ($_POST["specialization"]!="") $specialization=mysql_real_escape_string($_POST["specialization"]); else $error++;
            }

		if ($_POST["language"]!="") $language=mysql_real_escape_string($_POST["language"]); else $error++;

        if ($_POST["institution"]!="")
        	{
			if ($_POST["institution"]=="ZDU") $institution="��� ���� �. ������";
			else $institution=mysql_real_escape_string($_POST["institution_oth"]);
			}
			else $error++;

        if ($_POST["qualification"]!="") $qualification	= mysql_real_escape_string($_POST["qualification"]); else $error++;
        if ($_POST["dip_study_type"]!="") $dip_study_type=mysql_real_escape_string($_POST["dip_study_type"]); else $error++;
		if ($_POST["dip_finans"]!="") $dip_finans=mysql_real_escape_string($_POST["dip_finans"]); else $error++;
		if ($_POST["dip_serial"]!="") $dip_serial = mysql_real_escape_string($_POST["dip_serial"]); else $error++;
        if ($_POST["dip_number"]!="") $dip_number = mysql_real_escape_string($_POST["dip_number"]); else $error++;
        $dip_day=0; $dip_month=0; $dip_year=0;
        if ($_POST["dip_day"]!="") $dip_day=$_POST["dip_day"]; else $error++;
        if ($_POST["dip_month"]!="") $dip_month=$_POST["dip_month"]; else $error++;
        if ($_POST["dip_year"]!="") $dip_year=$_POST["dip_year"]; else $error++;
        $dip_date=mktime(0,0,0,$months[$dip_month],$dip_day,$dip_year); //���� � �������� �� 1970�.
        //echo date("M-d-Y",$dip_date);
        if ($_POST['dip_average']!="")  $dip_average=floatval($_POST["dip_average"]); else $error++;
        if ($_POST["dip_honour"]!="") $dip_honour=$_POST["dip_honour"]; else $dip_honour="-";
        if ($_POST["dip_orig"]!="") $dip_orig=$_POST["dip_orig"]; else $dip_orig="-";
        if ($_POST["cross_enter"]!="") $cross_enter=$_POST["cross_enter"]; else $cross_enter="-";

        if ($_POST["study_type"]!="") $study_type=mysql_real_escape_string($_POST["study_type"]); else $error++;

        if ($study_type=="�����")
        	{
        	if ($_POST["target"]!="") $target=$_POST["target"]; else $target="-";
            }
            else $target="-";

		if ($_POST["nationality"]!="")
			{
        	if ($_POST["nationality"]=="���������� ������") $nationality="������";
        	if ($_POST["nationality"]=="��� ������������") $nationality= mysql_real_escape_string($_POST["nationality"]);
        	if ($_POST["nationality"]=="���������")
        		{
        		if ($_POST["country"]!="") $nationality=mysql_real_escape_string($_POST["country"]); else $error++;
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
        $pasp_date=mktime(0,0,0,$months[$pasp_month],$pasp_day,$pasp_year); //���� � �������� �� 1970�.
        //echo date("M-d-Y",$pasp_date);
        $birth_day=0; $birth_month=0; $birth_year=0;
        if ($_POST["birth_day"]!="") $birth_day=$_POST["birth_day"]; else $error++;
        if ($_POST["birth_month"]!="") $birth_month=$_POST["birth_month"]; else $error++;
        if ($_POST["birth_year"]!="") $birth_year=$_POST["birth_year"]; else $error++;
        $birth_date=mktime(0,0,0,$months[$birth_month],$birth_day,$birth_year);//���� � �������� �� 1970�.
        //echo date("M-d-Y",$birth_date);

        if ($_POST["sex"]!="") $sex=mysql_real_escape_string($_POST["sex"]); else $error++;

        if ($_POST["location"]!="") $location=mysql_real_escape_string($_POST["location"]); else $error++;

        if ($_POST["ID_code"]!="") $ID_code=mysql_real_escape_string($_POST["ID_code"]);

        if ($_POST["street"]!="") $street=mysql_real_escape_string($_POST["street"]);
        if ($_POST["build_number"]!="") $build_number=mysql_real_escape_string($_POST["build_number"]);
        if ($_POST["flat_number"]!="") $flat_number=mysql_real_escape_string($_POST["flat_number"]);
        if ($_POST["city"]!="") $city=mysql_real_escape_string($_POST["city"]); else $error++;
        if ($_POST["district"]!="") $district=mysql_real_escape_string($_POST["district"]);
        if ($_POST["state"]!="") $state=mysql_real_escape_string($_POST["state"]);
        if ($_POST["phone"]!="") $phone=mysql_real_escape_string($_POST["phone"]); else $error++;
        if ($_POST["hostel"]!="") $hostel=$_POST["hostel"]; else $hostel="-";

        if ($_POST["military"]=="+")
        	{
        	$military="+";
        	if ($_POST["mil_doc"]!="") $mil_doc=mysql_real_escape_string($_POST["mil_doc"]); else $error++;
        	if ($_POST["mil_issue"]!="") $mil_issue=mysql_real_escape_string($_POST["mil_issue"]); else $error++;
        	$mil_day=0; $mil_month=0; $mil_year=0;
        	if ($_POST["mil_day"]!="")	$mil_day=$_POST["mil_day"]; else $error++;
        	if ($_POST["mil_month"]!="") $mil_month=$_POST["mil_month"]; else $error++;
        	if ($_POST["mil_year"]!="")	$mil_year=$_POST["mil_year"]; else $error++;
        	$mil_date=mktime(0,0,0,$months[$mil_month],$mil_day,$mil_year);//���� � �������� �� 1970�.
        	//echo date("M-d-Y",$mil_date);
			}
        else
        	{
        	$military="-";
        	$mil_doc="";
        	$mil_issue="";
        	$mil_date="";
        	}

        $benefits=$_POST["benefits"];
        if ($_POST["benefits"]=="+")
        	{
        	$benefits="+";
        	$invalid=$_POST["invalid"];
        	$syrota=$_POST["syrota"];
        	$chornob=$_POST["chornob"];
        	$inozem=$_POST["inozem"];
        	$veteran=$_POST["veteran"];
        	$chacht=$_POST["chacht"];
        	$zagybl=$_POST["zagybl"];
        	$zasyadka=$_POST["zasyadka"];
        	if ($_POST["benefit_doc"]!="")	$benefit_doc=mysql_real_escape_string($_POST["benefit_doc"]);
        		else $error++;
        	}
        else
        	{
        	$benefits="-";
        	$invalid="-";
        	$syrota="-";
        	$chornob="-";
        	$inozem="-";
        	$veteran="-";
        	$chacht="-";
        	$zagybl="-";
        	$zasyadka="-";
        	$benefit_doc="";
        	}

        if (isset($_POST["chornob34"])) $chornob34='+'; else $chornob34='-';
        if (isset($_POST["invalid3"])) $invalid3='+'; else $invalid3='-';

		$finans="-";
        //if ($qualification=="��������" && $dip_year==date("Y")) $finans="b";
        //	else $finans="c";
        //�������� ��������� ������
        if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> �����Ͳ�� �������Ͳ ����, �� �������Ͳ �������� ��������!</h1>';
			}
		if ($error==0)
			{
			$query = "UPDATE `abiturients`
						SET `last_edit` = '".date("U")."' ,
						 `lastname` = '".$lastname."' , `firstname` = '".$firstname."' , `patronymic` = '".$patronymic."' ,
						 `faculty` = '".$faculty."' , `training` = '".$training."' , `speciality` = '".$speciality."' , `specialization` = '".$specialization."' ,
						 `institution` = '".$institution."' , `qualification` = '".$qualification."' , `dip_study_type` = '".$dip_study_type."' ,
						 `dip_finans` = '".$dip_finans."' , `dip_serial` = '".$dip_serial."' , `dip_number` = '".$dip_number."' ,
						 `dip_date` = '".$dip_date."' , `dip_honour` = '".$dip_honour."' , `dip_orig` = '".$dip_orig."' , `dip_average` = '".$dip_average."' ,
                         `cross_enter` = '".$cross_enter."' ,
						 `language` = '".$language."', `study_type` = '".$study_type."', `target` = '".$target."',
						 `nationality` = '".$nationality."', `pasp_serial` = '".$pasp_serial."', `pasp_number` = '".$pasp_number."',
						 `pasp_issue` = '".$pasp_issue."' ,  `pasp_date` = '".$pasp_date."' , `birth_date` = '".$birth_date."' , `sex` = '".$sex."' ,
						 `location` = '".$location."' , `ID_code` = '".$ID_code."' ,
						 `street` = '".$street."' , `build_number` = '".$build_number."' , `flat_number` = '".$flat_number."' ,
						 `city` = '".$city."' , `district` = '".$district."' , `state` = '".$state."' , `phone` = '".$phone."'  , `hostel` = '".$hostel."' ,
						 `military` = '".$military."' , `mil_doc` = '".$mil_doc."' , `mil_issue` = '".$mil_issue."' , `mil_date` = '".$mil_date."' ,
						 `benefits` = '".$benefits."' , `invalid` = '".$invalid."' , `syrota` = '".$syrota."' , `chornob` = '".$chornob."' ,
						 `inozem` = '".$inozem."' , `veteran` = '".$veteran."' , `chacht` = '".$chacht."' , `zagybl` = '".$zagybl."' , `zasyadka` = '".$zasyadka."' ,
						 `benefit_doc` = '".$benefit_doc."' , `chornob34` = '".$chornob34."' , `invalid3` = '".$invalid3."'
					WHERE `ab_id` = '".$_REQUEST["id"]."' LIMIT 1";

   			$sql = mysql_query($query) or die(mysql_error());
			$success='<h1 class="block"> �̲�� � ������ �����в���� ��ϲ��� �����Ͳ!</h1>';
			unset($_REQUEST);
			print "<meta http-equiv=\"Refresh\" content=\"2;URL=MainPage.php?page=".$_SESSION["page"]."\">";
			}
		}
    $element_error="border:solid 2px rgb(212,12,12);";
    }
?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">����������� ������ �������� <?echo $msg?></h1>
				<div class="column1-unit">
						<?php
						echo $abit;
						echo $success;
						if (($_SESSION["status"]=="root") || ($_SESSION["status"]=="admin"))
							{
							include("Parts/FormAbitureintDel.php");
							}
						if (isset($_REQUEST)) include("Parts/FormAbitureintAdd.php");
						?>
					</div>
            		<hr class="clear-contentunit" />
            	</div>
        	</div>

<?php
if ($type=="mag") include("Scripts/SelectM.php");
if ($type=="spc") include("Scripts/SelectS.php");

include ("Parts/Footer.php");

?>
