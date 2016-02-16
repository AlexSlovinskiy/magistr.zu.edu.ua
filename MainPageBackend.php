 <?php
require_once "Scripts/lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("windows-1251");

$id=intval($_REQUEST["id"]);
$field=$_REQUEST["field"];
include ("MySQL/MysqlConnect.php");

if ($field=="dip_orig")
	{
    $query = "SELECT `dip_orig` , `take_away` FROM `abiturients` WHERE `ab_id` = '".$id."' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql)>0)
   	while ($row = mysql_fetch_assoc($sql))
   		if ($row['take_away']=='-')
   			{
			if ($row["dip_orig"]=="+") 	$query="UPDATE `abiturients` SET `dip_orig` = '-'  , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
    		if ($row["dip_orig"]=="-") 	$query="UPDATE `abiturients` SET `dip_orig` = '+' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
    		}
	$sql = mysql_query($query) or die(mysql_error());
	}

if ($field=="recommend")
	{
    $query = "SELECT `recommend` , `qualification` , `take_away` , `dip_date` FROM `abiturients` WHERE `ab_id` = '".$id."' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql)>0)
   	while ($row = mysql_fetch_assoc($sql))
   		if ($row['take_away']=='-')
   			{
			if ($row["recommend"]=="+") $query="UPDATE `abiturients` SET `recommend` = '-' , `finans` = '-' , `pact` = '-' , `apply` = '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";

			if ($row["recommend"]=="-")
				{
				$query="UPDATE `abiturients` SET `recommend` = '+' , `pact` = '-' , `apply` = '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
				$sql1 = mysql_query($query) or die(mysql_error());
            	if ($row['qualification']=="��������") $query="UPDATE `abiturients` SET `finans` = 'b' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
            		else  $query="UPDATE `abiturients` SET `finans` = 'c' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
    			}
    		}
	$sql = mysql_query($query) or die(mysql_error());
	}

if ($field=="finans")
	{
    $query = "SELECT `finans` , `qualification` , `take_away` , `dip_date` FROM `abiturients` WHERE `ab_id` = '".$id."' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql)>0)
   	while ($row = mysql_fetch_assoc($sql))
   		if ($row['take_away']=='-')
   			{
			if ($row["finans"]=="b") $query="UPDATE `abiturients` SET `finans` = 'c' , `pact` = '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
    		if ($row["finans"]=="c" && $row['qualification']=="��������") $query="UPDATE `abiturients` SET `finans` = 'b' , `pact` = '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
    		}
	$sql = mysql_query($query) or die(mysql_error());
	}

if ($field=="pact")
	{
    $query = "SELECT `pact` ,`finans` , `take_away` , `dip_orig` FROM `abiturients` WHERE `ab_id` = '".$id."' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql)>0)
   	while ($row = mysql_fetch_assoc($sql))
   		if ($row['take_away']=='-')
   			{
			if ($row["finans"]=="b")
				{
				if ($row["pact"]=="-" || $row["pact"]=="d") $query="UPDATE `abiturients` SET `pact` = 'y' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
				if ($row["pact"]=="y" || $row["pact"]=="d") $query="UPDATE `abiturients` SET `pact` = '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
				}
    		if ($row["finans"]=="c")
    			{
            	if ($row["pact"]=="-" || $row["pact"]=="y") $query="UPDATE `abiturients` SET `pact` = 'd' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
				if ($row["pact"]=="d" || $row["pact"]=="y") $query="UPDATE `abiturients` SET `pact` = '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
    			}
    		}
	$sql = mysql_query($query) or die(mysql_error());
	}

if ($field=="apply")
	{
    $query = "SELECT `apply` , `take_away` , `pact` FROM `abiturients` WHERE `ab_id` = '".$id."' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql)>0)
   	while ($row = mysql_fetch_assoc($sql))
   		if ($row['take_away']=='-' && $row['pact']!='-')
   			{
			if ($row["apply"]=="+") $query="UPDATE `abiturients` SET `apply` = '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
    		if ($row["apply"]=="-") $query="UPDATE `abiturients` SET `apply` = '+' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
    		}
	$sql = mysql_query($query) or die(mysql_error());
	}

if ($field=="take_away")
	{
    $query = "SELECT `take_away` FROM `abiturients` WHERE `ab_id` = '".$id."' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($sql)>0)
   	while ($row = mysql_fetch_assoc($sql))
   		{
		if ($row["take_away"]=="+") 	$query="UPDATE `abiturients` SET `take_away` = '-' , `last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
    	if ($row["take_away"]=="-") 	$query="UPDATE `abiturients` SET `take_away` = '+' , `dip_orig` = '-' , `recommend` = '-' , `finans` = '-' , `pact` = '-' , `apply` = '-' ,`last_edit` = '".date("U")."' WHERE `ab_id` = '".$id."' LIMIT 1 ";
    	}
	$sql = mysql_query($query) or die(mysql_error());
	}


global $_RESULT;

$query = "SELECT `dip_orig` , `recommend` , `finans` , `pact` , `apply` , `take_away` FROM `abiturients` WHERE `ab_id` = '".$id."' LIMIT 1";
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql)>0)
   	while ($row = mysql_fetch_assoc($sql))
   		{
   		$_RESULT = array(
            "dip_orig" =>$row['dip_orig'],
            "recommend" =>$row['recommend'],
            "finans" =>$row['finans'],
            "pact" =>$row['pact'],
            "apply" =>$row['apply'],
            "take_away" =>$row['take_away'],
   			);
		}

// ������
//print_r($list);
echo "OK_";
?>