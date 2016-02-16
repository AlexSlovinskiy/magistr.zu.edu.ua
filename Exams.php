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
        		<h1 class="pagetitle">Вступні іспити</h1>
					<div class="column1-unit">
						<?php

						include ("Parts\ExamsFilterForm.php");
						?>
					</div>

					<hr class="clear-contentunit" />
            	</div>
        	</div>
<?php
include ("Parts/Footer.php")
?>