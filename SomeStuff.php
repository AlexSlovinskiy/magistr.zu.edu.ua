<?php
session_name("user");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-Transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
  	<meta http-equiv="cache-control" content="no-cache" />
  	<meta name="copyright" content="Zhytomyr Ivan Franko State University" />
  	<meta name="author" content="Olexandr Slovinskiy" />
  	<link rel="stylesheet" type="text/css" media="screen" href="css/not_print.css" />
  	<link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
	<link rel="icon" type="image/png" href="img/favicon.png" />
  	<title>���� ����</title>
</head>
<?php
include ("MySQL/MysqlConnect.php");
include ("Parts/SpecialityList.php");
if ($_SESSION['status']!="admin" && $_SESSION['status']!="root")
 	{
 	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
 	}
?>

<body>
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;"> ���� ����</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="���������" class="button" onClick="printpage()"/>
					<input type="button" value="�����" class="button" onClick="window.location.href = 'AdminPage.php' "/>
					</p>
				</form>
			</div>

		<br/>
		<table align=center width="900px" class="examsblank" cellspacing=0 cellpadding=0 border=0>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:10px;" align=center><strong>������������ ��������� �Ͳ�������� ���Ͳ ����� ������</strong></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:10px;" align=center><strong>������</strong></td>
			</tr>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:15px;" align=center><strong>��� ���� �������...</strong></td>
			</tr>
			<tr>
				<table align=center width="1000px" class="exams" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<tr>
                    	 <td align=center colspan="2">� �.�</td>
                    	 <td align=center>ϲ�</td>
                    	 <td align=center>������������</td>
                    	 <td align=center>����� ���-�� <br />������������</td>
                    	 <td align=center>���</td>
                    	 <td align=center>���� <br /> ������ <br />��������</td>
                    	 <td align=center>����. ����</td>
                    	 <td align=center>ϳ����</td>
                    	 <td align=center>³� �� <br /> ���� ������� <br /> ���-��</td>
                    	 <td align=center>���� <br /> ����������</td>
					</tr>
					<tr>
                    	<td align=center colspan="11"><strong>����� ����� �������� (��������)</strong></td>
                    </tr>
					<?php
                            $j=1; $k=1;							$query="SELECT * FROM abiturients
											WHERE
											qualification = '��������' AND
											dip_study_type = '�����' AND
											dip_finans = '������' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-'
												ORDER BY speciality ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{								echo "<tr><td align=center colspan='11'><b>������</b></td></tr>";
								while ($row = mysql_fetch_assoc($sql))
									{                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                    echo "<td align=left>".$row["speciality"]."</td>";
                                    echo "<td align=center>".$row["study_type"]."<br />";
                                    if ($row["finans"]=="b") echo "������</td>";
                                    if ($row["finans"]=="c") echo "��������</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == '��� ���� �. ������') echo "���</td>"; else echo "�����</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td></td>";
                                    if ($row['invalid']=='+') echo "<td align=center>���. �-�� ��.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>ĳ��-������</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>������ �-�� ���.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>̳��. ����</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>�����. ����</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>����. �����</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>ĳ�� ������. �����.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>�������.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
                                    $j++; $k++;
                                    }
								}
							$k=1;


							$query="SELECT * FROM abiturients
											WHERE
											qualification = '��������' AND
											dip_study_type = '�����' AND
											dip_finans = '��������' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-'
												ORDER BY speciality ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								echo "<tr><td align=center colspan='11'><b>��������</b></td></tr>";
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                    echo "<td align=left>".$row["speciality"]."</td>";
                                    echo "<td align=center>".$row["study_type"]."<br />";
                                    if ($row["finans"]=="b") echo "������</td>";
                                    if ($row["finans"]=="c") echo "��������</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == '��� ���� �. ������') echo "���</td>"; else echo "�����</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td align=center>".$row["language"]."</td>";
                                    if ($row['invalid']=='+') echo "<td align=center>���. �-�� ��.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>ĳ��-������</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>������ �-�� ���.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>̳��. ����</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>�����. ����</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>����. �����</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>ĳ�� ������. �����.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>�������.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
									$j++; $k++;
									}
								}
							$k=1;

					?>
                    <tr>
                    	<td align=center colspan="11"><strong>����� ����� �������� (���������)</strong></td>
                    </tr>
					<?php

							$query="SELECT * FROM abiturients
											WHERE
											qualification = '���������' AND
											dip_study_type = '�����' AND
											dip_finans = '������' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-'
												ORDER BY speciality ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								echo "<tr><td align=center colspan='11'><b>������</b></td></tr>";
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                   	echo "<td align=left>".$row["speciality"]."</td>";
                                   	echo "<td align=center>".$row["study_type"]."<br />";
                                    if ($row["finans"]=="b") echo "������</td>";
                                    if ($row["finans"]=="c") echo "��������</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == '��� ���� �. ������') echo "���</td>"; else echo "�����</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td></td>";
                                    if ($row['invalid']=='+') echo "<td align=center>���. �-�� ��.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>ĳ��-������</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>������ �-�� ���.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>̳��. ����</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>�����. ����</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>����. �����</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>ĳ�� ������. �����.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>�������.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
                                    $j++; $k++;
                                    }
								}
							$k=1;

							$query="SELECT * FROM abiturients
											WHERE
											qualification = '���������' AND
											dip_study_type = '�����' AND
											dip_finans = '��������' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-'
												ORDER BY speciality ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								echo "<tr><td align=center colspan='11'><b>��������</b></td>";
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                    echo "<td align=left>".$row["speciality"]."</td>";
                                    echo "<td align=center>".$row["study_type"]."<br />";
                                    if ($row["finans"]=="b") echo "������</td>";
                                    if ($row["finans"]=="c") echo "��������</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == '��� ���� �. ������') echo "���</td>"; else echo "�����</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td align=center>".$row["language"]."</td>";
                                    if ($row['invalid']=='+') echo "<td align=center>���. �-�� ��.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>ĳ��-������</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>������ �-�� ���.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>̳��. ����</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>�����. ����</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>����. �����</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>ĳ�� ������. �����.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>�������.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
                                    $j++; $k++;
									}
								}
							$k=1;

					?>

					<tr>
                    	<td align=center colspan="11"><strong>������ ����� �������� (��������)</strong></td>
                    </tr>
					<?php

							$query="SELECT * FROM abiturients
											WHERE
											qualification = '��������' AND
											dip_study_type = '������' AND
											dip_finans = '������' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-'
												ORDER BY speciality ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								echo "<tr><td align=center colspan='11'><b>������</b></td></tr>";
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                   	echo "<td align=left>".$row["speciality"]."</td>";
                                   	echo "<td align=center>".$row["study_type"]."<br />";
                                    if ($row["finans"]=="b") echo "������</td>";
                                    if ($row["finans"]=="c") echo "��������</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == '��� ���� �. ������') echo "���</td>"; else echo "�����</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td></td>";
                                    if ($row['invalid']=='+') echo "<td align=center>���. �-�� ��.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>ĳ��-������</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>������ �-�� ���.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>̳��. ����</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>�����. ����</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>����. �����</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>ĳ�� ������. �����.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>�������.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
                                    $j++; $k++;
                                    }
								}
							$k=1;

							$query="SELECT * FROM abiturients
											WHERE
											qualification = '��������' AND
											dip_study_type = '������' AND
											dip_finans = '��������' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-'
												ORDER BY speciality ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								echo "<tr><td align=center colspan='11'><b>��������</b></td>";
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                    echo "<td align=left>".$row["speciality"]."</td>";
                                    echo "<td align=center>".$row["study_type"]."<br />";
                                    if ($row["finans"]=="b") echo "������</td>";
                                    if ($row["finans"]=="c") echo "��������</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == '��� ���� �. ������') echo "���</td>"; else echo "�����</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td align=center>".$row["language"]."</td>";
                                    if ($row['invalid']=='+') echo "<td align=center>���. �-�� ��.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>ĳ��-������</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>������ �-�� ���.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>̳��. ����</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>�����. ����</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>����. �����</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>ĳ�� ������. �����.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>�������.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
                                    $j++; $k++;
									}
								}
							$k=1;

					?>

					<tr>
                    	<td align=center colspan="11"><strong>������ ����� �������� (���������)</strong></td>
                    </tr>
					<?php

							$query="SELECT * FROM abiturients
											WHERE
											qualification = '���������' AND
											dip_study_type = '������' AND
											dip_finans = '������' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-'
												ORDER BY speciality ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								echo "<tr><td align=center colspan='11'><b>������</b></td></tr>";
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                   	echo "<td align=left>".$row["speciality"]."</td>";
                                   	echo "<td align=center>".$row["study_type"]."<br />";
                                    if ($row["finans"]=="b") echo "������</td>";
                                    if ($row["finans"]=="c") echo "��������</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == '��� ���� �. ������') echo "���</td>"; else echo "�����</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td></td>";
                                    if ($row['invalid']=='+') echo "<td align=center>���. �-�� ��.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>ĳ��-������</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>������ �-�� ���.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>̳��. ����</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>�����. ����</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>����. �����</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>ĳ�� ������. �����.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>�������.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
                                    $j++; $k++;
                                    }
								}
							$k=1;

							$query="SELECT * FROM abiturients
											WHERE
											qualification = '���������' AND
											dip_study_type = '������' AND
											dip_finans = '��������' AND
											take_away = '-' AND
											recommend = '+' AND
											pact <> '-'
												ORDER BY speciality ASC, lastname ASC";
							$sql = mysql_query($query) or die(mysql_error());
							if (mysql_num_rows($sql)>0)
								{
								echo "<tr><td align=center colspan='11'><b>��������</b></td>";
								while ($row = mysql_fetch_assoc($sql))
									{
                                    echo "<tr><td align=center>".$j.".</td><td align=center>".$k.".</td>";
                                    echo "<td align=left>".$row["lastname"]." ".$row["firstname"]." ".$row["patronymic"]."</td>";
                                    echo "<td align=left>".$row["speciality"]."</td>";
                                    echo "<td align=center>".$row["study_type"]."<br />";
                                    if ($row["finans"]=="b") echo "������</td>";
                                    if ($row["finans"]=="c") echo "��������</td>";
                                    echo "<td align=center>";
                                    if ($row['institution'] == '��� ���� �. ������') echo "���</td>"; else echo "�����</td>";
                                    echo "<td align=center>".date("m.d.Y", $row['dip_date'])."</td>";
                                    echo "<td align=center>".$row["language"]."</td>";
                                    if ($row['invalid']=='+') echo "<td align=center>���. �-�� ��.</td>";
                                    if ($row['syrota']=='+') echo "<td align=center>ĳ��-������</td>";
                                    if ($row['chornob']=='+') echo "<td align=center>������ �-�� ���.</td>";
                                    if ($row['inozem']=='+') echo "<td align=center>̳��. ����</td>";
                                    if ($row['veteran']=='+') echo "<td align=center>�����. ����</td>";
                                    if ($row['chacht']=='+') echo "<td align=center>����. �����</td>";
                                    if ($row['zagybl']=='+') echo "<td align=center>ĳ�� ������. �����.</td>";
                                    if ($row['zasyadka']=='+') echo "<td align=center>�������.</td>";
                                    if ($row['benefits']=='-') echo "<td align=center>-</td>";
                                    $age=$row['date']-$row['birth_date'];
                                    $year=date('Y', $age)-1970;
                                    $age-=$year;
                                    $month=date('m', $age)-1;
                                    echo "<td align=center>".$month."/".$year."</td>";
                                    echo "<td align=center>".date("m.d.Y",$row['birth_date'])."</td>";
                                    echo "</tr>";
                                    $j++; $k++;
									}
								}
							$k=1;

					?>

				</table>
			</tr>
		</table>
	</div>

	<script type="text/javascript">
		function printpage()
			{
			window.print();
			}
	</script>


</body>
</html>