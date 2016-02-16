<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");
include ("MySQL/MysqlConnect.php");

if (($_SESSION["status"]=="user") || (!isset($_SESSION["status"])))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
	exit();
	}


if (isset($_POST["set_ban"]))
	{
	if ($_POST['ban']=="+")
		{
		$query = "UPDATE `users` SET `banned` = '+' WHERE `status` = 'user' OR `status` = 'guest' ";
		$sql = mysql_query($query) or die(mysql_error());
		$success='<h1 class="block" style="background:rgb(212,12,12)"> �Ѳ� ���������� ����������� �������� ����������� �����!</h1>';
		}
	else
		{
		$query = "UPDATE `users` SET `banned` = '-' WHERE `status` = 'user' OR `status` = 'guest' ";
		$sql = mysql_query($query) or die(mysql_error());
		$success='<h1 class="block"> �Ѳ� ���������� ��������� ����������� �����!</h1>';
		}

	if ($_POST['login_ban']=="+")
		{
		$query = "UPDATE `users` SET `status` = 'guest' WHERE `status` = 'user' ";
		$sql = mysql_query($query) or die(mysql_error());
		$success=$success.'<h1 class="block" style="background:rgb(212,12,12)"> �Ѳ� ���������� ����������� �������� ����� � �������!</h1>';
		}
	else
		{
		$query = "UPDATE `users` SET `status` = 'user' WHERE `status` = 'guest' ";
		$sql = mysql_query($query) or die(mysql_error());
		$success=$success.'<h1 class="block"> �Ѳ� ���������� ��������� �ղ� � �������!</h1>';
		}

	if ($_POST['show_results']=="+")
		{
		$query = "UPDATE `access` SET `show_results` = '+' WHERE `week_day` = 'all' ";
		$sql = mysql_query($query) or die(mysql_error());
		$success=$success.'<h1 class="block" > ���������� �����������!</h1>';
		}
	else
		{
		$query = "UPDATE `access` SET `show_results` = '-' WHERE `week_day` = 'all' ";
		$sql = mysql_query($query) or die(mysql_error());
		$success=$success.'<h1 class="block" style="background:rgb(212,12,12)"> ���������� � �����Ѳ �������!</h1>';
		}

	if ($_POST['reg_ban']=="+")
		{
		$query = "UPDATE `access` SET `temp_reg` = '+' WHERE `week_day` = 'all' ";
		$sql = mysql_query($query) or die(mysql_error());
		$success=$success.'<h1 class="block" style="background:rgb(212,12,12)"> ������ �� ���������ί �Ū����ֲ� ����������!</h1>';
		}
	else
		{
		$query = "UPDATE `access` SET `temp_reg` = '-' WHERE `week_day` = 'all' ";
		$sql = mysql_query($query) or die(mysql_error());
		$success=$success.'<h1 class="block"> ������ �� ���������ί �Ū����ֲ� ���������!</h1>';
		}
	}
else
	{
	$query = "SELECT `banned`, `status` FROM `users` WHERE `status` = 'user' OR `status` = 'guest'";
	$sql = mysql_query($query) or die(mysql_error());
    $row=mysql_fetch_assoc($sql);
    $_POST["ban"]=$row["banned"];
    if ($row["status"]=='guest') $_POST['login_ban']='+';
    if ($row["status"]=='user') $_POST['login_ban']='-';

    $query = "SELECT `temp_reg` , `show_results` FROM `access` WHERE `week_day` = 'all'";
	$sql = mysql_query($query) or die(mysql_error());
    $row=mysql_fetch_assoc($sql);
    $_POST["reg_ban"]=$row["temp_reg"];
    $_POST["show_results"]=$row["show_results"];
    }



if (isset($_POST["set_access"]))
	{
	//��������
    if ($_POST['Monday_hday']=="+") $Monday_hday="+"; else $Monday_hday="-";
    if ($_POST['Tuesday_hday']=="+") $Tuesday_hday="+"; else $Tuesday_hday="-";
    if ($_POST['Wednesday_hday']=="+") $Wednesday_hday="+"; else $Wednesday_hday="-";
    if ($_POST['Thursday_hday']=="+") $Thursday_hday="+"; else $Thursday_hday="-";
    if ($_POST['Friday_hday']=="+") $Friday_hday="+"; else $Friday_hday="-";
    if ($_POST['Saturday_hday']=="+") $Saturday_hday="+"; else $Saturday_hday="-";
    if ($_POST['Sunday_hday']=="+") $Sunday_hday="+"; else $Sunday_hday="-";

	$query = "UPDATE `access` SET `holyday` = '".$Monday_hday."' WHERE `week_day` = 'Monday' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	$query = "UPDATE `access` SET `holyday` = '".$Tuesday_hday."' WHERE `week_day` = 'Tuesday' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	$query = "UPDATE `access` SET `holyday` = '".$Wednesday_hday."' WHERE `week_day` = 'Wednesday' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	$query = "UPDATE `access` SET `holyday` = '".$Thursday_hday."' WHERE `week_day` = 'Thursday' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	$query = "UPDATE `access` SET `holyday` = '".$Friday_hday."' WHERE `week_day` = 'Friday' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	$query = "UPDATE `access` SET `holyday` = '".$Saturday_hday."' WHERE `week_day` = 'Saturday' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	$query = "UPDATE `access` SET `holyday` = '".$Sunday_hday."' WHERE `week_day` = 'Sunday' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());

    //�����������
    if  (isset($_POST['Monday_from_h']) && isset($_POST['Monday_from_m']) && isset($_POST['Monday_befor_h']) && isset($_POST['Monday_befor_m']))
    	{
    	if (intval($_POST['Monday_from_h'])>=10 && intval($_POST['Monday_from_h'])<=23)	$from_h=intval($_POST['Monday_from_h']);
    		else if (substr($_POST['Monday_from_h'],0,1)=="0") $from_h=intval(substr($_POST['Monday_from_h'],1,1));
    			else $from_h=0;
    	if (intval($_POST['Monday_from_m'])>=10 && intval($_POST['Monday_from_m'])<=59)	$from_m=intval($_POST['Monday_from_m']);
    		else if (substr($_POST['Monday_from_m'],0,1)=="0") $from_m=intval(substr($_POST['Monday_from_m'],1,1));
    			else $from_m=0;
    	if (intval($_POST['Monday_befor_h'])>=10 && intval($_POST['Monday_befor_h'])<=23)	$befor_h=intval($_POST['Monday_befor_h']);
    		else if (substr($_POST['Monday_befor_h'],0,1)=="0") $befor_h=intval(substr($_POST['Monday_befor_h'],1,1));
    			else $befor_h=0;
    	if (intval($_POST['Monday_befor_m'])>=10 && intval($_POST['Monday_befor_m'])<=59)	$befor_m=intval($_POST['Monday_befor_m']);
    		else if (substr($_POST['Monday_befor_m'],0,1)=="0") $befor_m=intval(substr($_POST['Monday_befor_m'],1,1));
    			else $befor_m=0;

    	$query = "UPDATE `access` SET `from_h` = '".$from_h."' , `from_m` = '".$from_m."' , `befor_h` = '".$befor_h."' , `befor_m` = '".$befor_m."'  WHERE `week_day` = 'Monday' LIMIT 1";
		$sql = mysql_query($query) or die(mysql_error());
		}
	//�������
    if  (isset($_POST['Tuesday_from_h']) && isset($_POST['Tuesday_from_m']) && isset($_POST['Tuesday_befor_h']) && isset($_POST['Tuesday_befor_m']))
    	{
    	if (intval($_POST['Tuesday_from_h'])>=10 && intval($_POST['Tuesday_from_h'])<=23)	$from_h=intval($_POST['Tuesday_from_h']);
    		else if (substr($_POST['Tuesday_from_h'],0,1)=="0") $from_h=intval(substr($_POST['Tuesday_from_h'],1,1));
    			else $from_h=0;
    	if (intval($_POST['Tuesday_from_m'])>=10 && intval($_POST['Monday_from_m'])<=59)	$from_m=intval($_POST['Tuesday_from_m']);
    		else if (substr($_POST['Tuesday_from_m'],0,1)=="0") $from_m=intval(substr($_POST['Tuesday_from_m'],1,1));
    			else $from_m=0;
    	if (intval($_POST['Tuesday_befor_h'])>=10 && intval($_POST['Tuesday_befor_h'])<=23)	$befor_h=intval($_POST['Tuesday_befor_h']);
    		else if (substr($_POST['Tuesday_befor_h'],0,1)=="0") $befor_h=intval(substr($_POST['Tuesday_befor_h'],1,1));
    			else $befor_h=0;
    	if (intval($_POST['Tuesday_befor_m'])>=10 && intval($_POST['Tuesday_befor_m'])<=59)	$befor_m=intval($_POST['Tuesday_befor_m']);
    		else if (substr($_POST['Tuesday_befor_m'],0,1)=="0") $befor_m=intval(substr($_POST['Tuesday_befor_m'],1,1));
    			else $befor_m=0;

    	$query = "UPDATE `access` SET `from_h` = '".$from_h."' , `from_m` = '".$from_m."' , `befor_h` = '".$befor_h."' , `befor_m` = '".$befor_m."'  WHERE `week_day` = 'Tuesday' LIMIT 1";
		$sql = mysql_query($query) or die(mysql_error());
		}
	//�����
	if  (isset($_POST['Wednesday_from_h']) && isset($_POST['Wednesday_from_m']) && isset($_POST['Wednesday_befor_h']) && isset($_POST['Wednesday_befor_m']))
    	{
    	if (intval($_POST['Wednesday_from_h'])>=10 && intval($_POST['Wednesday_from_h'])<=23)	$from_h=intval($_POST['Wednesday_from_h']);
    		else if (substr($_POST['Wednesday_from_h'],0,1)=="0") $from_h=intval(substr($_POST['Wednesday_from_h'],1,1));
    			else $from_h=0;
    	if (intval($_POST['Wednesday_from_m'])>=10 && intval($_POST['Wednesday_from_m'])<=59)	$from_m=intval($_POST['Wednesday_from_m']);
    		else if (substr($_POST['Wednesday_from_m'],0,1)=="0") $from_m=intval(substr($_POST['Wednesday_from_m'],1,1));
    			else $from_m=0;
    	if (intval($_POST['Wednesday_befor_h'])>=10 && intval($_POST['Wednesday_befor_h'])<=23)	$befor_h=intval($_POST['Wednesday_befor_h']);
    		else if (substr($_POST['Wednesday_befor_h'],0,1)=="0") $befor_h=intval(substr($_POST['Wednesday_befor_h'],1,1));
    			else $befor_h=0;
    	if (intval($_POST['Wednesday_befor_m'])>=10 && intval($_POST['Wednesday_befor_m'])<=59)	$befor_m=intval($_POST['Wednesday_befor_m']);
    		else if (substr($_POST['Wednesday_befor_m'],0,1)=="0") $befor_m=intval(substr($_POST['Wednesday_befor_m'],1,1));
    			else $befor_m=0;

    	$query = "UPDATE `access` SET `from_h` = '".$from_h."' , `from_m` = '".$from_m."' , `befor_h` = '".$befor_h."' , `befor_m` = '".$befor_m."'  WHERE `week_day` = 'Wednesday' LIMIT 1";
		$sql = mysql_query($query) or die(mysql_error());
		}
	//������
	if  (isset($_POST['Thursday_from_h']) && isset($_POST['Thursday_from_m']) && isset($_POST['Thursday_befor_h']) && isset($_POST['Thursday_befor_m']))
    	{
    	if (intval($_POST['Thursday_from_h'])>=10 && intval($_POST['Thursday_from_h'])<=23)	$from_h=intval($_POST['Thursday_from_h']);
    		else if (substr($_POST['Thursday_from_h'],0,1)=="0") $from_h=intval(substr($_POST['Thursday_from_h'],1,1));
    			else $from_h=0;
    	if (intval($_POST['Thursday_from_m'])>=10 && intval($_POST['Thursday_from_m'])<=59)	$from_m=intval($_POST['Thursday_from_m']);
    		else if (substr($_POST['Thursday_from_m'],0,1)=="0") $from_m=intval(substr($_POST['Thursday_from_m'],1,1));
    			else $from_m=0;
    	if (intval($_POST['Thursday_befor_h'])>=10 && intval($_POST['Thursday_befor_h'])<=23)	$befor_h=intval($_POST['Thursday_befor_h']);
    		else if (substr($_POST['Thursday_befor_h'],0,1)=="0") $befor_h=intval(substr($_POST['Thursday_befor_h'],1,1));
    			else $befor_h=0;
    	if (intval($_POST['Thursday_befor_m'])>=10 && intval($_POST['Thursday_befor_m'])<=59)	$befor_m=intval($_POST['Thursday_befor_m']);
    		else if (substr($_POST['Thursday_befor_m'],0,1)=="0") $befor_m=intval(substr($_POST['Thursday_befor_m'],1,1));
    			else $befor_m=0;

    	$query = "UPDATE `access` SET `from_h` = '".$from_h."' , `from_m` = '".$from_m."' , `befor_h` = '".$befor_h."' , `befor_m` = '".$befor_m."'  WHERE `week_day` = 'Thursday' LIMIT 1";
		$sql = mysql_query($query) or die(mysql_error());
		}
	//�������
	if  (isset($_POST['Friday_from_h']) && isset($_POST['Friday_from_m']) && isset($_POST['Friday_befor_h']) && isset($_POST['Friday_befor_m']))
    	{
    	if (intval($_POST['Friday_from_h'])>=10 && intval($_POST['Friday_from_h'])<=23)	$from_h=intval($_POST['Friday_from_h']);
    		else if (substr($_POST['Friday_from_h'],0,1)=="0") $from_h=intval(substr($_POST['Friday_from_h'],1,1));
    			else $from_h=0;
    	if (intval($_POST['Friday_from_m'])>=10 && intval($_POST['Friday_from_m'])<=59)	$from_m=intval($_POST['Friday_from_m']);
    		else if (substr($_POST['Friday_from_m'],0,1)=="0") $from_m=intval(substr($_POST['Friday_from_m'],1,1));
    			else $from_m=0;
    	if (intval($_POST['Friday_befor_h'])>=10 && intval($_POST['Friday_befor_h'])<=23)	$befor_h=intval($_POST['Friday_befor_h']);
    		else if (substr($_POST['Friday_befor_h'],0,1)=="0") $befor_h=intval(substr($_POST['Friday_befor_h'],1,1));
    			else $befor_h=0;
    	if (intval($_POST['Friday_befor_m'])>=10 && intval($_POST['Friday_befor_m'])<=59)	$befor_m=intval($_POST['Friday_befor_m']);
    		else if (substr($_POST['Friday_befor_m'],0,1)=="0") $befor_m=intval(substr($_POST['Friday_befor_m'],1,1));
    			else $befor_m=0;

    	$query = "UPDATE `access` SET `from_h` = '".$from_h."' , `from_m` = '".$from_m."' , `befor_h` = '".$befor_h."' , `befor_m` = '".$befor_m."'  WHERE `week_day` = 'Friday' LIMIT 1";
		$sql = mysql_query($query) or die(mysql_error());
		}
	//�������
	if  (isset($_POST['Saturday_from_h']) && isset($_POST['Saturday_from_m']) && isset($_POST['Saturday_befor_h']) && isset($_POST['Saturday_befor_m']))
    	{
    	if (intval($_POST['Saturday_from_h'])>=10 && intval($_POST['Saturday_from_h'])<=23)	$from_h=intval($_POST['Saturday_from_h']);
    		else if (substr($_POST['Saturday_from_h'],0,1)=="0") $from_h=intval(substr($_POST['Saturday_from_h'],1,1));
    			else $from_h=0;
    	if (intval($_POST['Saturday_from_m'])>=10 && intval($_POST['Saturday_from_m'])<=59)	$from_m=intval($_POST['Saturday_from_m']);
    		else if (substr($_POST['Saturday_from_m'],0,1)=="0") $from_m=intval(substr($_POST['Saturday_from_m'],1,1));
    			else $from_m=0;
    	if (intval($_POST['Saturday_befor_h'])>=10 && intval($_POST['Saturday_befor_h'])<=23)	$befor_h=intval($_POST['Saturday_befor_h']);
    		else if (substr($_POST['Saturday_befor_h'],0,1)=="0") $befor_h=intval(substr($_POST['Saturday_befor_h'],1,1));
    			else $befor_h=0;
    	if (intval($_POST['Saturday_befor_m'])>=10 && intval($_POST['Saturday_befor_m'])<=59)	$befor_m=intval($_POST['Saturday_befor_m']);
    		else if (substr($_POST['Saturday_befor_m'],0,1)=="0") $befor_m=intval(substr($_POST['Saturday_befor_m'],1,1));
    			else $befor_m=0;

    	$query = "UPDATE `access` SET `from_h` = '".$from_h."' , `from_m` = '".$from_m."' , `befor_h` = '".$befor_h."' , `befor_m` = '".$befor_m."'  WHERE `week_day` = 'Saturday' LIMIT 1";
		$sql = mysql_query($query) or die(mysql_error());
		}
	//�����������
	if  (isset($_POST['Sunday_from_h']) && isset($_POST['Sunday_from_m']) && isset($_POST['Sunday_befor_h']) && isset($_POST['Sunday_befor_m']))
    	{
    	if (intval($_POST['Sunday_from_h'])>=10 && intval($_POST['Sunday_from_h'])<=23)	$from_h=intval($_POST['Sunday_from_h']);
    		else if (substr($_POST['Sunday_from_h'],0,1)=="0") $from_h=intval(substr($_POST['Sunday_from_h'],1,1));
    			else $from_h=0;
    	if (intval($_POST['Sunday_from_m'])>=10 && intval($_POST['Sunday_from_m'])<=59)	$from_m=intval($_POST['Sunday_from_m']);
    		else if (substr($_POST['Sunday_from_m'],0,1)=="0") $from_m=intval(substr($_POST['Sunday_from_m'],1,1));
    			else $from_m=0;
    	if (intval($_POST['Sunday_befor_h'])>=10 && intval($_POST['Sunday_befor_h'])<=23)	$befor_h=intval($_POST['Sunday_befor_h']);
    		else if (substr($_POST['Sunday_befor_h'],0,1)=="0") $befor_h=intval(substr($_POST['Sunday_befor_h'],1,1));
    			else $befor_h=0;
    	if (intval($_POST['Sunday_befor_m'])>=10 && intval($_POST['Sunday_befor_m'])<=59)	$befor_m=intval($_POST['Sunday_befor_m']);
    		else if (substr($_POST['Sunday_befor_m'],0,1)=="0") $befor_m=intval(substr($_POST['Sunday_befor_m'],1,1));
    			else $befor_m=0;

    	$query = "UPDATE `access` SET `from_h` = '".$from_h."' , `from_m` = '".$from_m."' , `befor_h` = '".$befor_h."' , `befor_m` = '".$befor_m."'  WHERE `week_day` = 'Sunday' LIMIT 1";
		$sql = mysql_query($query) or die(mysql_error());
		}

	$success='<h1 class="block"> �̲�� �������� ��ϲ��� �����Ͳ!</h1>';
	}

$query = "SELECT * FROM `access`";
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql)>0)
	while ($row = mysql_fetch_assoc($sql))
   		{
   		if ($row['from_h']<10) $_POST[$row['week_day']."_from_h"]="0".$row['from_h'];
   			else $_POST[$row['week_day']."_from_h"]=$row['from_h'];
   		if ($row['from_m']<10) $_POST[$row['week_day']."_from_m"]="0".$row['from_m'];
   			else $_POST[$row['week_day']."_from_m"]=$row['from_m'];
   		if ($row['befor_h']<10) $_POST[$row['week_day']."_befor_h"]="0".$row['befor_h'];
   			else $_POST[$row['week_day']."_befor_h"]=$row['befor_h'];
   		if ($row['befor_m']<10) $_POST[$row['week_day']."_befor_m"]="0".$row['befor_m'];
   			else $_POST[$row['week_day']."_befor_m"]=$row['befor_m'];
   		$_POST[$row['week_day']."_hday"]=$row['holyday'];
   		}

?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">������ �� �������</h1>
					<div class="column1-unit">
						<?
						/*echo "<pre>";
						//print_r($_POST);
						print_r($_SESSION);
						echo "</pre>";*/
						echo $success;
						?>

					<div class="contactform">
                        <form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              				<fieldset>
              					<legend>&nbsp;������� ������&nbsp;</legend>
                                	<p>
                                		<label for="Monday" class="left">��������:</label>
                                		<input type="text" name="Monday_from_h" id="Monday_from_h" tabindex="30" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Monday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Monday_from_h']?>" />:
                                		<input type="text" name="Monday_from_m" id="Monday_from_m" tabindex="31" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Monday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Monday_from_m']?>" /> -
                                		<input type="text" name="Monday_befor_h" id="Monday_befor_h" tabindex="32" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Monday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Monday_befor_h']?>" />:
                                		<input type="text" name="Monday_befor_m" id="Monday_befor_m" tabindex="33" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Monday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Monday_befor_m']?>" />
                                        <label for="Monday_hday" class="small">��������:</label>
                                        <input type="checkbox" name="Monday_hday" id="Monday_hday" class="checkbox" tabindex="34" <?if ($_POST['Monday_hday']=="+") echo 'checked="checked"'?> size="1" value="+"/>
									</p>
									<p>
                                		<label for="Tuesday" class="left">³������:</label>
                                		<input type="text" name="Tuesday_from_h" id="Tuesday_from_h" tabindex="40" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Tuesday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Tuesday_from_h']?>" />:
                                		<input type="text" name="Tuesday_from_m" id="Tuesday_from_m" tabindex="41" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Tuesday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Tuesday_from_m']?>" /> -
                                		<input type="text" name="Tuesday_befor_h" id="Tuesday_befor_h" tabindex="42" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Tuesday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Tuesday_befor_h']?>" />:
                                		<input type="text" name="Tuesday_befor_m" id="Tuesday_befor_m" tabindex="43" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Tuesday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Tuesday_befor_m']?>" />
                                        <label for="Tuesday_hday" class="small">��������:</label>
                                        <input type="checkbox" name="Tuesday_hday" id="Tuesday_hday" class="checkbox" tabindex="44" <?if ($_POST['Tuesday_hday']=="+") echo 'checked="checked"'?> size="1" value="+"/>
									</p>
									<p>
                                		<label for="Wednesday" class="left">������:</label>
                                		<input type="text" name="Wednesday_from_h" id="Wednesday_from_h" tabindex="50" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Wednesday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Wednesday_from_h']?>" />:
                                		<input type="text" name="Wednesday_from_m" id="Wednesday_from_m" tabindex="51" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Wednesday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Wednesday_from_m']?>" /> -
                                		<input type="text" name="Wednesday_befor_h" id="Wednesday_befor_h" tabindex="52" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Wednesday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Wednesday_befor_h']?>" />:
                                		<input type="text" name="Wednesday_befor_m" id="Wednesday_befor_m" tabindex="53" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Wednesday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Wednesday_befor_m']?>" />
                                        <label for="Wednesday_hday" class="small">��������:</label>
                                        <input type="checkbox" name="Wednesday_hday" id="Wednesday_hday" class="checkbox" tabindex="54" <?if ($_POST['Wednesday_hday']=="+") echo 'checked="checked"'?> size="1" value="+"/>
									</p>
									<p>
                                		<label for="Thursday" class="left">������:</label>
                                		<input type="text" name="Thursday_from_h" id="Thursday_from_h" tabindex="60" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Thursday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Thursday_from_h']?>" />:
                                		<input type="text" name="Thursday_from_m" id="Thursday_from_m" tabindex="61" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Thursday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Thursday_from_m']?>" /> -
                                		<input type="text" name="Thursday_befor_h" id="Thursday_befor_h" tabindex="62" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Thursday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Thursday_befor_h']?>" />:
                                		<input type="text" name="Thursday_befor_m" id="Thursday_befor_m" tabindex="63" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Thursday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Thursday_befor_m']?>" />
                                        <label for="Thursday_hday" class="small">��������:</label>
                                        <input type="checkbox" name="Thursday_hday" id="Thursday_hday" class="checkbox" tabindex="64" <?if ($_POST['Thursday_hday']=="+") echo 'checked="checked"'?> size="1" value="+"/>
									</p>
									<p>
                                		<label for="Friday" class="left">�'������:</label>
                                		<input type="text" name="Friday_from_h" id="Friday_from_h" tabindex="70" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Friday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Friday_from_h']?>" />:
                                		<input type="text" name="Friday_from_m" id="Friday_from_m" tabindex="71" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Friday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Friday_from_m']?>" /> -
                                		<input type="text" name="Friday_befor_h" id="Friday_befor_h" tabindex="72" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Friday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Friday_befor_h']?>" />:
                                		<input type="text" name="Friday_befor_m" id="Friday_befor_m" tabindex="73" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Friday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Friday_befor_m']?>" />
                                        <label for="Friday_hday" class="small">��������:</label>
                                        <input type="checkbox" name="Friday_hday" id="Friday_hday" class="checkbox" tabindex="74" <?if ($_POST['Friday_hday']=="+") echo 'checked="checked"'?> size="1" value="+"/>
									</p>
									<p>
                                		<label for="Saturday" class="left">������:</label>
                                		<input type="text" name="Saturday_from_h" id="Saturday_from_h" tabindex="80" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Saturday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Saturday_from_h']?>" />:
                                		<input type="text" name="Saturday_from_m" id="Saturday_from_m" tabindex="81" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Saturday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Saturday_from_m']?>" /> -
                                		<input type="text" name="Saturday_befor_h" id="Saturday_befor_h" tabindex="82" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Saturday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Saturday_befor_h']?>" />:
                                		<input type="text" name="Saturday_befor_m" id="Saturday_befor_m" tabindex="83" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Saturday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Saturday_befor_m']?>" />
                                        <label for="Saturday_hday" class="small">��������:</label>
                                        <input type="checkbox" name="Saturday_hday" id="Saturday_hday" class="checkbox" tabindex="84" <?if ($_POST['Saturday_hday']=="+") echo 'checked="checked"'?> size="1" value="+"/>
									</p>
									<p>
                                		<label for="Sunday" class="left">�����:</label>
                                		<input type="text" name="Sunday_from_h" id="Sunday_from_h" tabindex="90" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Sunday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Sunday_from_h']?>" />:
                                		<input type="text" name="Sunday_from_m" id="Sunday_from_m" tabindex="91" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Sunday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Sunday_from_m']?>" /> -
                                		<input type="text" name="Sunday_befor_h" id="Sunday_befor_h" tabindex="92" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Sunday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Sunday_befor_h']?>" />:
                                		<input type="text" name="Sunday_befor_m" id="Sunday_befor_m" tabindex="93" class="field" style="width:20px;" maxlength="2" <?if ($_POST['Sunday_hday']=="+") echo '"disabled"'?> value="<?=$_POST['Sunday_befor_m']?>" />
                                        <label for="Sunday_hday" class="small">��������:</label>
                                        <input type="checkbox" name="Sunday_hday" id="Sunday_hday" class="checkbox" tabindex="94" <?if ($_POST['Sunday_hday']=="+") echo 'checked="checked"'?> size="1" value="+"/>
									</p>
									<p>
									<input type="submit" name="set_access" id="submit" class="button" value="�����������" tabindex="100" style="margin-right:267px"/>
									</p>
							</fieldset>
              				</form>
              			</div>
              			<div class="contactform">
              				<form method="post" action="<?$_SERVER["SCRIPT_NAME"]?>">
              				<fieldset>
              					<legend>&nbsp;������ �� �������&nbsp;</legend>
                                	<p>
                                		<label for="ban" class="left" style="width:275px;">�������� �����������:</label>
                     					<input type="checkbox" name="ban" id="ban" class="checkbox" tabindex="200" <?if ($_POST['ban']=="+") echo 'checked="checked"'?> size="1" value="+"/>
									</p>
									<p>
                                		<label for="login_ban" class="left" style="width:275px;">�������� ����� � �������:</label>
                     					<input type="checkbox" name="login_ban" id="login_ban" class="checkbox" tabindex="210" <?if ($_POST['login_ban']=="+") echo 'checked="checked"'?> size="1" value="+"/>
                     				</p>
                     				<p>
                                		<label for="show_results" class="left" style="width:275px;">������������ ����������:</label>
                     					<input type="checkbox" name="show_results" id="show_results" class="checkbox" tabindex="215" <?if ($_POST['show_results']=="+") echo 'checked="checked"'?> size="1" value="+"/>
									</p>
                     				<p>
                     					<label for="reg_ban" class="left" style="width:275px;">�������� ���������� ���������:</label>
                     					<input type="checkbox" name="reg_ban" id="reg_ban" class="checkbox" tabindex="220" <?if ($_POST['reg_ban']=="+") echo 'checked="checked"'?> size="1" value="+"/>
                     				</p>
                     				<p>
									<input type="submit" name="set_ban" id="submit" class="button" value="�����������" tabindex="230" style="margin-right:267px;"/>
									</p>
							</fieldset>
              				</form>
				    	</div>
                        </div>
            		<hr class="clear-contentunit" />


            	</div>

        	</div>

<?php
include ("Parts/Footer.php");
?>