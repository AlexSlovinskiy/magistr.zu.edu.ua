<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");
include ("MySQL/MysqlConnect.php");

if (!isset($_SESSION["login"]))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}

if ($_GET['act']=="new") $page_title="��������� ���� ������������";
if ($_GET['act']=="edit") $page_title="����������� ������� ������������";
if ($_GET['act']=="del") $page_title="��������� ������� ������������";
if ($_GET['act']=="spc") $page_title="������������";
if (!isset($_GET['act'])) $page_title="C����������� �� ������������";

	if (isset($_POST['add_spc']))
		{
		$error=0;		if ($_POST["faculty"]!="") $faculty=mysql_real_escape_string($_POST["faculty"]); else $error++;
		if ($_POST["training"]!="") $training=mysql_real_escape_string($_POST["training"]); else $error++;
		if ($_POST["speciality"]!="") $speciality=mysql_real_escape_string($_POST["speciality"]); else $error++;

        //�������� ��������� ������
        if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> �����Ͳ�� �������Ͳ ����, �� �������Ͳ �������� ��������!</h1>';
			}
		if ($error==0)
			{			//�������� ������� ����� �� ����-��
			$query="SELECT * FROM `specialities`
					WHERE `speciality_name`='".$speciality."'";
    		$sql = mysql_query($query) or die(mysql_error());
    		if (mysql_num_rows($sql)>0)
    			{
    			$success='<h1 class="block" style="background:rgb(212,12,12)"> ������������ '.$speciality.' ��� � � ���!</h1>';
    			}
    		else
    			{				$query = "INSERT INTO `specialities`
						( `faculty` , `training` , `speciality_name`)
				VALUES ('".$faculty."' , '".$training."' , '".$speciality."')";

   				$sql = mysql_query($query) or die(mysql_error());
				$success='<h1 class="block"> ���ֲ���Ͳ��� ��ϲ��� �������� �� ���� �����!</h1>';
				unset($_POST);
				}
			}

        }

   if (isset($_POST['del_spc']))
   		{        $error=0;
        if ($_POST["speciality"]!="") $speciality=mysql_real_escape_string($_POST["speciality"]); else $error++;
        if ($_POST["spc_del_ok"]!="+") $error++;
   		if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> ����в�� ���ֲ���Ͳ��� �� ϲ�����Ĳ�� ���������!</h1>';
			}
        if ($error==0)
			{			//�������� �������������			$query = "DELETE FROM `specialities` WHERE `speciality_name` = '".$speciality."' LIMIT 1";
			$sql = mysql_query($query) or die(mysql_error());
			//�������� ��������� ������������
			$query = "DELETE FROM `specializations` WHERE `speciality` = '".$speciality."' ";
			$sql = mysql_query($query) or die(mysql_error());
			$success='<h1 class="block"> ���ֲ���Ͳ��� �������� � ���� �����!</h1>';
			unset($_POST);
			}
   		}

 if (isset($_POST['edit_spc']))
 		{
 		$error=0;
		if ($_POST["faculty"]!="") $faculty=mysql_real_escape_string($_POST["faculty"]); else $error++;
		if ($_POST["training"]!="") $training=mysql_real_escape_string($_POST["training"]); else $error++;
		if ($_POST["speciality"]!="") $speciality=mysql_real_escape_string($_POST["speciality"]); else $error++;
		if ($_POST['new_name']=="+")
			{            if ($_POST["new_speciality"]!="") $new_speciality=mysql_real_escape_string($_POST["new_speciality"]); else $error++;
			}
		else $new_speciality=$speciality;

        //�������� ��������� ������
        if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> �����Ͳ�� �������Ͳ ����, �� �������Ͳ �������� ��������!</h1>';
			}
		if ($error==0)
			{
			$query = "UPDATE `specialities`
							SET `speciality_name` = '".$new_speciality."' , `faculty` ='".$faculty."' , `training` = '".$training."'
							WHERE `speciality_name` = '".$speciality."' LIMIT 1";
			$sql = mysql_query($query) or die(mysql_error());
			$success='<h1 class="block"> ���ֲ���Ͳ��� ��ϲ��� ²�����������!</h1>';
			unset($_POST);
			}
 		}

 if (isset($_POST['add_sub_spc']))
		{
		$error=0;
		if ($_POST["specialization"]!="") $specialization=mysql_real_escape_string($_POST["specialization"]); else $error++;
		if ($_POST["speciality"]!="") $speciality=mysql_real_escape_string($_POST["speciality"]); else $error++;

        //�������� ��������� ������
        if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> �����Ͳ�� �������Ͳ ����, �� �������Ͳ �������� ��������!</h1>';
			}
		if ($error==0)
			{
			//�������� ������� ����� �� ����-���
			$query="SELECT * FROM `specializations`
					WHERE `specialization_name`='".$specialization."'";
    		$sql = mysql_query($query) or die(mysql_error());
    		if (mysql_num_rows($sql)>0)
    			{
    			$success='<h1 class="block" style="background:rgb(212,12,12)"> ������������ '.$speciality.' ��� � � ���!</h1>';
    			}
    		else
    			{
				$query = "INSERT INTO `specializations`
						( `speciality` , `specialization_name`)
				VALUES ('".$speciality."' , '".$specialization."')";

   				$sql = mysql_query($query) or die(mysql_error());
				$success='<h1 class="block"> ���ֲ�˲��ֲ� ��ϲ��� �������� �� ���� �����!</h1>';
				unset($_POST);
				}
			}

        }

if (isset($_POST['del_sub_spc']))
   		{
        $error=0;
        if ($_POST["del_specialization"]!="") $specialization=mysql_real_escape_string($_POST["del_specialization"]); else $error++;
        if ($_POST["del_sub_spc_ok"]!="+") $error++;
   		if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> ����в�� ���ֲ�˲��ֲ� �� ϲ�����Ĳ�� ���������!</h1>';
			}
        if ($error==0)
			{
			$query = "DELETE FROM `specializations` WHERE `specialization_name` = '".$specialization."' LIMIT 1";
			$sql = mysql_query($query) or die(mysql_error());
			$success='<h1 class="block"> ���ֲ�˲��ֲ� �������� � ���� �����!</h1>';
			unset($_POST);
			}
   		}

 if (isset($_POST['edit_sub_spc']))
 		{
 		$error=0;
		if ($_POST["edit_specialization"]!="") $specialization=mysql_real_escape_string($_POST["edit_specialization"]); else $error++;
		if ($_POST["edit_speciality"]!="") $speciality=mysql_real_escape_string($_POST["edit_speciality"]); else $error++;
		if ($_POST["new_specialization"]!="") $new_specialization=mysql_real_escape_string($_POST["new_specialization"]); else $error++;
        //�������� ��������� ������
        if ($error>0)
			{
			$success='<h1 class="block" style="background:rgb(212,12,12)"> �����Ͳ�� �������Ͳ ����, �� �������Ͳ �������� ��������!</h1>';
			}
		if ($error==0)
			{
			$query = "UPDATE `specializations`
							SET `speciality` = '".$speciality."' , `specialization_name` = '".$new_specialization."'
							WHERE `specialization_name` = '".$specialization."' LIMIT 1";
			$sql = mysql_query($query) or die(mysql_error());
			$success='<h1 class="block"> ���ֲ���Ͳ��� ��ϲ��� ²�����������!</h1>';
			unset($_POST);
			}
 		}

	$element_error="border:solid 2px rgb(212,12,12);";

?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle"><?echo $page_title." ".$msg?> </h1>
					<div class="column1-unit">
						<?php
						echo $success;
						/*echo "<pre>";
						print_r($_POST);
						echo"</pre>";*/
							if ($_GET["act"]=="new") include("Parts/FormSpecialityAdd.php");
								else if ($_GET["act"]=="edit" ) include("Parts/FormSpecialityEdit.php");
									else if ($_GET["act"]=="del") include("Parts/FormSpecialityDel.php");
										else if ($_GET["act"]=="spc") include("Parts/FormSpecializations.php");
											else include("Parts/ChooseSpecAct.php");
  						?>

					</div>
            		<hr class="clear-contentunit" />
            	</div>
        	</div>

<?php

include("Scripts/SelectFacTrn.php");
include ("Parts/Footer.php");

?>
