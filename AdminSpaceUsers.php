<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");

if (($_SESSION["status"]=="user") || (!isset($_SESSION["status"])))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}

include ("MySQL/MysqlConnect.php");
//echo "<pre>";
//print_r($_POST);
//echo"</pre>";
$message_new_user="����� ��������";
$message_edit_user="�����������";
$message_del_user="���������";
$color="blue";
$border_color="subcontent-unit-border-blue";
$success="";

//*******************************************************************************************************************
//�������� ������ ������������
if ($_POST['add_login']!="" && $_POST['add_name']!="" && $_POST['add_surname']!="" && $_POST['add_patronymic']!="" && $_POST['add_pass']!="" && $_POST['add_pass1']!="" && isset($_POST['create']))
	{
	$pass = md5($_POST['add_pass']);
    $pass1 = md5($_POST['add_pass1']);
    $login = mysql_real_escape_string($_POST['add_login']);
    $surname = mysql_real_escape_string($_POST['add_surname']);
    $name = mysql_real_escape_string($_POST['add_name']);
    $patronymic = mysql_real_escape_string($_POST['add_patronymic']);
    $status=mysql_real_escape_string($_POST['add_status']);
    $executive=($_POST['executive']);
    // ������ ������ � �� � ���� ����� � ����� �������
   	$query = "SELECT `login` FROM `users` WHERE `login`='".$login."' LIMIT 1";
   	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql) == 1)
		{
		$message_new_user="���� ��� ����!";
		$color="red";
		$border_color="subcontent-unit-border-red";
  		}
  	else
  		{
  		if (strcasecmp($pass,$pass1)!=0)
  			{
  			$message_new_user="����� �� ����������!";
			$color="red";
			$border_color="subcontent-unit-border-red";
            }
   		else
            {
            $query = "INSERT INTO `users` (`login` , `pass` , `status` , `user_surname` , `user_name` , `user_patronymic` , `executive` )
            VALUES ('".$login."' , '".$pass."' , '".$status."' , '".$surname."' , '".$name."' , '".$patronymic."' , '".$executive."')";
   			$sql = mysql_query($query) or die(mysql_error());
  			$success='<h1 class="block">�������� � ��ò��� &bdquo;'.$_POST["add_login"].'&ldquo; ��ϲ��� ���������!</h1>';
        	unset($_POST);
        	}
  		}
  	}
else if(isset($_POST['create']))
	{
	$message_new_user="�� �� ���� ��������!";
	$color="red";
	$border_color="subcontent-unit-border-red";
	}


//*******************************************************************************************************************
//�������������� ������������� ������������.
if ($_GET["act"]=="edit")
	{
	include("Parts/SearchAllUsers.php"); //����� �� ���� ������������ ������������� � �������� ������.
	}

if ($_POST['edit_login']!="" && $_POST['edit_name']!="" && $_POST['edit_surname']!="" && $_POST['edit_patronymic']!="" && isset($_POST['edit']))
	{
	$pass = md5($_POST['edit_pass']);
    $pass1 = md5($_POST['edit_pass1']);
    $login = mysql_real_escape_string($_POST['edit_login']);
    $surname = mysql_real_escape_string($_POST['edit_surname']);
    $name = mysql_real_escape_string($_POST['edit_name']);
    $patronymic = mysql_real_escape_string($_POST['edit_patronymic']);
    $status=mysql_real_escape_string($_POST['edit_status']);
    $current_login=mysql_real_escape_string($_POST['users_list']);
    $executive=($_POST['executive']);
    if (strcasecmp($pass,$pass1)!=0)
  		{
  		$message_edit_user="����� �� ����������!";
		$color="red";
		$border_color="subcontent-unit-border-red";
        }
   	else
        {
        if ($_POST['edit_pass']!="" && $_POST['edit_pass1']!="")
			{
        	$query = "UPDATE `users` SET `login` = '".$login."' , `pass` = '".$pass."' , `status` = '".$status."' , `user_name` = '".$name."' , `user_surname` = '".$surname."' , `user_patronymic` = '".$patronymic."' , `executive` = '".$executive."' WHERE `login` = '".$current_login."' LIMIT 1";
   			}
   		else
   			{
        	$query = "UPDATE `users` SET `login` = '".$login."' , `status` = '".$status."' , `user_name` = '".$name."' , `user_surname` = '".$surname."' , `user_patronymic` = '".$patronymic."' , `executive` = '".$executive."' WHERE `login` = '".$current_login."' LIMIT 1";
   			}
   		$sql = mysql_query($query) or die(mysql_error());
   		$success='<h1 class="block">�̲�� ��ϲ��� �����Ͳ �� ����!</h1>';
        unset($_POST);
        include("Parts/SearchAllUsers.php"); //����� �� ���� ������������ ������������� � �������� ������ �������� ��������� ���������.
        }
  	}
else if(isset($_POST['edit']))
	{
	$message_edit_user="�� �� ���� ��������!";
	$color="red";
	$border_color="subcontent-unit-border-red";
	}


//*******************************************************************************************************************
// �������� �������������
if ($_GET["act"]=="del")
	{
	include("Parts/SearchAllUsers.php"); //����� �� ���� ������������ ������������� � �������� ������.
	}

if (isset($_POST['confirm']) && isset($_POST['del']) )
	{
    if ($_POST['users_list']=="...")
    	{
    	$message_del_user="������� ���������!";
		$color="red";
		$border_color="subcontent-unit-border-red";
        }
  	else
        {
        $current_login=mysql_real_escape_string($_POST['users_list']);
        $query = "DELETE FROM `users` WHERE `login` = '".$current_login."' LIMIT 1";
   		$sql = mysql_query($query) or die(mysql_error());
  		$success='<h1 class="block" style="background:rgb(212,12,12)">�������� � ��ò��� &bdquo;'.$_POST["users_list"].'&ldquo; ���������!</h1>';
        unset($_POST);
        include("Parts/SearchAllUsers.php"); //����� �� ���� ������������ ������������� � �������� ������ �������� ��������� ���������.
  		}
	}
else if(isset($_POST['del']))
	{
	$message_del_user="ϳ�������� ���������!";
	$color="red";
	$border_color="subcontent-unit-border-red";
	}


?>
	<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">��������� ��������� �������� ���������</h1>
            		<?
            		/*echo "<pre>";
						print_r($_POST);
					echo"</pre>";*/
					if ($_GET["act"]=="new") include ("Parts/FormUserAdd.php");
					else if ($_GET["act"]=="edit") include ("Parts/FormUserEdit.php");
						else if ($_GET["act"]=="del") include ("Parts/FormUserDel.php");
					   		else  include ("Parts/ChooseUserAction.php");
					?>
        	</div>
        </div>

<?
include ("Parts/Footer.php");
?>