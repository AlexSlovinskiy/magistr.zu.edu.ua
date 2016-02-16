<?php
session_name("blank");
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
  	<title>������� �� ��������� ����� (�����������)</title>
</head>
<?php
include ("MySQL/MysqlConnect.php");
include ("Parts/SpecialityList.php");

$months=array("����"=>"1", "������"=>"2", "�������"=>"3", "�����"=>"4", "������"=>"5", "������"=>"6", "�����"=>"7", "������"=>"8", "�������"=>"9", "������"=>"10", "���������"=>"11", "������"=>"12");

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

/*echo '<pre>';
print_r($_SESSION);
print_r($_POST);
echo '</pre>';*/
?>
<body>
	<div class="main">
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">������� �� ��������� �����</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="���������" class="button" onClick="printpage()"/>
					<input type="button" value="�����" class="button" onClick="window.location.href = 'Exams.php' "/>
					</p>
				</form>
			</div>



		<br/>
		<table align=center width="900px" class="examsblank" cellspacing=0 cellpadding=0 border=0>
		    <tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:5px;" align=center>������� �� ��������� �����</td>
			</tr>

			<tr>
				<table align=center width="900px" class="exams" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0); margin-top:15px;">
					<tr>
					   	<td align=center><strong>� <br />�/�</strong></td>
					   	<td align=center><strong>&nbsp;&nbsp;&nbsp;������������&nbsp;&nbsp;&nbsp;</strong></td>
                        <td align=center><strong>���������</strong></td>
						<td align=center><strong>ͳ������</strong></td>
						<td align=center><strong>����������</strong></td>
						<td align=center><strong>���������</strong></td>
						<td align=center><strong>������ ������ ���� �� �����</strong></td>
      				</tr>

					<tr style="border:solid 2px rgb(0,0,0);">
						<?php
						for ($i=1; $i<=7; $i++)
							echo "<td align=center>".$i."</td>";
						?>
					</tr>
                    <tr style="border:solid 2px rgb(0,0,0);">
						<td align=center colspan="7"><b>����� ����� ��������</b></td>
					</tr>
			<?php

				for ($i=1; $i<=count($mag_list["stc"]); $i++)
     				{
     				echo '<tr>';
                    echo "<td align=center>".$i.'.'."</td>";
                    echo "<td align=left>".$mag_list["stc"][$i-1]["spec"]."</td>";

                    $query = "SELECT COUNT(*) FROM `abiturients` WHERE
 						`speciality` = '".$mag_list["stc"][$i-1]["spec"]."' AND
        				`study_type` = '�����' AND
						`take_away` = '-' AND
						`bal1` >= 124 AND
						`language` = '���������'";
     				$sql = mysql_query($query) or die(mysql_error());
  					$amount = mysql_fetch_assoc($sql);
    				echo "<td align=center>".$amount["COUNT(*)"]."</td>";

                    $query = "SELECT COUNT(*) FROM `abiturients` WHERE
 						`speciality` = '".$mag_list["stc"][$i-1]["spec"]."' AND
        				`study_type` = '�����' AND
						`take_away` = '-' AND
						`bal1` >= 124 AND
						`language` = 'ͳ������'";
     				$sql = mysql_query($query) or die(mysql_error());
  					$amount = mysql_fetch_assoc($sql);
    				echo "<td align=center>".$amount["COUNT(*)"]."</td>";

    				$query = "SELECT COUNT(*) FROM `abiturients` WHERE
 						`speciality` = '".$mag_list["stc"][$i-1]["spec"]."' AND
        				`study_type` = '�����' AND
						`take_away` = '-' AND
						`bal1` >= 124 AND
						`language` = '����������'";
     				$sql = mysql_query($query) or die(mysql_error());
  					$amount = mysql_fetch_assoc($sql);
    				echo "<td align=center>".$amount["COUNT(*)"]."</td>";

    				$query = "SELECT COUNT(*) FROM `abiturients` WHERE
 						`speciality` = '".$mag_list["stc"][$i-1]["spec"]."' AND
        				`study_type` = '�����' AND
						`take_away` = '-' AND
						`bal1` >= 124 AND
						`language` = '���������'";
     				$sql = mysql_query($query) or die(mysql_error());
  					$amount = mysql_fetch_assoc($sql);
    				echo "<td align=center>".$amount["COUNT(*)"]."</td>";

    				$query = "SELECT COUNT(*) FROM `abiturients` WHERE
 						`speciality` = '".$mag_list["stc"][$i-1]["spec"]."' AND
        				`study_type` = '�����'";
					$sql = mysql_query($query) or die(mysql_error());
  					$amount = mysql_fetch_assoc($sql);
    				echo "<td align=center>".$amount["COUNT(*)"]."</td>";

                    echo "</tr>";
                    }

				?>
                    <tr style="border:solid 2px rgb(0,0,0);">
						<td align=center colspan="7"><b>������ ����� ��������</b></td>
					</tr>
				<?php

				for ($i=1; $i<=count($mag_list["zao"]); $i++)
     				{
     				echo '<tr>';
                    echo "<td align=center>".$i.'.'."</td>";
                    echo "<td align=left>".$mag_list["zao"][$i-1]["spec"]."</td>";

                    $query = "SELECT COUNT(*) FROM `abiturients` WHERE
 						`speciality` = '".$mag_list["zao"][$i-1]["spec"]."' AND
        				`study_type` = '������' AND
						`take_away` = '-' AND
						`bal1` >= 124 AND
						`language` = '���������'";
     				$sql = mysql_query($query) or die(mysql_error());
  					$amount = mysql_fetch_assoc($sql);
    				echo "<td align=center>".$amount["COUNT(*)"]."</td>";

                    $query = "SELECT COUNT(*) FROM `abiturients` WHERE
 						`speciality` = '".$mag_list["zao"][$i-1]["spec"]."' AND
        				`study_type` = '������' AND
						`take_away` = '-' AND
						`bal1` >= 124 AND
						`language` = 'ͳ������'";
     				$sql = mysql_query($query) or die(mysql_error());
  					$amount = mysql_fetch_assoc($sql);
    				echo "<td align=center>".$amount["COUNT(*)"]."</td>";

    				$query = "SELECT COUNT(*) FROM `abiturients` WHERE
 						`speciality` = '".$mag_list["zao"][$i-1]["spec"]."' AND
        				`study_type` = '������' AND
						`take_away` = '-' AND
						`bal1` >= 124 AND
						`language` = '����������'";
     				$sql = mysql_query($query) or die(mysql_error());
  					$amount = mysql_fetch_assoc($sql);
    				echo "<td align=center>".$amount["COUNT(*)"]."</td>";

    				$query = "SELECT COUNT(*) FROM `abiturients` WHERE
 						`speciality` = '".$mag_list["zao"][$i-1]["spec"]."' AND
        				`study_type` = '������' AND
						`take_away` = '-' AND
						`bal1` >= 124 AND
						`language` = '���������'";
     				$sql = mysql_query($query) or die(mysql_error());
  					$amount = mysql_fetch_assoc($sql);
    				echo "<td align=center>".$amount["COUNT(*)"]."</td>";

    				$query = "SELECT COUNT(*) FROM `abiturients` WHERE
 						`speciality` = '".$mag_list["zao"][$i-1]["spec"]."' AND
        				`study_type` = '������'";
     				$sql = mysql_query($query) or die(mysql_error());
  					$amount = mysql_fetch_assoc($sql);
    				echo "<td align=center>".$amount["COUNT(*)"]."</td>";

                    echo "</tr>";
                    }
                ?>

				</table>
			</tr>
		</table>

	</div>
	</div>
	<script type="text/javascript">
		function printpage()
			{
			window.print();
			}
	</script>


</body>
</html>