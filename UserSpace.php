<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");

include ("MySQL/MysqlConnect.php");
//echo "<pre>";
//print_r($_POST);
//echo"</pre>";
$message_edit_user="�����������";
$color="blue";
$border_color="subcontent-unit-border-blue";
$success="";

//*******************************************************************************************************************
//�������������� ������������� ������������.
$_POST['cur_login']=$_SESSION['login'];
if ($_POST['edit_login']=="") $_POST['edit_login']=$_SESSION['login'];

if ($_POST['edit_login']!="" && $_POST['cur_login']!="" && $_POST['edit_pass']!="" && $_POST['edit_pass1']!="" && isset($_POST['edit']))
	{
	$pass = md5($_POST['edit_pass']);
    $pass1 = md5($_POST['edit_pass1']);
    $login = mysql_real_escape_string($_POST['edit_login']);
    if (strcasecmp($pass,$pass1)!=0)
  		{
  		$message_edit_user="����� �� ����������!";
		$color="red";
		$border_color="subcontent-unit-border-red";
        }
   	else
        {
        $query = "UPDATE `users` SET `login` = '".$login."' , `pass` = '".$pass."' WHERE `login` = '".$_SESSION['login']."' LIMIT 1";
   		$sql = mysql_query($query) or die(mysql_error());
   		$success='<h1 class="block">��ز ��Ͳ ���� �̲����!</h1>';
   		$success=$success.'<h1 class="block">����-����� �������� ������������� � �����̲!</h1>';
        unset($_POST);
        $_SESSION['ReLogin']=1;
        print "<meta http-equiv=\"Refresh\" content=\"4;URL=Logout.php\">";
		}
  	}
else if(isset($_POST['edit']))
	{
	$message_edit_user="�� �� ���� ��������!";
	$color="red";
	$border_color="subcontent-unit-border-red";
	}


?>
	<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">���� ������������ ����� ���������</h1>
            		<?
            		/*echo "<pre>";
						print_r($_POST);
					echo"</pre>";*/

					?>
					<?echo $success;?>
        			<div class="main-subcontent">
          				<div class="<?echo $border_color;?>">
          				<div class="round-border-topleft"></div>
          				<div class="round-border-topright"></div>
          				<h1 class="<?echo $color;?>"><?echo $message_edit_user;?></h1>
             				<div class="loginform">
            					<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              						<fieldset>
              						<?echo $list_of_users;?>
                					<p><label for="cur_login" class="top">�������� ����:</label><br />
					               	<input type="text" name="cur_login" id="cur_login" tabindex="10" class="field" readonly="" value="<?=$_POST['cur_login']?>" /></p>
					               	<p><label for="edit_login" class="top">����� ����:</label><br />
					               	<input type="edit_login" name="edit_login" id="edit_login" tabindex="20" class="field" value="<?=$_POST['edit_login']?>" /></p>
					               	<p><label for="pass" class="top">����� ������:</label><br />
                  					<input type="password" name="edit_pass" id="edit_pass" tabindex="40" class="field" value="" /></p>
                  					<p><label for="pass1" class="top">ϳ��������� ������ :</label><br />
                  					<input type="password" name="edit_pass1" id="edit_pass1" tabindex="50" class="field" value="" /></p>
									<p><input type="submit" name="edit" class="button" tabindex="80" value="��"  /></p>
	            					</fieldset>
            					</form>
            					</div>
        				</div>
            		</div>
            		<hr class="clear-contentunit" />
        	</div>
        </div>

<?
include ("Parts/Footer.php");
?>