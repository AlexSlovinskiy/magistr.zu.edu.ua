<?php
echo '<script type="text/javascript">
// Создаем новый объект связанных списков
var syncList1 = new syncList;

// Определяем значения подчиненных списков (2 и 3 селектов)
syncList1.dataList = {';

/* Определяем элементы второго списка в зависимости
от выбранного значения в первом списке */
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
/*Определяем элементы третьего списка в зависимости
от выбранного значения во втором списке */
$query = "SELECT `faculty_name` FROM `faculties` ORDER BY `faculty_name`";
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql)>0)
while ($row = mysql_fetch_assoc($sql))
   	{	$query1 = "SELECT  DISTINCT `training` FROM `specialities` WHERE `faculty` = '".$row['faculty_name']."' ";
   	$sql1 = mysql_query($query1) or die(mysql_error());
	if (mysql_num_rows($sql1)>0)
   	while ($row1 = mysql_fetch_assoc($sql1))
   		{   		$k=0;        echo "'".$row1['training']."':{";
        $query2 = "SELECT `speciality_name` FROM `specialities` WHERE `training` = '".$row1['training']."' ORDER BY `speciality_name`";
   		$sql2 = mysql_query($query2) or die(mysql_error());
		if (mysql_num_rows($sql2)>0)
   		while ($row2 = mysql_fetch_assoc($sql2))
   			{   			if (substr($row2['speciality_name'],0,1)=="7")            	{            	if ($k>0) echo",";
   				echo "'".$row2['speciality_name']."':'".$row2['speciality_name']."'";
   				$k++;
   				}
   			}
   		echo "},";
   		}
   	}

/*Определяем элементы четвертого списка в зависимости
от выбранного значения в третьем списке */
$query = "SELECT `faculty_name` FROM `faculties` ORDER BY `faculty_name`";
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql)>0)
while ($row = mysql_fetch_assoc($sql))
   	{
	$query1 = "SELECT  DISTINCT `training` FROM `specialities` WHERE `faculty` = '".$row['faculty_name']."' ";
   	$sql1 = mysql_query($query1) or die(mysql_error());
	if (mysql_num_rows($sql1)>0)
   	while ($row1 = mysql_fetch_assoc($sql1))
   		{	    $query2 = "SELECT `speciality_name` FROM `specialities` WHERE `training` = '".$row1['training']."' ORDER BY `speciality_name`";
   		$sql2 = mysql_query($query2) or die(mysql_error());
		if (mysql_num_rows($sql2)>0)
   		while ($row2 = mysql_fetch_assoc($sql2))
   			{
   			$k=0;
	        echo "'".$row2['speciality_name']."':{";
       	 	$query3 = "SELECT `specialization_name` FROM `specializations` WHERE `speciality` = '".$row2['speciality_name']."' ORDER BY `specialization_name`";
   			$sql3 = mysql_query($query3) or die(mysql_error());
			if (mysql_num_rows($sql3)>0)
   			while ($row3 = mysql_fetch_assoc($sql3))
   				{
   				if ($k>0) echo",";
   				echo "'".$row3['specialization_name']."':'".$row3['specialization_name']."'";
   				$k++;
   				}
   			echo "},";
   			}
   		}
   	}

// Включаем синхронизацию связанных списков
echo '};
syncList1.sync("faculty","training","speciality","specialization");
	</script>';