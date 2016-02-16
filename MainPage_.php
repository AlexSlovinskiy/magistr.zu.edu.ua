<?php
include ("Parts/Header.php");
//��������� ����� �������� �� ��� ������
echo '<style type="text/css">
  		.main {	background:transparent url(img/bg_main_withoutnav.jpg) repeat-y;	}
		.main-content {	width:840px;}
		.column1-unit {	width:840px;}
		.clear-contentunit {width:840px;}
	 </style>';
include ("MySQL/MysqlConnect.php");


if (!isset($_SESSION["login"]))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}

$yes="img/lb_true.png";
$no="img/lb_false.png";
$copy="img/lb_copy.png";
$B="img/B.png";
$K="img/K.png";
$Y="img/Y.png";
$D="img/D.png";

$months=array("����"=>"1", "������"=>"2", "�������"=>"3", "�����"=>"4", "������"=>"5", "������"=>"6", "�����"=>"7", "������"=>"8", "�������"=>"9", "������"=>"10", "���������"=>"11", "������"=>"12");

//�������� ������� �������������
	$query_banned = "SELECT `banned`  FROM `users` WHERE `user_id`='".$_SESSION["user_id"]."' ";
    $sql_banned = mysql_query($query_banned) or die(mysql_error());
    $banned = mysql_fetch_assoc($sql_banned);
    $_SESSION["banned"]= $banned["banned"];


//��������� ������������ ������� � ����� �������
if (isset($_GET["orig"]) || isset($_GET["rec"]) || isset($_GET["fin"]) || isset($_GET["pact"]) || isset($_GET["app"]) || isset($_GET["away"]))
	{//�������� ��o�������� ������ ��������� � ���������� ��� �����������
	$query="SELECT `operator` , `lastname` , `firstname` , `patronymic` FROM `abiturients` WHERE `ab_id`='".$_GET["id"]."' LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());
    	if (mysql_num_rows($sql)==1)
    		{
    		$row= mysql_fetch_assoc($sql);

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

	//��������� �������� "����� �������� ����������"
	if ($_REQUEST["orig"]=="yes")
		{
		$query="UPDATE `abiturients` SET `dip_orig` =  '+' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						����� ���ò���� �������Ҳ�!</h1>';
		}
	if ($_REQUEST["orig"]=="no")
		{
		$query="UPDATE `abiturients` SET `dip_orig` =  '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						�� ����� ���ò���� �������Ҳ�!</h1>';
		}

	//��������� �������� "������������"
    if ($_REQUEST["rec"]=="yes")
		{
		$query="UPDATE `abiturients` SET `recommend` =  '+' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						�������������� �� �����������!</h1>';
		}
	if ($_REQUEST["rec"]=="no")
		{
		$query="UPDATE `abiturients` SET `recommend` =  '-' , `apply` =  '-' , `pact` = '-', `finans` = '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						�� �������������� �� �����������!</h1>';
		}

	//��������� �������� "������ ��� ��������"
   	if ($_REQUEST["fin"]=="b")
		{
		$query="UPDATE `abiturients` SET `finans` =  'b' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						�������������� �� ����������� �� ������!</h1>';
		}
	if ($_REQUEST["fin"]=="c")
		{
		$query="UPDATE `abiturients` SET `finans` =  'c' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						�������������� �� ����������� �� ��������!</h1>';
		}

	//��������� �������� "����� ��� �������"
   	if ($_REQUEST["pact"]=="y")
		{
		$query="UPDATE `abiturients` SET `pact` = 'y' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						����� �����!</h1>';
		}
	if ($_REQUEST["pact"]=="d")
		{
		$query="UPDATE `abiturients` SET `pact` = 'd' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						����� ����²�!</h1>';
		}
	if ($_REQUEST["pact"]=="no")
		{
		$query="UPDATE `abiturients` SET `pact` =  '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						����� ��� ����²� �� ��������!</h1>';
		}

	//��������� �������� "��������"
    if ($_REQUEST["app"]=="yes")
		{
		$query="UPDATE `abiturients` SET `apply` =  '+' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						�����������!</h1>';
		}
	if ($_REQUEST["app"]=="no")
		{
		$query="UPDATE `abiturients` SET `apply` =  '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						�� �����������!</h1>';
		}

	//��������� �������� "������ ���������"
	if ($_REQUEST["away"]=="yes")
		{
		$query="UPDATE `abiturients` SET `take_away` =  '+' , `dip_orig` =  '-' , `recommend` =  '-' , `apply` =  '-' , `pact` = '-', `finans` = '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						������ ���������!</h1>';
		}
	if ($_REQUEST["away"]=="no")
		{
		$query="UPDATE `abiturients` SET `take_away` =  '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$_GET["id"]."' LIMIT 1 ;";
		$sql = mysql_query($query) or die(mysql_error());
		$changed='<h1 class="block" style="background:rgb(137,170,214)"> �����в��� '.$row["lastname"].' '.$row["firstname"].' '.$row["patronymic"].'
    						�� ������� ���������!</h1>';
		}

	}



//��������� ��������
	if (!isset($_POST["search"]))
		{
		if (!isset($_SESSION["search_lastname"])) $_SESSION["search_lastname"]="%";
	    if (!isset($_SESSION["search_study_type"])) $_SESSION["search_study_type"]="%";
		if (!isset($_SESSION["search_speciality"])) $_SESSION["search_speciality"]="%";
		if (!isset($_SESSION["search_specialization"])) $_SESSION["search_specialization"]="%";
		if (!isset($_SESSION["search_faculty"])) $_SESSION["search_faculty"]="%";
		if (!isset($_SESSION["search_day"])) $_SESSION["search_day"]="%";
		if (!isset($_SESSION["search_month"])) $_SESSION["search_month"]="%";
		if (!isset($_SESSION["search_year"])) $_SESSION["search_year"]="%";
		if (!isset($_SESSION["search_date"])) $_SESSION["search_date"]="%";
		if (!isset($_SESSION["search_day_edit"])) $_SESSION["search_day_edit"]="%";
		if (!isset($_SESSION["search_month_edit"])) $_SESSION["search_month_edit"]="%";
		if (!isset($_SESSION["search_year_edit"])) $_SESSION["search_year_edit"]="%";
		if (!isset($_SESSION["search_date_edit"])) $_SESSION["search_date_edit"]="%";

		$date_start=mktime(0, 0, 0, 1, 1, date("Y")-1);
       	$date_end=mktime(0, 0, 0, 1, 1, date("Y")+1);
       	$date_edit_start=mktime(0, 0, 0, 1, 1, date("Y")-1);
       	$date_edit_end=mktime(0, 0, 0, 1, 1, date("Y")+1);

		if ($_SESSION["search_day"]!="%" && $_SESSION["search_month"]!="%" && $_SESSION["search_year"]!="%")
       		{
       		$_SESSION["search_date"]=mktime(0,0,0,$months[$_SESSION["search_month"]],$_SESSION["search_day"],$_SESSION["search_year"]);
       		$date_start=$_SESSION["search_date"];
       		$date_end=$date_start+86399;
       		}

  		if ($_SESSION["search_day_edit"]!="%" && $_SESSION["search_month_edit"]!="%" && $_SESSION["search_year_edit"]!="%")
       		{
       		$_SESSION["search_date_edit"]=mktime(0,0,0,$months[$_SESSION["search_month_edit"]],$_SESSION["search_day_edit"],$_SESSION["search_year_edit"]);
       		$date_edit_start=$_SESSION["search_date_edit"];
       		$date_edit_end=$date_edit_start+86399;
       		}

		if (!isset($_SESSION["search_dip_year"])) $_SESSION["search_dip_year"]="%";
		$dip_year_start=1;
		$dip_year_end=mktime(0, 0, 0, 1, 1, date("Y")+1);
		if ($_SESSION["search_dip_year"]!="%")
			{
        	if ($_SESSION["search_dip_year"]==date("Y"))
        		{
        		$dip_year_start=mktime(0, 0, 0, 1, 1, date("Y"));
        		$dip_year_end=mktime(0, 0, 0, 1, 1, date("Y")+1)-1;
        		}
        		else
        			{
        			if ($_SESSION["search_dip_year"]==(date("Y")-1))
        				{
        				$dip_year_start=mktime(0, 0, 0, 1, 1, date("Y")-1);
        				$dip_year_end=mktime(0, 0, 0, 1, 1, date("Y"))-1;
        				}
        			    else
        			    	{
        					$dip_year_start=1;
        					$dip_year_end=mktime(0, 0, 0, 1, 1, date("Y")-1)-1;
        					}
        			}
        	}

       	if (!isset($_SESSION["search_language"])) $_SESSION["search_language"]="%";
       	if (!isset($_SESSION["search_dip_type"])) $_SESSION["search_dip_type"]="%";
       	if (!isset($_SESSION["search_type"]))
       		{
       		$_SESSION["search_type"]="%";
       		$search_type="%";
       		}
       		else
       			{
       			$search_type="%";
       			if ($_SESSION["search_type"]=="������") $search_type="mag";
        		if ($_SESSION["search_type"]=="���������") $search_type="spc";
       			}
 	    if (!isset($_SESSION["search_dip_honour"]))
       		{
       		$_SESSION['search_dip_honour']="%";
       		$search_dip_honour="%";
       		}
       		else
       			{
       			$search_dip_honour="%";
                if ($_SESSION["search_dip_honour"]=="���") $search_dip_honour="+";
        		if ($_SESSION["search_dip_honour"]=="ͳ") $search_dip_honour="-";
       			}
       	if (!isset($_SESSION["search_finans"]))
       		{
       		$_SESSION['search_finans']="%";
       		$search_finans="%";
       		}
       		else
       			{
       			$search_finans="%";
                if ($_SESSION["search_finans"]=="� �������") $search_finans="b";
        		if ($_SESSION["search_finans"]=='�� ����� ���. ���') $search_finans="c";
       			}
       	if (!isset($_SESSION["search_benefit"]))
       		{
       		$_SESSION['search_benefit']="%";
       		$search_benefit="%";
       		}
       		else
       			{
       			$search_benefit="%";
                if ($_SESSION["search_benefit"]=="���") $search_benefit="+";
        		if ($_SESSION["search_benefit"]=="ͳ") $search_benefit="-";
       			}
       	if (!isset($_SESSION["search_benefit_list"]))
       		{
       		$_SESSION['search_benefit_list']="%";
       		$search_benefit_invalid="%";
       		$search_benefit_syrota="%";
       		$search_benefit_chornob="%";
       		$search_benefit_inozem="%";
       		$search_benefit_veteran="%";
       		$search_benefit_chacht="%";
       		$search_benefit_zagybl="%";
       		$search_benefit_zasyadka="%";
       		}
       		else
       			{
       			$search_benefit_invalid="%";
       			$search_benefit_syrota="%";
       			$search_benefit_chornob="%";
       			$search_benefit_inozem="%";
       			$search_benefit_veteran="%";
       			$search_benefit_chacht="%";
       			$search_benefit_zagybl="%";
       			$search_benefit_zasyadka="%";
                if ($_SESSION["search_benefit_list"]=="������� I � II �����") $search_benefit_invalid="+";
        		if ($_SESSION["search_benefit_list"]=="����� � ����� ���� ����") $search_benefit_syrota="+";
        		if ($_SESSION["search_benefit_list"]=="����������� I-II �������") $search_benefit_chornob="+";
        		if ($_SESSION["search_benefit_list"]=="�������� (���������� ����)") $search_benefit_inozem="+";
        		if ($_SESSION["search_benefit_list"]=="�������� ����") $search_benefit_veteran="+";
        		if ($_SESSION["search_benefit_list"]=="������� ���������� �����") $search_benefit_chacht="+";
        		if ($_SESSION["search_benefit_list"]=="ĳ�� �������� ���������") $search_benefit_zagybl="+";
        		if ($_SESSION["search_benefit_list"]=="ѳ�'� ��������� �� ���� ��. �������") $search_benefit_zasyadka="+";
       			}
       	if (!isset($_SESSION["search_chornob34"]))
       		{
       		$_SESSION['search_chornob34']="%";
       		$search_chornob34="%";
       		}
       		else
       			{
       			$search_chornob34="%";
                if ($_SESSION["search_chornob34"]=="���") $search_chornob34="+";
        		if ($_SESSION["search_chornob34"]=="ͳ") $search_chornob34="-";
       			}
       	if (!isset($_SESSION["search_pact"]))
       		{
       		$_SESSION['search_pact']="%";
       		$search_pact="%";
       		}
       		else
       			{
       			$search_pact="%";
                if ($_SESSION["search_pact"]=="���") $search_pact="+";
        		if ($_SESSION["search_pact"]=="ͳ") $search_pact="-";
       			}
       	if (!isset($_SESSION["search_target"]))
       		{
       		$_SESSION['search_target']="%";
       		$search_target="%";
       		}
       		else
       			{
       			$search_target="%";
                if ($_SESSION["search_target"]=="���") $search_target="+";
        		if ($_SESSION["search_target"]=="ͳ") $search_target="-";
       			}
       	if (!isset($_SESSION["search_dip_orig"]))
       		{
       		$_SESSION['search_dip_orig']="%";
       		$search_dip_orig="%";
       		}
       		else
       			{
       			$search_dip_orig="%";
                if ($_SESSION["search_dip_orig"]=="���") $search_dip_orig="+";
        		if ($_SESSION["search_dip_orig"]=="ͳ") $search_dip_orig="-";
       			}
       	if (!isset($_SESSION["search_recommend"]))
       		{
       		$_SESSION['search_recommend']="%";
       		$search_recommend="%";
       		}
       		else
       			{
       			$search_recommend="%";
                if ($_SESSION["search_recommend"]=="���") $search_recommend="+";
        		if ($_SESSION["search_recommend"]=="ͳ") $search_recommend="-";
       			}
       	if (!isset($_SESSION["search_apply"]))
       		{
       		$_SESSION['search_apply']="%";
       		$search_apply="%";
       		}
       		else
       			{
       			$search_apply="%";
                if ($_SESSION["search_apply"]=="���") $search_apply="+";
        		if ($_SESSION["search_apply"]=="ͳ") $search_apply="-";
       			}
       	if (!isset($_SESSION["search_take_away"]))
       		{
       		$_SESSION['search_take_away']="%";
       		$search_take_away="%";
       		}
       		else
       			{
       			$search_take_away="%";
                if ($_SESSION["search_take_away"]=="���") $search_take_away="+";
        		if ($_SESSION["search_take_away"]=="ͳ") $search_take_away="-";
       			}
       	if (!isset($_SESSION["search_location"]))
       		{
       		$_SESSION['search_location']="%";
       		$search_location="%";
       		}
       		else
       			{
       			$search_location="%";
                if ($_SESSION["search_location"]=="�������") $search_location="city_zt";
        		if ($_SESSION["search_location"]=="̳���") $search_location="city";
        		if ($_SESSION["search_location"]=="����") $search_location="village";
       			}

        if (!isset($_SESSION["search_nationality"]))
       		{
       		$_SESSION['search_nationality']="%";
       		$search_nationality="%";
       		}
       		else
       			{
       			$search_nationality="%";
       			if ($_SESSION["search_nationality"]=="������") $search_nationality="������";
        		if ($_SESSION["search_nationality"]=="��� ������������") $search_nationality="��� ������������";
        		if ($_SESSION["search_nationality"]=="���������") $search_nationality="���������";
				}

		if (!isset($_SESSION["search_institution"]))
       		{
       		$_SESSION['search_institution']="%";
       		$search_institution="%";
       		}
       		else
       			{
       			$search_institution="%";
       			if ($_SESSION["search_institution"]=="���") $search_institution="���";
        		if ($_SESSION["search_institution"]=="�����") $search_institution="�����";
        		}

		if (!isset($_SESSION["search_sex"]))
       		{
       		$_SESSION['search_sex']="%";
       		$search_sex="%";
       		}
       		else
       			{
       			$search_sex="%";
       			if ($_SESSION["search_sex"]=="�������") $search_sex="�������";
        		if ($_SESSION["search_sex"]=="Ƴ����") $search_sex="Ƴ����";
        		}

       	if (!isset($_SESSION["additional_search"])) $_SESSION["additional_search"]="-";
       	}

	if (isset($_POST["search"]))
		{
		if ($_POST["additional"]=="+") $_SESSION["additional_search"]="+";
			else $_SESSION["additional_search"]="-";

		if ($_POST["search_lastname"]!="") $_SESSION["search_lastname"]=mysql_real_escape_string($_POST["search_lastname"]);
			else $_SESSION["search_lastname"]="%";

		if ($_POST["search_study_type"]!="")  $_SESSION["search_study_type"]=$_POST["search_study_type"];
			else $_SESSION["search_study_type"]="%";

		if ($_POST["search_language"]!="")  $_SESSION["search_language"]=$_POST["search_language"];
			else $_SESSION["search_language"]="%";

		if ($_POST["search_type"]!="")
			{
			$_SESSION["search_type"]=$_POST["search_type"];
        	$search_type=$_SESSION["search_type"];
        	if ($_POST["search_type"]=="������") $search_type="mag";
        	if ($_POST["search_type"]=="���������") $search_type="spc";
        	}
        	else
        		{
        		$_SESSION["search_type"]="%";
        		$search_type="%";
        		}

		if ($_POST["search_speciality"]!="") $_SESSION["search_speciality"]=$_POST["search_speciality"];
       		else $_SESSION["search_speciality"]="%";

       	if ($_POST["search_faculty"]!="") $_SESSION["search_faculty"]=$_POST["search_faculty"];
       		else $_SESSION["search_faculty"]="%";

       	if ($_POST["search_day"]!="") $_SESSION["search_day"]=$_POST["search_day"];
       		else $_SESSION["search_day"]="%";

       	if ($_POST["search_month"]!="") $_SESSION["search_month"]=$_POST["search_month"];
       		else $_SESSION["search_month"]="%";

       	if ($_POST["search_year"]!="") $_SESSION["search_year"]=$_POST["search_year"];
        	else $_SESSION["search_year"]="%";

       	if ($_SESSION["search_day"]!="%" && $_SESSION["search_month"]!="%" && $_SESSION["search_year"]!="%")
       		{
       		$_SESSION["search_date"]=mktime(0,0,0,$months[$_SESSION["search_month"]],$_SESSION["search_day"],$_SESSION["search_year"]);
       		$date_start=$_SESSION["search_date"];
       		$date_end=$date_start+86399;
       		}
       		else
       			{
       			$_SESSION["search_date"]="%";
       			$date_start=mktime(0, 0, 0, 1, 1, date("Y")-1);
       			$date_end=mktime(0, 0, 0, 1, 1, date("Y")+1);
       			}

       	if ($_POST["search_day_edit"]!="") $_SESSION["search_day_edit"]=$_POST["search_day_edit"];
       		else $_SESSION["search_day_edit"]="%";

       	if ($_POST["search_month_edit"]!="") $_SESSION["search_month_edit"]=$_POST["search_month_edit"];
       		else $_SESSION["search_month_edit"]="%";

       	if ($_POST["search_year_edit"]!="") $_SESSION["search_year_edit"]=$_POST["search_year_edit"];
        	else $_SESSION["search_year_edit"]="%";

       	if ($_SESSION["search_day_edit"]!="%" && $_SESSION["search_month_edit"]!="%" && $_SESSION["search_year_edit"]!="%")
       		{
       		$_SESSION["search_date_edit"]=mktime(0,0,0,$months[$_SESSION["search_month_edit"]],$_SESSION["search_day_edit"],$_SESSION["search_year_edit"]);
       		$date_edit_start=$_SESSION["search_date_edit"];
       		$date_edit_end=$date_edit_start+86399;
       		}
       		else
       			{
       			$_SESSION["search_date_edit"]="%";
       			$date_edit_start=mktime(0, 0, 0, 1, 1, date("Y")-1);
       			$date_edit_end=mktime(0, 0, 0, 1, 1, date("Y")+1);
       			}

        if ($_SESSION["additional_search"]=="+")
        	{
        	if ($_POST["search_specialization"]!="") $_SESSION["search_specialization"]=$_POST["search_specialization"];
       			else $_SESSION["search_specialization"]="%";

            if ($_POST["search_dip_year"]!="")
        		{
        		$_SESSION["search_dip_year"]=$_POST["search_dip_year"];
        		if ($_POST["search_dip_year"]==date("Y"))
        			{
        			$dip_year_start=mktime(0, 0, 0, 1, 1, date("Y"));
        			$dip_year_end=mktime(0, 0, 0, 1, 1, date("Y")+1)-1;
        			}
        			else
        				{
        				if ($_POST["search_dip_year"]==(date("Y")-1))
        					{
        					$dip_year_start=mktime(0, 0, 0, 1, 1, date("Y")-1);
        					$dip_year_end=mktime(0, 0, 0, 1, 1, date("Y"))-1;
        					}
        				    else
        				    	{
        						$dip_year_start=1;
        						$dip_year_end=mktime(0, 0, 0, 1, 1, date("Y")-1)-1;
        						}
        				}
        		if ($_POST["search_dip_year"]=="%")
        			{
        			$_SESSION["search_dip_year"]="%";
        			$dip_year_start=1;
        			$dip_year_end=mktime(0, 0, 0, 1, 1, date("Y")+1);
        			}
        		}
        		else
        			{
        			$_SESSION["search_dip_year"]="%";
        			$dip_year_start=1;
        			$dip_year_end=mktime(0, 0, 0, 1, 1, date("Y")+1);
        			}
        	if ($_POST["search_dip_type"]!="")  $_SESSION["search_dip_type"]=$_POST["search_dip_type"];
				else $_SESSION["search_dip_type"]="%";

        	if ($_POST["search_dip_honour"]!="")
        		{
        		$_SESSION["search_dip_honour"]=$_POST["search_dip_honour"];
        		$search_dip_honour=$_SESSION["search_dip_honour"];
        		if ($_POST["search_dip_honour"]=="���") $search_dip_honour="+";
        		if ($_POST["search_dip_honour"]=="ͳ") $search_dip_honour="-";
        		}
        		else
        			{
        			$_SESSION["search_dip_honour"]="%";
        			$search_dip_honour="%";
        			}
        	if ($_POST["search_finans"]!="")
        		{
        		$_SESSION["search_finans"]=$_POST["search_finans"];
        		$search_finans=$_SESSION["search_finans"];
        		if ($_POST["search_finans"]=="� �������") $search_finans="b";
        		if ($_POST["search_finans"]=='�� ����� ���. ���') $search_finans="c";
        		}
        		else
        			{
        			$_SESSION["search_finans"]="%";
        			$search_finans="%";
        			}
			if ($_POST["search_benefit"]!="")
        		{
        		$_SESSION["search_benefit"]=$_POST["search_benefit"];
        		$search_benefit=$_SESSION["search_benefit"];
        		if ($_POST["search_benefit"]=="���") $search_benefit="+";
        		if ($_POST["search_benefit"]=="ͳ") $search_benefit="-";
        		}
        		else
      	  			{
        			$_SESSION["search_benefit"]="%";
          	      	$search_benefit="%";
					}

			if ($_POST["search_benefit_list"]!="")
        		{
        		$_SESSION["search_benefit_list"]=$_POST["search_benefit_list"];

        		if ($_SESSION["search_benefit_list"]=="������� I � II �����") $search_benefit_invalid="+";
        			else $search_benefit_invalid="%";
        		if ($_SESSION["search_benefit_list"]=="����� � ����� ���� ����") $search_benefit_syrota="+";
        			else $search_benefit_syrota="%";
        		if ($_SESSION["search_benefit_list"]=="����������� I-II �������") $search_benefit_chornob="+";
        			else $search_benefit_chornob="%";
        		if ($_SESSION["search_benefit_list"]=="�������� (���������� ����)") $search_benefit_inozem="+";
        			else $search_benefit_inozem="%";
        		if ($_SESSION["search_benefit_list"]=="�������� ����") $search_benefit_veteran="+";
        			else $search_benefit_veteran="%";
        		if ($_SESSION["search_benefit_list"]=="������� ���������� �����") $search_benefit_chacht="+";
        			else $search_benefit_chacht="%";
        		if ($_SESSION["search_benefit_list"]=="ĳ�� �������� ���������") $search_benefit_zagybl="+";
        			else $search_benefit_zagybl="%";
        		if ($_SESSION["search_benefit_list"]=="ѳ�'� ��������� �� ���� ��. �������") $search_benefit_zasyadka="+";
        			else $search_benefit_zasyadka="%";

                if ($_POST["search_benefit_list"]=="������� I � II �����") $search_benefit_invalid="+";
        		if ($_POST["search_benefit_list"]=="����� � ����� ���� ����") $search_benefit_syrota="+";
        		if ($_POST["search_benefit_list"]=="����������� I-II �������") $search_benefit_chornob="+";
        		if ($_POST["search_benefit_list"]=="�������� (���������� ����)") $search_benefit_inozem="+";
        		if ($_POST["search_benefit_list"]=="�������� ����") $search_benefit_veteran="+";
        		if ($_POST["search_benefit_list"]=="������� ���������� �����") $search_benefit_chacht="+";
        		if ($_POST["search_benefit_list"]=="ĳ�� �������� ���������") $search_benefit_zagybl="+";
        		if ($_POST["search_benefit_list"]=="ѳ�'� ��������� �� ���� ��. �������") $search_benefit_zasyadka="+";
        		}
        		else
      	  			{
        			$_SESSION["search_benefit_list"]="%";
          	      	$search_benefit_invalid="%";
       				$search_benefit_syrota="%";
       				$search_benefit_chornob="%";
       				$search_benefit_inozem="%";
       				$search_benefit_veteran="%";
       				$search_benefit_chacht="%";
       				$search_benefit_zagybl="%";
       				$search_benefit_zasyadka="%";
					}
			if ($_POST["search_chornob34"]!="")
        		{
        		$_SESSION["search_chornob34"]=$_POST["search_chornob34"];
        		$search_chornob34=$_SESSION["search_chornob34"];
        		if ($_POST["search_chornob34"]=="���") $search_chornob34="+";
        		if ($_POST["search_chornob34"]=="ͳ") $search_chornob34="-";
        		}
        		else
      	  			{
        			$_SESSION["search_chornob34"]="%";
          	      	$search_chornob34="%";
					}
			if ($_POST["search_pact"]!="")
        		{
        		$_SESSION["search_pact"]=$_POST["search_pact"];
        		$search_pact=$_SESSION["search_pact"];
        		if ($_POST["search_pact"]=="���") $search_pact="+";
        		if ($_POST["search_pact"]=="ͳ") $search_pact="-";
        		}
        		else
      	  			{
        			$_SESSION["search_pact"]="%";
          	      	$search_pact="%";
					}
            if ($_POST["search_target"]!="")
        		{
        		$_SESSION["search_target"]=$_POST["search_target"];
        		$search_target=$_SESSION["search_target"];
        		if ($_POST["search_target"]=="���") $search_target="+";
        		if ($_POST["search_target"]=="ͳ") $search_target="-";
        		}
        		else
        			{
        			$_SESSION["search_target"]="%";
	             	$search_target="%";
	        		}

        	if ($_POST["search_dip_orig"]!="")
        		{
        		$_SESSION["search_dip_orig"]=$_POST["search_dip_orig"];
        		$search_dip_orig=$_SESSION["search_dip_orig"];
        		if ($_POST["search_dip_orig"]=="���") $search_dip_orig="+";
        		if ($_POST["search_dip_orig"]=="ͳ") $search_dip_orig="-";
        		}
        		else
        			{
        			$_SESSION["search_dip_orig"]="%";
        			$search_dip_orig="%";
        			}

        	if ($_POST["search_recommend"]!="")
        		{
        		$_SESSION["search_recommend"]=$_POST["search_recommend"];
        		$search_recommend=$_SESSION["search_recommend"];
        		if ($_POST["search_recommend"]=="���") $search_recommend="+";
        		if ($_POST["search_recommend"]=="ͳ") $search_recommend="-";
        		}
        		else
        			{
        			$_SESSION["search_recommend"]="%";
              	  	$search_recommend="%";
        			}

        	if ($_POST["search_apply"]!="")
        		{
        		$_SESSION["search_apply"]=$_POST["search_apply"];
        		$search_apply=$_SESSION["search_apply"];
        		if ($_POST["search_apply"]=="���") $search_apply="+";
        		if ($_POST["search_apply"]=="ͳ") $search_apply="-";
        		}
        		else
        			{
        			$_SESSION["search_apply"]="%";
        			$search_apply="%";
        			}

        	if ($_POST["search_take_away"]!="")
        		{
        		$_SESSION["search_take_away"]=$_POST["search_take_away"];
        		$search_take_away=$_SESSION["search_take_away"];
        		if ($_POST["search_take_away"]=="���") $search_take_away="+";
        		if ($_POST["search_take_away"]=="ͳ") $search_take_away="-";
        		}
        		else
        			{
        			$_SESSION["search_take_away"]="%";
                	$search_take_away="%";
        			}

        	if ($_POST["search_location"]!="")
        		{
        		$_SESSION["search_location"]=$_POST["search_location"];
        		$search_location=$_SESSION["search_location"];
        		if ($_POST["search_location"]=="�������") $search_location="city_zt";
        		if ($_POST["search_location"]=="̳���") $search_location="city";
        		if ($_POST["search_location"]=="����") $search_location="village";
        		}
        		else
        			{
        			$_SESSION["search_location"]="%";
        			$search_location="%";
        			}

        	if ($_POST["search_nationality"]!="")
        		{
        		$_SESSION["search_nationality"]=$_POST["search_nationality"];
        		$search_nationality=$_SESSION["search_nationality"];
        		if ($_POST["search_nationality"]=="������") $search_nationality="������";
        		if ($_POST["search_nationality"]=="��� ������������") $search_nationality="��� ������������";
        		if ($_POST["search_nationality"]=="���������") $search_nationality="���������";
        		}
        		else
        			{
        			$_SESSION["search_nationality"]="%";
        			$search_nationality="%";
        			}

        	if ($_POST["search_institution"]!="")
        		{
        		$_SESSION["search_institution"]=$_POST["search_institution"];
        		$search_institution=$_SESSION["search_institution"];
        		if ($_POST["search_institution"]=="���") $search_institution="���";
        		if ($_POST["search_institution"]=="�����") $search_institution="�����";
        		}
        		else
        			{
        			$_SESSION["search_institution"]="%";
        			$search_institution="%";
        			}

        	if ($_POST["search_sex"]!="")
        		{
        		$_SESSION["search_sex"]=$_POST["search_sex"];
        		$search_sex=$_SESSION["search_sex"];
        		if ($_POST["search_sex"]=="�������") $search_sex="�������";
        		if ($_POST["search_sex"]=="Ƴ����") $search_sex="Ƴ����";
        		}
        		else
        			{
        			$_SESSION["search_sex"]="%";
        			$search_sex="%";
        			}
        	}
        	else
        		{
        		$dip_year_start=1;
       			$dip_year_end=mktime(0, 0, 0, 1, 1, date("Y")+1);
        		$_SESSION['search_dip_honour']="%"; $search_dip_honour="%";
        		$_SESSION['search_finans']="%"; $search_finans="%";
       			$_SESSION['search_benefit']="%"; $search_benefit="%";
       			$_SESSION['search_chornob34']="%"; $search_chornob34="%";
       			$_SESSION['search_pact']="%"; $search_pact="%";
       			$_SESSION['search_target']="%";  $search_target="%";
       			$_SESSION['search_dip_orig']="%"; $search_dip_orig="%";
       			$_SESSION['search_recommend']="%"; $search_recommend="%";
       			$_SESSION['search_apply']="%"; $search_apply="%";
       			$_SESSION['search_take_away']="%"; $search_take_away="%";
       			$_SESSION['search_location']="%"; $search_location="%";
       			$_SESSION['search_nationality']="%"; $search_nationality="%";
       			$_SESSION['search_institution']="%"; $search_institution="%";
       			$_SESSION['search_sex']="%"; $search_sex="%";
       			$_SESSION['search_benefit_list']="%";
       			$search_benefit_invalid="%";
       			$search_benefit_syrota="%";
       			$search_benefit_chornob="%";
       			$search_benefit_inozem="%";
       			$search_benefit_veteran="%";
       			$search_benefit_chacht="%";
       			$search_benefit_zagybl="%";
       			$search_benefit_zasyadka="%";
        		}
        }

/*echo "<pre>";
 //print_r($_POST);
 print_r($_SESSION);
// echo $search_type;
echo "</pre>";*/

// ������ ������ � �� � ���� ���� ������������ ������������
 	$query = "SELECT  SQL_CALC_FOUND_ROWS * FROM `abiturients`";
 	$sql = mysql_query($query) or die(mysql_error());
 		$sql_rows= mysql_query("SELECT FOUND_ROWS()") or die(mysql_error());
   	$num_of_rows=mysql_fetch_assoc($sql_rows);
   	$num_of_rows=$num_of_rows["FOUND_ROWS()"];


    $_SESSION["page"]=1; //�� ��������� ������
	if ($_GET["page"]!="") $_SESSION["page"]=$_GET["page"]; //���������� ��������

    if (!isset($_SESSION["lim"])) $_SESSION["lim"]=20; //�� ��������� ������� �� ��������
	if ($_GET["lim"]!="") $_SESSION["lim"]=$_GET["lim"]; //���������� ���������� ������� �� ��������

    if ($_SESSION["lim"]=='��') $limit_on_page=$num_of_rows;
    	else $limit_on_page=$_SESSION["lim"];

   	$offset=($_GET["page"]-1)*$limit_on_page;
    if (!isset($_GET["page"]) || $_GET["page"]<1) $offset=0;
   	$query = "SELECT  SQL_CALC_FOUND_ROWS * FROM `abiturients`
   				WHERE `lastname` like '%".$_SESSION["search_lastname"]."%' AND
   					`speciality` like '".$_SESSION["search_speciality"]."' AND
   					`specialization` like '".$_SESSION["search_specialization"]."' AND
   					`faculty` like '".$_SESSION["search_faculty"]."' AND
   					`study_type` like '".$_SESSION["search_study_type"]."' AND
   					`language` like '".$_SESSION["search_language"]."' AND
   					`qualification` like '".$_SESSION["search_dip_type"]."' AND
   					`type` like '".$search_type."' AND
   					`dip_honour` like '".$search_dip_honour."' AND
   					`finans` like '".$search_finans."' AND
                    `benefits` like '".$search_benefit."' AND
                    `invalid` like '".$search_benefit_invalid."' AND
       				`syrota` like '".$search_benefit_syrota."' AND
       				`chornob` like '".$search_benefit_chornob."' AND
       				`inozem` like '".$search_benefit_inozem."' AND
       				`veteran` like '".$search_benefit_veteran."' AND
       				`chacht` like '".$search_benefit_chacht."' AND
       				`zagybl` like '".$search_benefit_zagybl."' AND
       				`zasyadka` like '".$search_benefit_zasyadka."' AND

                    `chornob34` like '".$search_chornob34."' AND
                    `target` like '".$search_target."' AND
                    `dip_orig` like '".$search_dip_orig."' AND
                    `recommend` like '".$search_recommend."' AND
                    `apply` like '".$search_apply."' AND
                    `take_away` like '".$search_take_away."' AND
                    `location` like '".$search_location."' AND
                    (`date` BETWEEN '".$date_start."' AND '".$date_end."') AND
                    (`last_edit` BETWEEN '".$date_edit_start."' AND '".$date_edit_end."') AND
   					(`dip_date` BETWEEN '".$dip_year_start."' AND '".$dip_year_end."')";

   			if ($search_pact=='+') $query=$query." AND `pact` <> '-' AND `pact` <>'' ";
   			if ($search_pact=='-') $query=$query." AND `pact` like '".$search_pact."' ";

            if ($search_institution=='���') $query=$query." AND `institution` = '��� ���� �. ������' ";
   			if ($search_institution=='�����') $query=$query." AND `institution` <> '��� ���� �. ������' ";

   			if ($search_sex=='�������') $query=$query." AND `sex` = 'male' ";
   			if ($search_sex=='Ƴ����') $query=$query." AND `sex` = 'female' ";

   			if ($search_nationality=='���������')
   				$query=$query." AND `nationality` <> '������' AND `nationality` <> '��� ������������' ";
   					else $query=$query." AND `nationality` like '".$search_nationality."' ";

    $_SESSION['query']=$query;
    $_SESSION['query']=$_SESSION['query']."ORDER BY `lastname`";

 	$query=$query."ORDER BY `lastname` LIMIT ".$offset.", ". $limit_on_page."";

    $sql = mysql_query($query) or die(mysql_error());

   	$sql_rows= mysql_query("SELECT FOUND_ROWS()") or die(mysql_error());
   	$num_of_rows=mysql_fetch_assoc($sql_rows);
   	$num_of_rows=$num_of_rows["FOUND_ROWS()"];

	$num_of_pages=floor($num_of_rows/$limit_on_page);
	if (($num_of_rows%$limit_on_page)!=0)
    	{
    	$limit_last_page=$num_of_rows-$num_of_pages*$limit_on_page;
    	$num_of_pages+=1;
    	}
    	else $limit_last_page=$limit_on_page;
    if ($num_of_rows<$limit_on_page) $limit_on_page=$num_of_rows;

    if ($_GET["page"]>$num_of_pages)
    	{
    	print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php?page=".$num_of_pages."\">";
		exit();
    	}

    //��������� ����������� �������
   	if (mysql_num_rows($sql)>0)
   		{
   		$id = array();
   		$type = array();
   		$coping = array();
   		$name = array();
   		$date = array();
   		$last_edit = array();
   		$speciality = array();
        $study_type = array();
        $bal = array();
        $dip_orig = array();
        $recommend = array();
        $finans = array();
        $pact = array();
        $apply = array();
        $take_away = array();

   		while ($row = mysql_fetch_assoc($sql))
   			{
   			$id[]=$row['ab_id'];
   			$type[]=$row["type"];

   			$date[]="<span style='color:green'>".date("d.m.Y H:i", $row['date'])."</span>";
   			$last_edit[]="<span style='color:red'>".date("d.m.Y H:i", $row['last_edit'])."</span>";

        	//������ ����� ��������� � ������� ��������������
   			$query_operator = "SELECT `login` , `banned`  FROM `users` WHERE `user_id`='".$row['operator']."' LIMIT 1";
            $sql_operator = mysql_query($query_operator) or die(mysql_error());
            if (mysql_num_rows($sql_operator)>0)
   		   		{
				$operator = mysql_fetch_assoc($sql_operator);
				}

            $speciality[]=substr($row['speciality'],0,8)."<br /><strong>".$operator["login"]."<strong>";
        	$study_type[]=$row['study_type'];
        	$sum=$row['bal1']+$row['bal2'];

			//���������� ���� �� �������������� � �������� ���������
   			if ($_SESSION['status']=="admin" || $_SESSION['status']=="root")
   				{ //���� �����  ���� ������ �� ��������� ���� �������
   				$coping[]="<a href='AbiturientCopy.php?id=".$row['ab_id']."' title='�������� ������'><img src=".$copy." alt='����' style='border:0px'/></a>";
   				$name[]="<a href='AbiturientEdit.php?id=".$row['ab_id']."' title='����������'>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</a>";
   				$bal[]="<a href='ExamsEdit.php?id=".$row['ab_id']."' title='������'>".$sum."</a>";
   				if ($row['dip_orig']=="+") $dip_orig[]="<a href='MainPage.php?orig=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$yes." alt='���' style='border:0px'/></a>";
        			else $dip_orig[]="<a href='MainPage.php?orig=yes&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
				if ($row['recommend']=="+")
					{
					$recommend[]="<a href='MainPage.php?rec=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������' class='confirm'><img src=".$yes." alt='���' style='border:0px'/></a>";
                    if ($row['qualification']!="��������") $finans[]="<img src=".$K." alt='��������' style='border:0px'/>";
                    	//else if ($row['dip_date']<mktime(0,0,0,0,0,date("Y"))) $finans[]="<img src=".$K." alt='��������' style='border:0px'/>";
                    		else
                    		{
    						if ($row['finans']=="c") $finans[]="<a href='MainPage.php?fin=b&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$K." alt='��������' style='border:0px'/></a>";
        						else if ($row['finans']=="b") $finans[]="<a href='MainPage.php?fin=c&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$B." alt='������' style='border:0px'/></a>";
                    				else $finans[]="<a href='MainPage.php?fin=c&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
                    		}

                    if ($row['pact']=="-")
                    	{
                    	if ($row['finans']=="c") $pact[]="<a href='MainPage.php?pact=d&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
                     		else if ($row['finans']=="b") $pact[]="<a href='MainPage.php?pact=y&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
                    			else $pact[]="<img src=".$no." alt='�' style='border:0px'/>";
                    	}
                    if ($row['pact']!="-")
                    	{
                    	if ($row['finans']=="c") $pact[]="<a href='MainPage.php?pact=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$D." alt='�' style='border:0px'/></a>";
                        	else if ($row['finans']=="b") $pact[]="<a href='MainPage.php?pact=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$Y." alt='�' style='border:0px'/></a>";
                        		else $pact[]="<img src=".$no." alt='�' style='border:0px'/>";
                        }

                    if ($row['apply']=="+") $apply[]="<a href='MainPage.php?app=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$yes." alt='���' style='border:0px'/></a>";
        				else $apply[]="<a href='MainPage.php?app=yes&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";

        			}
        			else
        			{
        			$recommend[]="<a href='MainPage.php?rec=yes&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
                    $finans[]="<img src=".$no." alt='�' style='border:0px'/>";
                    $pact[]="<img src=".$no." alt='�' style='border:0px'/>";
                    $apply[]="<img src=".$no." alt='�' style='border:0px'/>";
                    }
				if ($row['take_away']=="+") $take_away[]="<a href='MainPage.php?away=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$yes." alt='���' style='border:0px'/></a>";
        			else $take_away[]="<a href='MainPage.php?away=yes&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
   				}
   			else
   				{
   				if ($_SESSION['user_id']==$row['operator'] )
   					{ //���� ������ ������ ������������ ������������ � �� ����� ������ ��������������, �� ���� ��� ������ �� ���������
   					if ($_SESSION["banned"]=="+")
   						{
   						$coping[]="<img src=".$copy." alt='����' style='border:0px'/>";
   						$name[]=$row['lastname']." ".$row['firstname']." ".$row['patronymic'];
   						$bal[]="<a href='ExamsEdit.php?id=".$row['ab_id']."' title='������'>".$sum."</a>";
   						}
   					if ($_SESSION["banned"]=="-")
   						{
   						$coping[]="<a href='AbiturientCopy.php?id=".$row['ab_id']."' title='�������� ������'><img src=".$copy." alt='����' style='border:0px'/></a>";
   						$name[]="<a href='AbiturientEdit.php?id=".$row['ab_id']."' title='����������'>".$row['lastname']." ".$row['firstname']." ".$row['patronymic']."</a>";
   						$bal[]="<a href='ExamsEdit.php?id=".$row['ab_id']."' title='������'>".$sum."</a>";
   					    }
   					if ($row['dip_orig']=="+") $dip_orig[]="<a href='MainPage.php?orig=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$yes." alt='���' style='border:0px'/></a>";
        				else $dip_orig[]="<a href='MainPage.php?orig=yes&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
					if ($row['recommend']=="+")
						{
						$recommend[]="<a href='MainPage.php?rec=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������' class='confirm'><img src=".$yes." alt='���' style='border:0px'/></a>";
    					if ($row['qualification']!="��������") $finans[]="<img src=".$K." alt='��������' style='border:0px'/>";
                    	//else if ($row['dip_date']<mktime(0,0,0,0,0,date("Y"))) $finans[]="<img src=".$K." alt='��������' style='border:0px'/>";
                    		else
                    		{
    						if ($row['finans']=="c") $finans[]="<a href='MainPage.php?fin=b&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$K." alt='��������' style='border:0px'/></a>";
        						else if ($row['finans']=="b") $finans[]="<a href='MainPage.php?fin=c&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$B." alt='������' style='border:0px'/></a>";
                    				else $finans[]="<a href='MainPage.php?fin=c&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
                    		}

              			if ($row['pact']=="-")
                    		{
                    		if ($row['finans']=="c") $pact[]="<a href='MainPage.php?pact=d&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
                     			else if ($row['finans']=="b") $pact[]="<a href='MainPage.php?pact=y&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
                    				else $pact[]="<img src=".$no." alt='�' style='border:0px'/>";
                    		}
                    	if ($row['pact']!="-")
                    		{
                    		if ($row['finans']=="c") $pact[]="<a href='MainPage.php?pact=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$D." alt='�' style='border:0px'/></a>";
                        		else if ($row['finans']=="b") $pact[]="<a href='MainPage.php?pact=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$Y." alt='�' style='border:0px'/></a>";
                        			else $pact[]="<img src=".$no." alt='�' style='border:0px'/>";
                        	}

                    	if ($row['apply']=="+") $apply[]="<a href='MainPage.php?app=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$yes." alt='���' style='border:0px'/></a>";
        					else $apply[]="<a href='MainPage.php?app=yes&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
        				}
        			else
        				{
        				$recommend[]="<a href='MainPage.php?rec=yes&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
                    	$finans[]="<img src=".$no." alt='�' style='border:0px'/>";
                    	$pact[]="<img src=".$no." alt='�' style='border:0px'/>";
                    	$apply[]="<img src=".$no." alt='�' style='border:0px'/>";
                    	}
					if ($row['take_away']=="+") $take_away[]="<a href='MainPage.php?away=no&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$yes." alt='���' style='border:0px'/></a>";
        			else $take_away[]="<a href='MainPage.php?away=yes&id=".$row['ab_id']."&page=".$_SESSION["page"]."#top' title='������'><img src=".$no." alt='�' style='border:0px'/></a>";
   					}
   				else
   					{ //���� ������ ������ ������ ������������, ������ �������� ��� ���������� ��� ����������� ���������
   					if ($_SESSION["banned"]=="+")
   						{
   						$coping[]="<img src=".$copy." alt='����' style='border:0px'/>";
   						}
   					if ($_SESSION["banned"]=="-")
   						{
   						$coping[]="<a href='AbiturientCopy.php?id=".$row['ab_id']."' title='�������� ������'><img src=".$copy." alt='����' style='border:0px'/></a>";
   						}
   					$name[]=$row['lastname']." ".$row['firstname']." ".$row['patronymic'];
   					$bal[]="<strong>".$sum."</strong>";
   					if ($row['dip_orig']=="+") $dip_orig[]="<img src=".$yes." alt='���' style='border:0px'/>";
        				else $dip_orig[]="<img src=".$no." alt='�' style='border:0px'/>";
					if ($row['recommend']=="+")
						{
						$recommend[]="<img src=".$yes." alt='���' style='border:0px'/>";
        				if ($row['finans']=="b") $finans[]="<img src=".$B." alt='������' style='border:0px'/>";
                    	if ($row['finans']=="c") $finans[]="<img src=".$K." alt='��������' style='border:0px'/>";
        				}
        				else
        					{
        					$recommend[]="<img src=".$no." alt='�' style='border:0px'/>";
							$finans[]="<img src=".$no." alt='�' style='border:0px'/>";
							}
                    if ($row['pact']=="-") $pact[]="<img src=".$no." alt='�' style='border:0px'/>";
                    if ($row['pact']=="y") $pact[]="<img src=".$Y." alt='�����' style='border:0px'/>";
                    if ($row['pact']=="d") $pact[]="<img src=".$D." alt='������' style='border:0px'/>";
					if ($row['apply']=="+") $apply[]="<img src=".$yes." alt='���' style='border:0px'/>";
        				else $apply[]="<img src=".$no." alt='�' style='border:0px'/>";
           			if ($row['take_away']=="+") $take_away[]="<img src=".$yes." alt='���' style='border:0px'/>";
        				else $take_away[]="<img src=".$no." alt='�' style='border:0px'/>";
   					}
   				}
			}
		$success='<h1 class="block" > �������� �����в��Ҳ�: '.$num_of_rows.' </h1>';
    	}
   	else
   		{
   		$success='<h1 class="block" style="background:rgb(212,12,12)"> �� �������� ������� �����в���� � ��ǲ !</h1>';
   		$limit_on_page=0;
   		}
?>
<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">���������� ��� ��������</h1>
					<div class="column1-unit">
						<?include ("Parts\FilterForm.php");?>
					</div>
					<?echo $success?>
					<a name="top"></a>
					<?echo $changed;?>
						<ul>
            				<li style="display:inline;">
            					<span style="color:rgb(80,80,80); font-weight:bold;">������ �� �������: </span>
            					&nbsp;&nbsp;<a href="<?echo $_SERVER['SCRIPT_NAME']?>?lim=10" title="10" <?if ($_SESSION["lim"]==10) echo"style='font-size:110%; color:rgb(98,143,23);'";?>>10</a>
            					&nbsp;&nbsp;<a href="<?echo $_SERVER['SCRIPT_NAME']?>?lim=20" title="20" <?if ($_SESSION["lim"]==20) echo"style='font-size:110%; color:rgb(98,143,23);'";?>>20</a>
            					&nbsp;&nbsp;<a href="<?echo $_SERVER['SCRIPT_NAME']?>?lim=50" title="50" <?if ($_SESSION["lim"]==50) echo"style='font-size:110%; color:rgb(98,143,23);'";?>>50</a>
            					&nbsp;&nbsp;<a href="<?echo $_SERVER['SCRIPT_NAME']?>?lim=��" title="��" <?if ($_SESSION["lim"]==��) echo"style='font-size:110%; color:rgb(98,143,23);'";?>>��</a>
            				    <a href="FiltredList.php" title="��������� �������" style="float:right; padding-right:10px;">��������� ������</a>
            				</li>
            			</ul>
        			<div class="column1-unit">
          				<div style="overflow:auto">
						<table id="Tabiturients">
            				<tr>
            					<th class="top" scope="col">����</th>
            					<th class="top" scope="col">� <br />�\�</th>
            					<th class="top" scope="col">ϲ� ��������</th>
            					<th class="top" scope="col">���� �������<br />�� ������ �������.</th>
            					<th class="top" scope="col">����-���<br />�� ��'� ���������</th>
            					<th class="top" scope="col">����� ����.</th>
                                <th class="top" scope="col">���� ����</th>
                                <th class="top" scope="col">����� ����. �����.</th>
                                <th class="top" scope="col">�����. �� �����.</th>
                                <th class="top" scope="col">���� ��� ���-��</th>
                                <th class="top" scope="col">����� ����� ��� �����.</th>
                                <th class="top" scope="col">�����.</th>
                                <th class="top" scope="col">������<br />���-��.</th>

                 			</tr>
                 			<?php
                 			if ($num_of_rows>0)
                 				{
                 				//���� ��������� �������� �� ����� ����������� ���������
                 				if ($_GET["page"]==$num_of_pages) $limit=$limit_last_page;
                 					else $limit=$limit_on_page;

                 			    for ($i=0; $i<$limit; $i++)
                 					{
                 					$n=$i+$offset+1;
                 					if ($i%2 == 0) $coloredRow="coloredRow";
                 					else $coloredRow="";
                 					echo"
            							<tr class='".$coloredRow."'>
            								<td>".$coping[$i]."</td>
                                			<td>".$n."</td>
            								<th scope='row'>".$name[$i]."</th>
            								<td>".$date[$i]." ".$last_edit[$i]."</td>
            								<td>".$speciality[$i]."</td>
            								<td>".$study_type[$i]."</td>
            								<td>".$bal[$i]."</td>
            								<td>".$dip_orig[$i]."</td>
            								<td>".$recommend[$i]."</td>
            								<td>".$finans[$i]."</td>
            								<td>".$pact[$i]."</td>
            								<td>".$apply[$i]."</td>
                                            <td>".$take_away[$i]."</td>
            							</tr>";
            						}
            					}
							?>
						</table>
							<script type="text/javascript">
								//��������� ��� ��������� ����� �� ���
								highlightTableRows("Tabiturients","hoverRow","clickedRow");
							</script>
						</div>
          				<p class="caption">
          					<?
          					if ($num_of_pages>0)
          						{
          						echo "�������: <a href='MainPage.php?page=1#top' title='����� �������'>&nbsp;&lt;&lt;&nbsp;</a>";
          						if ($num_of_pages>15)
          						 	{
          						 	$start=$_GET["page"]-7;
          						 	$end=$_GET["page"]+7;
          						 	if (($_GET["page"]-7)<=0)
          						 		{
          						 		$start=1;
          						 		$end=15;
          						 		}
          						 	if (($_GET["page"]+7)>=$num_of_pages)
          						 		{
          						 		$end=$num_of_pages;
          						 		$start=$num_of_pages-14;
          						 		}


          						 	for ($i=$start; $i<=$end; $i++)
                 						{
                 						if ($i==$_GET["page"])
                 					 		echo "<a href='MainPage.php?page=".$i."#top' title='������� ".$i."' style='font-size:115%; color:rgb(98,143,23);'>&nbsp;".$i."&nbsp;</a>";
                 					 		else if (!isset($_GET["page"]) && $i==1)
                 					 			echo "<a href='MainPage.php?page=".$i."#top' title='������� ".$i."' style='font-size:115%; color:rgb(98,143,23);'>&nbsp;".$i."&nbsp;</a>";
                          							else echo "<a href='MainPage.php?page=".$i."#top' title='������� ".$i."'>&nbsp;".$i."&nbsp;</a>";
                 						}
          						 	}
          						else
          							{
          							for ($i=1; $i<=$num_of_pages; $i++)
                 						{
                 						if ($i==$_GET["page"])
                 					 		echo "<a href='MainPage.php?page=".$i."#top' title='������� ".$i."' style='font-size:115%; color:rgb(98,143,23);'>&nbsp;".$i."&nbsp;</a>";
                 					 		else if (!isset($_GET["page"]) && $i==1)
                 					 			echo "<a href='MainPage.php?page=".$i."#top' title='������� ".$i."' style='font-size:115%; color:rgb(98,143,23);'>&nbsp;".$i."&nbsp;</a>";
                          							else echo "<a href='MainPage.php?page=".$i."#top' title='������� ".$i."'>&nbsp;".$i."&nbsp;</a>";
                 						}
                 					}
                 				echo "<a href='MainPage.php?page=".$num_of_pages."#top' title='������� �������'>&nbsp;&gt;&gt;&nbsp;</a>";
                 				}
          					?>
          				</p>
        			</div>
					<hr class="clear-contentunit" />
            	</div>
        	</div>
<?php
include ("Parts/Footer.php")
?>
