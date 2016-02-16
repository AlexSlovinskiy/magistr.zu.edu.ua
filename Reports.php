<?php
include ("Parts/Header.php");
include ("MySQL/MysqlConnect.php");

//Изменение стиля страницы на всю ширину
echo '<style type="text/css">
  		.main {	background:transparent url(img/bg_main_withoutnav.jpg) repeat-y;	}
		.main-content {	width:840px;}
		.column1-unit {	width:840px;}
		.clear-contentunit {width:840px;}
	 </style>';

if (!isset($_SESSION["login"]))
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}

?>
<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle">Журнал реєстрації</h1>
					<div class="column1-unit">
						<?php
						if ($_SESSION["status"]=="user")
							{							$query1 = "SELECT * FROM `access` WHERE `week_day` = '".date("l")."' LIMIT 1";
    						$sql1 = mysql_query($query1) or die(mysql_error());
    						if (mysql_num_rows($sql1) == 1)
    							{    							$row1 = mysql_fetch_assoc($sql1);
  								if ($row1["holyday"]=="+")
  									echo "<h3>Друк журналу тільки у робочі дні.</h3>";

    							if ($row1["holyday"]=="-")
            						{
            						if (date("G")<$row1['befor_h'] || date("G")>$row1['befor_h'])
                            			echo "<h3>Друк журналу після закінчення прийому документів за поточний день.
                            						<br /> З ".$row1['befor_h'].":00 до ".++$row1['befor_h'].":00 </h3>";
    							    else include ("Parts\ReportFilterForm.php");
    							    }
    							}
							}
							else include ("Parts\ReportFilterForm.php");



						?>
					</div>

					<hr class="clear-contentunit" />
            	</div>
        	</div>
<?php
include ("Parts/Footer.php")
?>