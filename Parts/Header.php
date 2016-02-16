<?php
session_name("user");
session_start();

if ($_SESSION["status"]=="user")
	{
    include ("MySQL/MysqlConnect.php");
   	$query = "SELECT * FROM `users` WHERE `login`='".$_SESSION["login"]."' LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());
  	if (mysql_num_rows($sql) == 1)
  		{
  		$row = mysql_fetch_assoc($sql);
  		if ($row['status']=="guest")
  			{
  			setcookie ("login", "", time()+3600);
			setcookie ("pass", "", time()+3600);
  			$_SESSION = array();
			session_destroy();
  			print "<meta http-equiv=\"Refresh\" content=\"0;URL=MainPage.php\">";
			exit();
  			}
  		}


	}
/*if (isset($_POST["remember"]))
	{
    setcookie ("login", $_POST["login"], time()+7200);
	setcookie ("pass", md5($_POST["pass"]), time()+7200);
	}
else
	{
	setcookie ("login", $_POST["login"], time()+60);
	setcookie ("pass", md5($_POST["pass"]), time()+60);
	}*/


    	//echo $_SERVER['HTTP_USER_AGENT'];
    	/*if ( stristr($_SERVER['HTTP_USER_AGENT'], 'Firefox') ) echo 'firefox';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'Chrome') ) echo 'chrome';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'Safari') ) echo 'safari';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'Opera') ) echo 'opera';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') ) echo 'ie6';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0') ) echo 'ie7';
		elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0') ) echo 'ie8';*/

         function check_browser()
         	{
			$browsers = array('Opera', 'MSIE 7.0', 'MSIE 8.0', 'MSIE 9.0', 'Firefox', 'Chrome', 'Safari');
			//$browsers_mobile = array('Windows CE', 'NetFront', 'Palm OS', 'Blazer', 'Elaine', 'Opera mini');
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
			/*foreach ($browsers_mobile as $v)
				{
				if (stristr($user_agent, $v)) return 'mobile';
				}*/
			foreach ($browsers as $v)
				{
				if (stristr($user_agent, $v)) return 'normal';
				}
			}


/*echo '<pre>';
//print_r($_POST);
print_r($_COOKIE);
print_r($_SESSION);
echo '</pre>';*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-Transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
  	<meta http-equiv="cache-control" content="no-cache" />
  	<meta name="copyright" content="Zhytomyr Ivan Franko State University" />
  	<meta name="author" content="Olexandr Slovinskiy" />
  	<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/setup.css" />
  	<link rel="stylesheet" type="text/css" media="screen,projection,print" href="css/text.css" />
  	<link type='text/css' href='css/confirm.css' rel='stylesheet' media='screen' />
  	<link type='text/css' href='css/osx.css' rel='stylesheet' media='screen' />
  	<link rel="icon" type="image/png" href="img/favicon.png" />
<?php
	if (check_browser()=="normal")
    	echo
    '<script type="text/javascript" src="Scripts/lib/JsHttpRequest/JsHttpRequest.js"></script>
  	<script type="text/javascript" src="Scripts/FormAnalyzer.js"></script>
  	<script type="text/javascript" src="Scripts/LinkedSelect.js"></script>
  	<script type="text/javascript" src="Scripts/HighLightTable.js"></script>
  	<script type="text/javascript" src="Scripts/SpecialityTable.js"></script>
    <script type="text/javascript" src="Scripts/clock.js"></script>';
?>

  	<title>������������ ������� &quot;������&quot; </title>
</head>

<input type="button" name="osx" value="Demo" id="osx" class="osx" style="display:none;"/>
<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<!--<body onload="javascript: showOSXModal(); clock(<?echo date('U')*1000;?>); countdown(2010,6,10,<?echo date('U')*1000;?>); ">-->
<?php

	if ($_SESSION["ShowModal"]>0) $_SESSION["ShowModal"]++;
	if (isset($_SESSION["login"]) && $_SESSION["ShowModal"]<3)
		{
		echo '<body onload="javascript: showOSXModal(); clock(';
		echo date("U")*1000;
		echo '); countdown(2010,6,10,';
		echo date("U")*1000;
		echo ');">';
		$_SESSION["ShowModal"]++;
		}
	else
		{
		if (check_browser()=="normal")
			{
			echo '<body onload="javascript: clock(';
			echo date("U")*1000;
			echo '); countdown(2010,6,10,';
			echo date("U")*1000;
			echo ');">';
			}
		else
			{
			echo '<body>';
			}
		}
?>
    <!-- Main Page Container -->
  	<div class="page-container">

        <?php
		if (check_browser()!="normal" && $_SERVER["SCRIPT_NAME"]!="/Browsers.php")
			{
			print "<meta http-equiv=\"Refresh\" content=\"0;URL=Browsers.php\">";
			exit();
			}

		?>



	<!-- modal content -->
		<div id="osx-modal-content">
			<div id="osx-modal-title">��������(�)
				<?php if ($_SESSION['user_name']==$_SESSION['user_patronymic']) echo $_SESSION['user_name']."!";
          				else echo $_SESSION['user_name']." ".$_SESSION['user_patronymic']." !";
          		?>
			</div>
			<div class="close"><a href="#" class="simplemodal-close">x</a></div>
			<div id="osx-modal-data">
				<h2><?php echo $_SESSION['mes_header'];?></h2>
				<p><?php echo $_SESSION['mes_text'];?></p>
				<p><span>(ESC ��� ������)</span></p>
			</div>
		</div>
		<!-- Load JavaScript files -->
		<script type='text/javascript' src='js/jquery.js'></script>
		<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
		<script type='text/javascript' src='js/osx.js'></script>


 	<!-- A. HEADER -->
    	<div class="header">
     	<!-- A.1 HEADER TOP -->
      		<div class="header-top">
        	<!-- Sitelogo and sitename -->
        		<a class="sitelogo"></a>
        		<?if ($_SESSION["login"]=="root")
					{
					//echo '<a class="authorizedlogo"></a>';
					echo '<a class="rootlogo"></a>';
					}
				?>
        		<div class="sitename">
          			<h1>��ò���<span style="font-weight:normal;font-size:50%;">&nbsp;v. 2.0</span></h1>
          			<h2>������������ �������</h2>
          		</div>

        		<?php
        		if ($_SESSION['ReLogin']==1) print "<meta http-equiv=\"Refresh\" content=\"0;URL=Logout.php\">";

        		if (isset($_SESSION["login"]))
					{
					include ("Parts/Welcome.php");
					}
				?>
      		</div>
 		<!-- A.2 HEADER MIDDLE -->
      		<div class="header-middle">
   			<!-- Site message -->
   				<div class="sitemessage-left" style="color:rgb(212,12,12);">
   					<h2>
   						<noscript>
   					 		������ JavaScript �������� ��� �� ������������ ���������! �������� ������� ������� ����� ���������!
   						</noscript>
					</h2>
				</div>

        		<div class="sitemessage">
          			<h2 id="jsDate"></h2>
          			<h1 id="jsTime"></h1>
                </div>
                <div class="sitemessage-left">
          			<h2 id="jsBefor"></h2>
                </div>
      		</div>
      	<!-- A.3 HEADER BOTTOM -->
      		<?
			include ("MainMenu.php");
      		?>
	  	<!-- A.4 HEADER EMPTY -->
	  		<div class="header-empty">
	  			<?

	  			?>
	  		</div>
	  	</div>

	  	<!-- B. MAIN -->
    	<div class="main">
 		<!-- B.1 MAIN NEWS -->