<?php
echo '<script type="text/javascript">
// ������� ����� ������ ��������� �������
var syncList1 = new syncList;

// ���������� �������� ����������� ������� (2 � 3 ��������)
syncList1.dataList = {';

/* ���������� �������� ������� ������ � �����������
�� ���������� �������� � ������ ������ */
$query = "SELECT * FROM `faculties`  ORDER BY `faculty_name`";
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql)>0)
while ($row = mysql_fetch_assoc($sql))
   	{   	$k=0;   	echo "'".$row['faculty_name']."':{";
    $query1 = "SELECT * FROM `trainings` ORDER BY `training_name`";
   	$sql1 = mysql_query($query1) or die(mysql_error());
	if (mysql_num_rows($sql1)>0)
   	while ($row1 = mysql_fetch_assoc($sql1))
   		{   		$current_faculties=unserialize(htmlspecialchars_decode($row1["faculty_id"]));
   		for ($i=1; $i<=count($current_faculties); $i++)
   			{   			if ($current_faculties[$i]==$row["faculty_id"])
   				{   				if ($k>0) echo",";   				echo "'".$row1['training_name']." ".$row['faculty_name']."':'".$row1['training_name']."'";
   				$k++;
   				}
   			}
   		}
   	echo "},";
   	}
/*���������� �������� �������� ������ � �����������
�� ���������� �������� �� ������ ������ */
$query = "SELECT `faculty_name` FROM `faculties` ORDER BY `faculty_name`";
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql)>0)
while ($row = mysql_fetch_assoc($sql))
   	{   	$query1 = "SELECT  DISTINCT `training` FROM `specialities` WHERE `faculty` = '".$row['faculty_name']."' ";
   	$sql1 = mysql_query($query1) or die(mysql_error());
	if (mysql_num_rows($sql1)>0)
   	while ($row1 = mysql_fetch_assoc($sql1))
   		{   		$k=0;        echo "'".$row1['training']."':{";
        $query2 = "SELECT `speciality_name` FROM `specialities` WHERE `training` = '".$row1['training']."' ORDER BY `speciality_name`";
   		$sql2 = mysql_query($query2) or die(mysql_error());
		if (mysql_num_rows($sql2)>0)
   		while ($row2 = mysql_fetch_assoc($sql2))
   			{   			if (substr($row2['speciality_name'],0,1)=="8")            	{            	if ($k>0) echo",";
   				echo "'".$row2['speciality_name']."':'".$row2['speciality_name']."'";
   				$k++;
   				}
   			}
   		echo "},";
   		}
   	}

// �������� ������������� ��������� �������
echo '};
syncList1.sync("faculty","training","speciality");
	</script>';