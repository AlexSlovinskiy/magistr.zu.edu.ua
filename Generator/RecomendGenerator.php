<?php
include ("../MySQL/MysqlConnectSas.php");
include ("../Parts/SpecialityListSas.php");

if (substr($_GET['spc'],0,1)=='8') $mag=1;
if (substr($_GET['spc'],0,1)=='7') $mag=-1;

$spc='-1'; $type='-1';

if ($mag===1)
	{
	if ($_GET['type']==='�����')
		{
		for ($i=1; $i<=count($mag_list["stc"]); $i++)
			{
            if ($mag_list["stc"][$i]["spec"]===$_GET['spc'])
            	{
            	$spc=$_GET['spc'];
            	$type='�����';
            	$license=$mag_list["stc"][$i]["license"];
            	$budget=$mag_list["stc"][$i]["budget"];
            	}
			}
		}
	if ($_GET['type']==='������')
		{
		for ($i=1; $i<=count($mag_list["zao"]); $i++)
			{
            if ($mag_list["zao"][$i]["spec"]===$_GET['spc'])
            	{
            	$spc=$_GET['spc'];
                $type='������';
                $license=$mag_list["zao"][$i]["license"];
            	$budget=$mag_list["zao"][$i]["budget"];
            	}
			}
		}
    }

if ($mag===-1)
	{
	if ($_GET['type']==='�����')
		{
		for ($i=1; $i<=count($spc_list["stc"]); $i++)
			{
            if ($spc_list["stc"][$i]["spec"]===$_GET['spc'])
            	{
            	$spc=$_GET['spc'];
            	$type='�����';
            	$license=$spc_list["stc"][$i]["license"];
            	$budget=$spc_list["stc"][$i]["budget"];
            	}
			}
		}
	if ($_GET['type']==='������')
		{
		for ($i=1; $i<=count($spc_list["zao"]); $i++)
			{
            if ($spc_list["zao"][$i]["spec"]===$_GET['spc'])
            	{
            	$spc=$_GET['spc'];
                $type='������';
                $license=$spc_list["zao"][$i]["license"];
            	$budget=$spc_list["zao"][$i]["budget"];
            	}
			}
		}
    }


?>
	<b>���
	<?php
		if ($mag==1 && $spc!=-1) echo '&laquo;������&raquo;';
		if ($mag==-1 && $spc!=-1) echo '&laquo;���������&raquo;';
	?>

</b> � ������������: <b>&laquo;<?php
		if ($spc!=-1) echo $spc;
		if ($type=='�����') echo '&raquo; (����� ����� ��������)';
		if ($type=='������') echo '&raquo; (������ ����� ��������)';
	?>
</b><br/>

<b>
	<?php
		if ($spc!=-1)
			{
			if ($type=='�����' || $type=='������')
				echo  '</b>��������� ����� �������: <strong>'.$license.'</strong> <br /> ����� ���������� ����������: <strong>'.$budget.'</strong>';
			}
	?>
<br/><br/>

<?php
$query = "SELECT * FROM `access` WHERE `week_day` = 'all'";
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql) > 0) $row = mysql_fetch_assoc($sql);

if ($row["show_results"]=="+")
	{
		//����������� ����
	$query = "SELECT * FROM `abiturients` WHERE
 		`speciality` = '".$spc."' AND
        `study_type` = '".$type."' AND
		`take_away` = '-' AND
		`finans` = 'b' AND
		`government_exchange` = '+' AND
		`recommend` = '+'
		ORDER BY `benefits`, `bal1`+`bal2`+`bal3`+`dip_average` DESC, `dip_honour`, `dip_average` DESC, `lastname` ASC";

    	$sql = mysql_query($query) or die(mysql_error());
  		$i=1;
		if (mysql_num_rows($sql)>0)
   			{
   			echo '<table align=center class=striped cellspacing=0 cellpadding=0 border=1 width=400px;>';
   			echo '<THEAD>
   					<tr class=p>
						<td align=center valign=center colspan=2>�� ����� ���������� ������� <br />
								̳��������� ����</td>
					</tr>
   				 </THEAD>';
   			echo '<TBODY>';
   			while ($row = mysql_fetch_assoc($sql))
   				{
            	echo "<tr>";
                echo "<td width=15px>".$i."</td>";
                echo "<td style=TEXT-ALIGN:left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                $i++;
   				}
   			echo '</TBODY></table><br />';
   			}

    //�������������
	$query = "SELECT * FROM `abiturients` WHERE
 		`speciality` = '".$spc."' AND
        `study_type` = '".$type."' AND
		`take_away` = '-' AND
		`finans` = 'b' AND
		`benefits` = '+' AND
		`recommend` = '+'
		ORDER BY `benefits`, `bal1`+`bal2`+`bal3`+`dip_average` DESC, `dip_honour`, `dip_average` DESC, `lastname` ASC";

    	$sql = mysql_query($query) or die(mysql_error());
  		$i=1;
		if (mysql_num_rows($sql)>0)
   			{
   			echo '<table align=center class=striped cellspacing=0 cellpadding=0 border=1 width=400px;>';
   			echo '<THEAD>
   					<tr class=p>
						<td align=center valign=center colspan=2>�� ����� ���������� ������� <br />
								���� ���������</td>
					</tr>
   				 </THEAD>';
   			echo '<TBODY>';
   			while ($row = mysql_fetch_assoc($sql))
   				{
            	echo "<tr>";
                echo "<td width=15px>".$i."</td>";
                echo "<td style=TEXT-ALIGN:left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                $i++;
   				}
   			echo '</TBODY></table><br />';
   			}

    //�� ��������� ��������
	$query = "SELECT * FROM `abiturients` WHERE
 		`speciality` = '".$spc."' AND
        `study_type` = '".$type."' AND
		`take_away` = '-' AND
		`government_exchange` <> '+' AND
		`benefits` <> '+' AND
		`finans` = 'b' AND
		`recommend` = '+'
		ORDER BY `bal1`+`bal2`+`bal3`+`dip_average` DESC, `dip_honour`, `dip_average` DESC, `lastname` ASC";

    	$sql = mysql_query($query) or die(mysql_error());
  		$i=1;
		if (mysql_num_rows($sql)>0)
   			{
   			echo '<table align=center class=striped cellspacing=0 cellpadding=0 border=1 width=400px;>';
   			echo '<THEAD>
   					<tr>
						<td valign=center colspan=2>�� ����� ���������� �������<br />
												�� ��������� ��������<br />
						</td>
					</tr>
   				 </THEAD>';
   			echo '<TBODY>';
   			while ($row = mysql_fetch_assoc($sql))
   				{
            	echo "<tr class=p>";
                echo "<td width=15px>".$i."</td>";
                echo "<td style=TEXT-ALIGN:left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                $i++;
   				}
   			echo '</TBODY></table><br />';
   			}

	/*$query = "SELECT * FROM `abiturients` WHERE
 		`speciality` = '".$spc."' AND
        `study_type` = '".$type."' AND
		`take_away` = '-' AND
		`benefits` = '+' AND
		`finans` = 'c' AND
		`recommend` = '+'
		ORDER BY `benefits` , `bal1`+`bal2`+`dip_average` DESC, `dip_honour`, `dip_average` DESC, `lastname` ASC";

    	$sql = mysql_query($query) or die(mysql_error());
  		$i=1;
  		if (mysql_num_rows($sql)>0)
   			{
            echo '<table align=center class=striped cellspacing=0 cellpadding=0 border=1 width=400px;>';
   			echo '<THEAD>
   					<tr>
						<td valign=center colspan=2>�� ����� �������� ���<br />
												���� ���������<br />
						</td>
					</tr>
   				 </THEAD>';
   			echo '<TBODY>';
   			while ($row = mysql_fetch_assoc($sql))
   				{
            	echo "<tr class=p>";
                echo "<td width=15px>".$i."</td>";
                echo "<td style=TEXT-ALIGN:left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                $i++;
   				}
   			echo '</TBODY></table><br />';
   			} */



	$query = "SELECT * FROM `abiturients` WHERE
 		`speciality` = '".$spc."' AND
        `study_type` = '".$type."' AND
		`take_away` = '-' AND

		`finans` = 'c' AND
		`recommend` = '+'
		ORDER BY `bal1`+`bal2`+`bal3`+`dip_average` DESC, `dip_honour`, `dip_average` DESC, `lastname` ASC";

    	$sql = mysql_query($query) or die(mysql_error());
  		$i=1;
  		if (mysql_num_rows($sql)>0)
   			{
            echo '<table align=center class=striped cellspacing=0 cellpadding=0 border=1 width=400px;>';
   			echo '<THEAD>
   					<tr>
						<td valign=center colspan=2>�� ����� �������� ���<br />
												�� ��������� ��������<br />
						</td>
					</tr>
   				 </THEAD>';
   			echo '<TBODY>';
   			while ($row = mysql_fetch_assoc($sql))
   				{
            	echo "<tr class=p>";
                echo "<td width=15px>".$i."</td>";
                echo "<td style=TEXT-ALIGN:left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                $i++;
   				}
   			echo '</TBODY></table><br />';
   			}
   	}
else echo "<b>������ �������������� �� ����������� � ������ �����������</b>";

?>

