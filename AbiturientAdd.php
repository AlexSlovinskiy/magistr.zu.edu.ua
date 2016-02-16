<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");
include ("MySQL/MysqlConnect.php");

if (!isset($_SESSION["login"]))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}
	if ($_GET["add"]=="mag")
		{
		$type="mag";
		$msg="<br/> �������-�������������� ����� '������'";
		}
	if ($_GET["add"]=="spc")
		{
		$type="spc";
		$msg="<br/> �������-�������������� ����� '���������'";
		}

	//�������� ������� �������������
	$query_banned = "SELECT `banned`  FROM `users` WHERE `user_id`='".$_SESSION["user_id"]."' ";
    $sql_banned = mysql_query($query_banned) or die(mysql_error());
    $banned = mysql_fetch_assoc($sql_banned);
    $_SESSION["banned"] = $banned["banned"];
   	if ($_SESSION["banned"]=="+")
    	{
		print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php?page=".$_SESSION["page"]."\">";
		exit();
		}

	$months=array("����"=>"1", "������"=>"2", "�������"=>"3", "�����"=>"4", "������"=>"5", "������"=>"6", "�����"=>"7", "������"=>"8", "�������"=>"9", "������"=>"10", "���������"=>"11", "������"=>"12");

	if (isset($_POST['add_abit']))
		{
		$error=0;
		if ($_POST["lastname"]!="") $lastname=mysql_real_escape_string(trim($_POST["lastname"])); else $error++;
		if ($_POST["firstname"]!="") $firstname=mysql_real_escape_string(trim($_POST["firstname"])); else $error++;
		if ($_POST["patronymic"]!="") $patronymic=mysql_real_escape_string(trim($_POST["patronymic"])); else $error++;

		if ($_POST["faculty"]!="") $faculty=mysql_real_escape_string($_POST["faculty"]); else $error++;
		if ($_POST["training"]!="") $training=mysql_real_escape_string($_POST["training"]); else $error++;
		if ($_POST["speciality"]!="") $speciality=mysql_real_escape_string($_POST["speciality"]); else $error++;
		if ($_GET["add"]=="spc")
			{
			if ($_POST["specialization"]!="") $specialization=mysql_real_escape_string($_POST["specialization"]); else $error++;
            }
        if ($_POST["institution"]!="")
        	{
			if ($_POST["institution"]=="ZDU") $institution="��� ���� �. ������";
			else $institution=mysql_real_escape_string(trim($_POST["institution_oth"]));
			}
			else $error++;

		if ($_POST["qualification"]!="") $qualification=mysql_real_escape_string($_POST["qualification"]); else $error++;
		if ($_POST["dip_study_type"]!="") $dip_study_type=mysql_real_escape_string($_POST["dip_study_type"]); else $error++;
		if ($_POST["dip_finans"]!="") $dip_finans=mysql_real_escape_string($_POST["dip_finans"]); else $error++;
        if ($_POST["dip_serial"]!="") $dip_serial=mysql_real_escape_string(trim($_POST["dip_serial"])); else $error++;
        if ($_POST["dip_number"]!="") $dip_number=mysql_real_escape_string(trim($_POST["dip_number"])); else $error++;
        $dip_day=0; $dip_month=0; $dip_year=0;
        if ($_POST["dip_day"]!="") $dip_day=$_POST["dip_day"]; else $error++;
        if ($_POST["dip_month"]!="") $dip_month=$_POST["dip_month"]; else $error++;
        if ($_POST["dip_year"]!="") $dip_year=$_POST["dip_year"]; else $error++;
        $dip_date=mktime(0,0,0, $months[$dip_month], $dip_day, $dip_year); //���� � �������� �� 1970�.
        if ($_POST['dip_average']!="")  $dip_average=floatval($_POST["dip_average"]); else $error++;
        if ($_POST["dip_honour"]!="") $dip_honour=$_POST["dip_honour"]; else $dip_honour="-";
        if ($_POST["dip_orig"]!="") $dip_orig=$_POST["dip_orig"]; else $dip_orig="-";
        if ($_POST["cross_enter"]!="") $cross_enter=$_POST["cross_enter"]; else $cross_enter="-";

        if ($_POST["language"]!="") $language=mysql_real_escape_string($_POST["language"]); else $error++;

        if ($_POST["study_type"]!="") $study_type=mysql_real_escape_string($_POST["study_type"]); else $error++;
        if ($study_type=="�����")
        	{
        	if ($_POST["target"]!="") $target=$_POST["target"]; else $target="-";
            }
            else $target="-";

		if ($_POST["nationality"]!="")
			{
        	if ($_POST["nationality"]=="���������� ������") $nationality="������";
        	if ($_POST["nationality"]=="��� ������������") $nationality=mysql_real_escape_string($_POST["nationality"]);
        	if ($_POST["nationality"]=="���������")
        		{
        		if ($_POST["country"]!="") $nationality=mysql_real_escape_string(trim($_POST["country"])); else $error++;
        		}
        	}
        	else $error++;

        if ($_POST["pasp_serial"]!="") $pasp_serial=mysql_real_escape_string(trim($_POST["pasp_serial"])); else $error++;
        if ($_POST["pasp_number"]!="") $pasp_number=mysql_real_escape_string(trim($_POST["pasp_number"])); else $error++;
        if ($_POST["pasp_issue"]!="") $pasp_issue=mysql_real_escape_string(trim($_POST["pasp_issue"])); else $error++;
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

        if ($_POST["ID_code"]!="") $ID_code=mysql_real_escape_string(trim($_POST["ID_code"]));

        if ($_POST["street"]!="") $street=mysql_real_escape_string(trim($_POST["street"]));
        if ($_POST["build_number"]!="") $build_number=mysql_real_escape_string(trim($_POST["build_number"]));
        if ($_POST["flat_number"]!="") $flat_number=mysql_real_escape_string(trim($_POST["flat_number"]));
        if ($_POST["city"]!="") $city=mysql_real_escape_string(trim($_POST["city"])); else $error++;
        if ($_POST["district"]!="") $district=mysql_real_escape_string(trim($_POST["district"])); else $error++;
        if ($_POST["state"]!="") $state=mysql_real_escape_string(trim($_POST["state"])); else $error++;
        if ($_POST["phone"]!="") $phone=mysql_real_escape_string(trim($_POST["phone"])); else $error++;
        if ($_POST["hostel"]!="") $hostel=$_POST["hostel"]; else $hostel="-";

        if ($_POST["military"]=="+")
        	{
        	$military="+";
        	if ($_POST["mil_doc"]!="") $mil_doc=mysql_real_escape_string($_POST["mil_doc"]); else $error++;
        	if ($_POST["mil_issue"]!="") $mil_issue=mysql_real_escape_string(trim($_POST["mil_issue"])); else $error++;
        	$mil_day=0; $mil_month=0; $mil_year=0;
        	if ($_POST["mil_day"]!="") $mil_day=$_POST["mil_day"]; else $error++;
        	if ($_POST["mil_month"]!="") $mil_month=$_POST["mil_month"]; else $error++;
        	if ($_POST["mil_year"]!="") $mil_year=$_POST["mil_year"]; else $error++;
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
        	if ($invalid=="" && $syrota=="" && $chornob=="" && $zasyadka==""
        		&& $inozem=="" && $veteran=="" && $chacht=="" && $zagybl=="" )
        			{
        			$error++;
        			$no_benefit=1;
        			}
        	if ($_POST["benefit_doc"]!="")	$benefit_doc=mysql_real_escape_string(trim($_POST["benefit_doc"]));
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

        //if ($qualification=="��������" && $dip_year==date("Y")) $finans="b";
        	//else $finans="c";
        $finans="-";

        //�������� ��������� ������
        if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> �����Ͳ�� �������Ͳ ����, �� �������Ͳ �������� ��������!</h1>';
			}
		if ($error==0)
			{
			//�������� ������� ����������� �� ����� �� �������������, ����� ��������, � ����������������� ������
			$query="SELECT * FROM `abiturients`
					WHERE `type`='".$type."' AND `lastname`='".$lastname."' AND `firstname`='".$firstname."' AND `patronymic`='".$patronymic."'
											 AND `study_type`='".$study_type."' AND `speciality`='".$speciality."'";
    		$sql = mysql_query($query) or die(mysql_error());
    		if (mysql_num_rows($sql)>0)
    			{
    			$success='<h1 class="block" style="background:rgb(212,12,12)"> ������� '.$lastname.' '.$firstname.' '.$patronymic.' <br/>
    						�� ������������ "'.$speciality.'" <br/> �� ������ �������� "'.$study_type.'" ��� � � ���!</h1>';
    			}
    		else
    			{
				$query = "INSERT INTO `abiturients`
						(`type` , `date` , `last_edit` , `operator` , `host` , `lastname` , `firstname` , `patronymic` , `faculty` , `training` , `speciality` , `specialization` , `institution` , `qualification` , `dip_study_type` , `dip_finans` , `dip_serial` ,
						 `dip_number` , `dip_date` , `dip_honour` , `dip_average` , `dip_orig` , `cross_enter` , `study_type` , `language` , `target` , `nationality` , `pasp_serial` , `pasp_number` , `pasp_issue` ,
						 `pasp_date` , `birth_date` , `sex` , `location` , `ID_code` , `street` , `build_number` , `flat_number` , `city` , `district` , `state` , `phone` , `hostel` , `military` , `mil_doc` , `mil_issue` , `mil_date` ,
						 `benefits` , `invalid` , `syrota` , `chornob` , `inozem` , `veteran` , `chacht` , `zagybl` , `zasyadka` , `benefit_doc` , `chornob34` , `invalid3` , `finans`)
				VALUES ('".$type."' , '".date("U")."' , '".date("U")."' , '".$_SESSION["user_id"]."' , '".$_SERVER['REMOTE_ADDR']."' , '".$lastname."' , '".$firstname."' , '".$patronymic."' , '".$faculty."' , '".$training."' , '".$speciality."' , '".$specialization."' , '".$institution."' , '".$qualification."' , '".$dip_study_type."' , '".$dip_finans."' , '".$dip_serial."' ,
					'".$dip_number."' , '".$dip_date."' , '".$dip_honour."' , '".$dip_average."' , '".$dip_orig."' , '".$cross_enter."' , '".$study_type."' , '".$language."' , '".$target."' , '".$nationality."' , '".$pasp_serial."' , '".$pasp_number."' , '".$pasp_issue."' ,
					'".$pasp_date."' , '".$birth_date."' , '".$sex."' , '".$location."' , '".$ID_code."' , '".$street."' , '".$build_number."' , '".$flat_number."' , '".$city."' , '".$district."' , '".$state."' , '".$phone."' , '".$hostel."' , '".$military."' , '".$mil_doc."' , '".$mil_issue."' , '".$mil_date."' ,
					'".$benefits."' , '".$invalid."' , '".$syrota."' , '".$chornob."' , '".$inozem."' , '".$veteran."' , '".$chacht."' , '".$zagybl."' , '".$zasyadka."' , '".$benefit_doc."' , '".$chornob34."' , '".$invalid3."' , '".$finans."')";

   				$sql = mysql_query($query) or die(mysql_error());
				$success='<h1 class="block"> ��Ͳ ��� �����в���� ��ϲ��� ������Ͳ �� ���� �����!</h1>';
				unset($_POST);
				}
			}

		/*if (strncmp($_POST["training"],"0101",4)==0) $training1="0101. ���������� �����";
		if (strncmp($_POST["training"],"0305",4)==0) $training1="0305. Գ������";
		if (strncmp($_POST["training"],"0202",4)==0) $training1="0202. ���������";
		if (strncmp($_POST["training"],"0302",4)==0) $training1="0302. �����������";
		if (strncmp($_POST["training"],"0401",4)==0) $training1="0401. ���������";
		if (strncmp($_POST["training"],"0502",4)==0) $training1="0502. ����������";
		if (strncmp($_POST["training"],"0802",4)==0) $training1="0802. ��������� ����������";
		if (strncmp($_POST["training"],"0102",4)==0) $training1="0102. Գ����� ��������� � �����";*/
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

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">����� ������� <?echo $msg?> </h1>
					<div class="column1-unit">


                        <input type="hidden" name="debug" id="debug" class="field" value=""/>
						<?php
						echo $success;

						/*echo "<pre>";
						print_r($_POST);
						echo"</pre>";*/

						if (!isset($_POST['add_abit']))
							{
							if ($_SESSION["status"]=="user")
								{
								$query1 = "SELECT * FROM `access` WHERE `week_day` = '".date("l")."' LIMIT 1";
    							$sql1 = mysql_query($query1) or die(mysql_error());
    							if (mysql_num_rows($sql1) == 1)
  									{
  									$row1 = mysql_fetch_assoc($sql1);
  									if ($row1["holyday"]=="-")
            							{
            							$row1['befor_m']+=15;
            							if ((date("G")==$row1['befor_h'] && date("i")>=$row1['from_m']) ||
            								(date("G")>$row1['befor_h']))
                            				echo "<h3>�������� ������ �������� ���������� �
                            							".$row1['befor_h'].":".$row1['befor_m']." </h3>";
    							    	else
    							    		{
  											if ($_GET["add"]=="mag" || $_GET["add"]=="spc")
  												{
  												include("Parts/FormRegistred.php");
  												include("Parts/FormAbitureintAdd.php");
  												}
												else include("Parts/ChooseType.php");
  											}
    							    	}
  									}
                            	}
  							else
  								{
  								if ($_GET["add"]=="mag" || $_GET["add"]=="spc")
  									{
  									include("Parts/FormRegistred.php");
  									include("Parts/FormAbitureintAdd.php");
  									}
  								else include("Parts/ChooseType.php");
  								}
							}
                        else
  							{
  							if ($_GET["add"]=="mag" || $_GET["add"]=="spc")
  								{
  								include("Parts/FormRegistred.php");
  								include("Parts/FormAbitureintAdd.php");
  								}
							else include("Parts/ChooseType.php");
  							}
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
