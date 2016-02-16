<?php
setcookie ("login", "", time()+3600);
setcookie ("pass", "", time()+3600);

include ("Parts/Header.php");

$_SESSION = array();
session_destroy();

print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
exit();
?>