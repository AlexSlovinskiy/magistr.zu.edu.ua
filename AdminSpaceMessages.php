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
$message_edit="Редагування повідомлення";
$success="";

//*******************************************************************************************************************

//Створення повідомлення
if ($_POST['mes_header']!="" && $_POST['mes_text']!="" && isset($_POST['edit_mes']))
	{	$mes_header = mysql_real_escape_string($_POST['mes_header']);
    $mes_text = mysql_real_escape_string($_POST['mes_text']);
    /*if (isset($_POST['visible'])) $visible=1;
    	else $visible=0;*/
    $query = "UPDATE `messages` SET `mes_header` = '".$mes_header."',
									`mes_text` = '".$mes_text."' WHERE `mes_id` = 1;";
   	$sql = mysql_query($query) or die(mysql_error());
   	/*if ($visible==0) $visible="&bdquo;НЕАКТИВНА&ldquo;"; else $visible="&bdquo;АКТИВНА&ldquo;";*/  	$success='<h1 class="block">ПОВІДОМЛЕННЯ УСПІШНО ВІДРЕДАГОВАНО!</h1>';
    $_SESSION['mes_header']=$mes_header;
  	$_SESSION['mes_text']=$mes_text;
    unset($_POST);
  	}
else if(isset($_POST['add_news']))
	{	$success='<h1 class="block" style="background:rgb(212,12,12)"> НЕ ВСІ ПОЛЯ ЗАПОВНЕНІ!</h1>';
	}

//редагування правил
if ($_POST['rule_text']!="" && isset($_POST['edit_rule']))
	{
	$rule_text = mysql_real_escape_string($_POST['rule_text']);
    /*if (isset($_POST['visible'])) $visible=1;
    	else $visible=0;*/
    $query = "UPDATE `messages` SET `mes_text` = '".$rule_text."' WHERE `mes_id` = 2;";
   	$sql = mysql_query($query) or die(mysql_error());
   	/*if ($visible==0) $visible="&bdquo;НЕАКТИВНА&ldquo;"; else $visible="&bdquo;АКТИВНА&ldquo;";*/
  	$success='<h1 class="block">ПРАВИЛА УСПІШНО ВІДРЕДАГОВАНІ!</h1>';
    $_SESSION['rule_text']=$rule_text;
    unset($_POST);
  	}
else if(isset($_POST['add_news']))
	{
	$success='<h1 class="block" style="background:rgb(212,12,12)"> НЕ ВСІ ПОЛЯ ЗАПОВНЕНІ!</h1>';
	}



?>
	<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">Управління повідомленнями та правилами прийому</h1>
            		<?
					include ("Parts/FormMesEdit.php");
					?>
        	</div>
        </div>

<?
include ("Parts/Footer.php");
?>