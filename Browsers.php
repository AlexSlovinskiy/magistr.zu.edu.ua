<?php
include ("Parts/Header.php");
include ("Parts/MainNews.php");


?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h3 class="pagetitle">Нажаль ваш браузер не підтримує деякі функціональні можливості ІС &bdquo;МАГІСТР&ldquo; </h3>
        		<h3 class="pagetitle">Будь-ласка завантажте та встановіть один з наведених нижче</h3>
					<div class="column1-unit">
                    	<form id=browsers>
                    		<input type="button" value="" class="button" title="Firefox" onClick="window.location.href = 'http://www.mozilla.com' " style="width:64px; height:64px; cursor: pointer; border:none; background:url(../img/Firefox-64.gif) no-repeat 5% 10%;"/>
                    		<input type="button" value="" class="button" title="Chrome" onClick="window.location.href = 'http://www.google.com/chrome' " style="width:64px; height:64px; cursor: pointer; border:none; background:url(../img/Chrome-64.gif) no-repeat 5% 10%;"/>
                    		<input type="button" value="" class="button" title="Opera" onClick="window.location.href = 'http://www.opera.com/' " style="width:64px; height:64px; cursor: pointer; border:none; background:url(../img/Opera-64.gif) no-repeat 5% 10%;"/>
                    		<input type="button" value="" class="button" title="Internet Explorer 8" onClick="window.location.href = 'http://www.microsoft.com/rus/windows/internet-explorer/' " style="width:64px; height:64px; cursor: pointer; border:none; background:url(../img/IE-64.gif) no-repeat 5% 10%;"/>
                    		<input type="button" value="" class="button" title="Safari" onClick="window.location.href = 'http://www.apple.com/ru/safari/download/' " style="width:64px; height:64px; cursor: pointer; border:none; background:url(../img/Safari-64.gif) no-repeat 5% 10%;"/>
                    	</form>
					</div>
            		<hr class="clear-contentunit" />
            	</div>
        	</div>

<?php

include ("Parts/Footer.php");

?>
