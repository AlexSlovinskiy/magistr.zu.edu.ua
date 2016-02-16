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
			{if ($mag_list["stc"][$i]["spec"]===$_GET['spc'])
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
            	{$spc=$_GET['spc'];
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
	echo '
	<table align="center" class="striped" cellspacing="0" cellpadding="0" border="1">
		<THEAD>
		<tr class=p>
		<td align=center valign=center width=25>� <br>�/�</td>
		<td align=center valign=center>�������, ���, �� �������</td>
		<td align=center valign=center>��� ������� <br>�� �������</td>
		<td align=center valign=center>���������� <br>�����</td>';
	if ($mag==1) echo '<td align=center valign=center>�������� <br>����</td>
	<td align=center valign=center>���������� <br>�����</td>';
	echo'<td align=center valign=center>���� ����</td></tr>
		</THEAD>
  		<TBODY>';


	$query = "SELECT * FROM `abiturients` WHERE
 		`speciality` = '".$spc."' AND
        `study_type` = '".$type."' AND
		`take_away` = '-'
		ORDER BY `bal1`+`bal2`+`bal3`+`dip_average` DESC";
		//ORDER BY `lastname` ASC";

    	$sql = mysql_query($query) or die(mysql_error());
  		$i=1;
		if (mysql_num_rows($sql)>0)
   			{
   			while ($row = mysql_fetch_assoc($sql))
   				{
            	echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td style=TEXT-ALIGN:left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
		echo "<td>".$row['dip_average']."</td>";
                echo "<td>".$row['bal1']."</td>";
                if ($mag==1)
					{
					echo "<td>".$row['bal2']."</td>";
					echo "<td>".$row['bal3']."</td>";
					$sum=$row['bal1']+$row['bal2']+$row['bal3']+$row['dip_average'];
					echo "<td><b>".$sum."</b></td>";
					}
                if ($mag==-1)
					{
					$sum=$row['bal1']+$row['dip_average'];
					echo "<td><b>".$sum."</b></td>";
					}
				echo "</tr>";
                $i++;
   				}
   			}
	}
	else echo "<b>���������� �������� ����������� � ������ �����������</b>";

?>




  </TBODY>
</table>


