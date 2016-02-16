<?php
session_name("user");
session_start();
if (isset($_POST["remember"]))
	{
    setcookie ("login", $_POST["login"], time()+3600);
	setcookie ("pass", md5($_POST["pass"]), time()+3600);
	}
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
  	<title>������ �� �����������</title>
</head>
<?php
include ("MySQL/MysqlConnect.php");
//include ("Parts/SpecialityList.php");

?>

<body>
	<div class="main-content" style="width:100%">
    	<h1 class="pagetitle" style="margin-top:1em; margin-right:50px;">������ �� �����������</h1>
			<div class="printBtn">
				<form>
					<p>
					<input type="button" value="���������" class="button" onClick="printpage()"/>
					<input type="button" value="�����" class="button" onClick="window.location.href = 'MainPage.php' "/>
					</p>
				</form>
			</div>

		<br/>
		<table align=center width="900px" class="examsblank" cellspacing=0 cellpadding=0 border=0>
			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:10px;" align=center><strong>������ �� �����������:</strong></td>
			</tr>

			<tr style="font-family:times;font-size:18px;">
				<td style="border:none; padding-bottom:10px;" align=left>
				<?php
					if ($_SESSION['search_lastname']!="%") echo "<strong>�������: </strong>".$_SESSION['search_lastname']."<br />";
                    if ($_SESSION['search_study_type']!="%") echo "<strong>����� ��������: </strong>".$_SESSION['search_study_type']."<br />";
                    if ($_SESSION['search_type']!="%") echo "<strong>���: </strong>".$_SESSION['search_type']."<br />";
    				if ($_SESSION['search_speciality']!="%") echo "<strong>������������: </strong>".$_SESSION['search_speciality']."<br />";
    				if ($_SESSION['search_specialization']!="%") echo "<strong>������������: </strong>".$_SESSION['search_specialization']."<br />";
   					if ($_SESSION['search_faculty']!="%") echo "<strong>���������: </strong>".$_SESSION['search_faculty']."<br />";
    				if ($_SESSION['search_date']!="%") echo "<strong>���� �������: </strong>".date("d.m.Y", $_SESSION['search_date'])."<br />";
    				if ($_SESSION['search_date_edit']!="%") echo "<strong>���� ���������� �����������: </strong>".date("d.m.Y",$_SESSION['search_date_edit'])."<br />";
    				if ($_SESSION['search_dip_year']!="%") echo "<strong>г� ������ �������: </strong>".$_SESSION['search_dip_year']."<br />";
    				if ($_SESSION['search_dip_type']!="%") echo "<strong>��� �������: </strong>".$_SESSION['search_dip_type']."<br />";
    				if ($_SESSION['search_dip_study_type']!="%") echo "<strong>������, ����� ��������: </strong>".$_SESSION['search_dip_study_type']."<br />";
    				if ($_SESSION['search_dip_finans']!="%") echo "<strong>������, ������������: </strong>".$_SESSION['search_dip_finans']."<br />";
    				if ($_SESSION['search_dip_honour']!="%") echo "<strong>������ � ��������: </strong>".$_SESSION['search_dip_honour']."<br />";
    				if ($_SESSION['search_institution']!="%") echo "<strong>���, �� �������: </strong>".$_SESSION['search_institution']."<br />";
    				if ($_SESSION['search_finans']!="%") echo "<strong>Գ����������: </strong>".$_SESSION['search_finans']."<br />";
    				if ($_SESSION['search_benefit']!="%") echo "<strong>���� ���������: </strong>".$_SESSION['search_benefit']."<br />";
    				if ($_SESSION['search_benefit_list']!="%") echo "<strong>ϳ����: </strong>".$_SESSION['search_benefit_list']."<br />";
    				if ($_SESSION['search_chornob34']!="%") echo "<strong>����������� ���-IV �������: </strong>".$_SESSION['search_chornob34']."<br />";
    				if ($_SESSION['search_pact'] !="%") echo "<strong>����� �����/������: </strong>".$_SESSION['search_pact']."<br />";
    				if ($_SESSION['search_target'] !="%") echo "<strong>ֳ����� �����������: </strong>".$_SESSION['search_target']."<br />";
    				if ($_SESSION['search_dip_orig'] !="%") echo "<strong>����� ��������� ���������: </strong>".$_SESSION['search_dip_orig']."<br />";
    				if ($_SESSION['search_recommend'] !="%") echo "<strong>�������������� �� �����������: </strong>".$_SESSION['search_recommend']."<br />";
    				if ($_SESSION['search_apply']!="%") echo "<strong>�����������: </strong>".$_SESSION['search_apply']."<br />";
    				if ($_SESSION['search_take_away']!="%") echo "<strong>������ ���������: </strong>".$_SESSION['search_take_away']."<br />";
    				if ($_SESSION['search_location']!="%") echo "<strong>̳������� ����������: </strong>".$_SESSION['search_location']."<br />";
    				if ($_SESSION['search_nationality']!="%") echo "<strong>�������������: </strong>".$_SESSION['search_nationality']."<br />";
    				if ($_SESSION['search_sex']!="%") echo "<strong>�����: </strong>".$_SESSION['search_sex']."<br />";
    				if ($_SESSION['search_language']!="%") echo "<strong>�������� ����: </strong>".$_SESSION['search_language']."<br />";
					if ($_SESSION['search_hostel']!="%") echo "<strong>������� ����������: </strong>".$_SESSION['search_hostel']."<br />";
				?>

				</td>
			</tr>

			<tr>
				<table align=center width="600px" class="exams" cellspacing=0 cellpadding=0 border=1 style="border:solid 2px rgb(0,0,0);">
					<tr>
                    	 <td align=center><b>� �.�</b></td>
                    	 <td align=center><b>ϲ�<br />���� ������</b></td>
                    	 <td align=center><b>����<br />����������</b></td>
                    	 <td align=center><b>�������� ���</b></td>
                    	 <td align=center><b>������</b></td>
                    	 <td align=center><b>������, �������,<br />������� ����������</b></td>
                    </tr>

					<?php


    $sql = mysql_query($_SESSION['query']) or die(mysql_error());
 	if (mysql_num_rows($sql)>0)
   		{   		$i=1;
   		while ($row = mysql_fetch_assoc($sql))
   		 	{            echo "<tr>
            		<td align=center>".$i."</td>
                    <td align=left>".$row['lastname']."<br />".$row['firstname']."<br />".$row['patronymic']."<br />".$row['ab_id']."</td>
                    <td align=center>".date("d.m.Y",$row['birth_date'])."</td>
                    <td align=center>".$row['pasp_serial']." ".$row['pasp_number']."<br />".$row['pasp_issue']."<br />".date("d.m.Y",$row['pasp_date'])."</td>
                    <td align=center>".$row['qualification']."<br />".$row['dip_serial']." ".$row['dip_number']." �� ".date("d.m.Y",$row['dip_date'])."<br />".$row['institution']."<br />���. ��� ".$row['dip_average']."</td>
                    <td align=center>".$row['city'].", ���. ".$row['street']." ,".$row['build_number'];
					if ($row['flat_number']!="") echo ", ��. ".$row['flat_number'];
			echo"<br />".$row['phone'];
			if ($row['hostel']=="+") echo "<br />���</td>"; else echo "<br />�</td>";

            echo "</tr>";
            $i++;
   		 	}
   		}
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